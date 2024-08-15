import { connectDB } from "../configs/dbConnect.js";
import sql from 'mssql'; // Đảm bảo rằng sql được import đúng cách
import bcrypt from 'bcryptjs';

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


