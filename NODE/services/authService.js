import sql from 'mssql'; // Đảm bảo rằng sql được import đúng cách
import bcrypt from 'bcryptjs';
import nodemailer from 'nodemailer'; 
import crypto from 'crypto'; 
import * as dotenv from "dotenv";
import { connectDB } from "../configs/dbConnect.js";
import { createJWT } from '../middleware/JWTAction.js';
dotenv.config();

const salt = bcrypt.genSaltSync(10);
const checkUserEmail = async (userEmail) => {
    return new Promise(async (resolve, reject) => {
        try {
            const pool = await connectDB(); // Kết nối cơ sở dữ liệu

            // Thực hiện truy vấn để kiểm tra xem email có tồn tại không
            const result = await pool.request()
                .input('email', sql.VarChar, userEmail)
                .query(`
                    SELECT COUNT(*) AS count
                    FROM [User]
                    WHERE email = @email
                `);

            // Kiểm tra kết quả truy vấn
            if (result.recordset[0].count > 0) {
                resolve(true);
            } else {
                resolve(false);
            }

        } catch (error) {
            console.error('Error checking user email:', error);
            reject(error);
        }
    });
};
let hashUserPassword = (password) => {
    return new Promise(async (resolve, reject) => {
        try {
            let hashPassword = bcrypt.hashSync(password, salt);
            resolve(hashPassword);
        } catch (e) {
            reject(e);
        }
    })
}

export const registerNewUser = async (data) => {

    return new Promise(async (resolve, reject) => {
        let check = await checkUserEmail(data.email);
        const pool = await connectDB();
        if (check === true) {
            resolve({
                errCode: 1,
                message: 'your email is already is used, plase try another email'
            })
        }
        try {
            let hashPasswordFromBcrypt = await hashUserPassword(data.password);
            await pool.request()
                .input('address_id', sql.Int, data.address_id) // Điều chỉnh kiểu dữ liệu nếu cần
                .input('full_name', sql.VarChar, data.full_name)
                .input('user_name', sql.VarChar, data.user_name)
                .input('phone', sql.VarChar, data.phone)
                .input('email', sql.VarChar, data.email)
                // .input('gender', sql.VarChar, data.gender)
                .input('day_of_birth', sql.Date, data.day_of_birth)
                .input('password', sql.VarChar, hashPasswordFromBcrypt)
                .input('role', sql.VarChar, data.role)
                .input('company_id', sql.Int, data.company_id) // Điều chỉnh kiểu dữ liệu nếu cần
                .query(`
                    INSERT INTO [User] (address_id, full_name, user_name, phone, email,  day_of_birth, password, role, company_id)
                    VALUES (@address_id, @full_name, @user_name, @phone, @email,  @day_of_birth, @password, @role, @company_id)
                `);

            resolve({
                errCode: 0,
                message: 'OK'
            });
        } catch (e) {
            reject(e);
        }
    })
};

export const handelUserLogin = async (email, password) => {
    return new Promise(async (resolve, reject) => {
        try {
            const pool = await connectDB(); // Kết nối cơ sở dữ liệu
            console.log(">>check", email)
            // Truy vấn để kiểm tra xem email có tồn tại không
            const result = await pool.request()
                .input('email', sql.VarChar, email)
                .query(`
                    SELECT email, password, role
                    FROM [User]
                    WHERE email = @email
                `);
            const user = result.recordset[0]; // Lấy dữ liệu người dùng từ kết quả truy vấn

            let userData = {};

            if (user) {
                const isPasswordValid = await bcrypt.compare(password, user.password);
                if (isPasswordValid) {
                    userData.errCode = 0;
                    userData.errMessage = 'OK';

                    // Xóa mật khẩu trước khi trả về dữ liệu người dùng
                    delete user.password;
                    userData.user = user;

                    let payload = {
                        email: user.email,
                        role: user.role,
                        user_name: user.user_name,
                        userId: user.id,
                        phone: user.phone,
                    }
                    let token = createJWT(payload);
                    userData.access_token = token
                } else {
                    userData.errCode = 3;
                    userData.errMessage = 'Wrong password';
                }
            } else {
                userData.errCode = 2;
                userData.errMessage = `User not found`;
            }

            resolve(userData);

        } catch (e) {
            console.error('Error during user login:', e);
            reject(e);
        }
    });
};

// Tạo đối tượng gửi email
const transporter = nodemailer.createTransport({
    host: "smtp.gmail.com",
    port: 587,
    secure: false, 
    auth: {
    user: process.env.EMAIL_USER,
    pass: process.env.EMAIL_PASS
}
});

// Hàm xử lý yêu cầu quên mật khẩu
export const requestPasswordReset = async (email) => {
    try {
        const pool = await connectDB();
        // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
        const result = await pool.request()
            .input('email', sql.VarChar, email)
            .query('SELECT * FROM [User] WHERE email = @email');

        if (result.recordset.length === 0) {
            throw new Error('Email not found');
        }

        // Sinh mã xác thực và lưu vào cơ sở dữ liệu
        const verificationCode = crypto.randomInt(100000, 999999); // Sinh mã 6 chữ số
        const expiryDate = new Date(Date.now() + 3600000); // Mã hết hạn sau 1 giờ
        await pool.request()
            .input('email', sql.VarChar, email)
            .input('verificationCode', sql.Int, verificationCode)
            .input('expiryDate', sql.DateTime, expiryDate)
            .query(`
                INSERT INTO PasswordResetCodes (email, verificationCode, expiryDate)
                VALUES (@email, @verificationCode, @expiryDate)
            `);

        // Gửi email cho người dùng với mã xác thực
        const mailOptions = {
            from: process.env.EMAIL_USER,
            to: email,
            subject: 'Password Reset Request',
            text: `You are receiving this because you (or someone else) have requested the reset of the password for your account.\n\n
            Your verification code is: ${verificationCode}\n\n
            This code is valid for 1 hour. If you did not request this, please ignore this email.`
        };

        await transporter.sendMail(mailOptions);

        return { message: 'Verification code sent to email' };

    } catch (error) {
        console.error('Error during password reset request:', error);
        throw new Error('Server error');
    }
};

// Hàm xử lý yêu cầu đặt lại mật khẩu
export const resetPassword = async (email, verificationCode, newPassword) => {
    try {
        const pool = await connectDB(); 

        // Kiểm tra mã xác thực và tính hợp lệ
        const result = await pool.request()
            .input('email', sql.VarChar, email)
            .input('verificationCode', sql.Int, verificationCode)
            .query(`
                SELECT * 
                FROM PasswordResetCodes 
                WHERE email = @email 
                AND verificationCode = @verificationCode 
            `);

        if (result.recordset.length === 0) {
            return { message: 'Verification code is invalid or has expired' };
        }

        // Mã hóa mật khẩu mới
        const hashedPassword = await bcrypt.hash(newPassword, 10);

        // Cập nhật mật khẩu mới cho người dùng
        await pool.request()
            .input('email', sql.VarChar, email)
            .input('password', sql.VarChar, hashedPassword)
            .query('UPDATE [User] SET Password = @password WHERE email = @email');

        // Xóa mã xác thực sau khi đã sử dụng
        await pool.request()
            .input('email', sql.VarChar, email)
            .input('verificationCode', sql.Int, verificationCode)
            .query('DELETE FROM PasswordResetCodes WHERE email = @email AND verificationCode = @verificationCode');

        return { message: 'Password has been reset' };

    } catch (error) {
        console.error('Error during password reset:', error);
        return { message: 'Server error' };
    }
};
