import {  handelUserLogin, registerNewUser, requestPasswordReset, resetPassword } from '../services/authService.js';


export const handleRegister = async (req, res) => {
    let message = await registerNewUser(req.body);
    console.log(req.body);
    return res.status(200).json({
        message
    })
  };
export const handelLogin = async (req, res) => {
    let email = req.body.email;
    let password = req.body.password;

    if (!email || !password) {
        return res.status(500).json({
            errCode: 1,
            message: 'missing input parameter',

        })
    }

    let userData = await handelUserLogin(email, password);

    return res.status(200).json({
        errCode: userData.errCode,
        message: userData.errMessage,
        user: userData ? userData : {}
    })
    
}


////

/// Controller xử lý yêu cầu quên mật khẩu
export const handleRequestPasswordReset = async (req, res) => {
    const { email } = req.body;

    try {
        const response = await requestPasswordReset(email);
        res.status(200).json(response);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

// Controller xử lý yêu cầu đặt lại mật khẩu
export const handleResetPassword = async (req, res) => {
    const { email, verificationCode, newPassword } = req.body;

    try {
        const response = await resetPassword(email, verificationCode, newPassword);
        res.status(200).json(response);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};