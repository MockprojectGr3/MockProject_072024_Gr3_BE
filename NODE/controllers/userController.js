import expressAsyncHandler from "express-async-handler";
import {  handelUserLogin, registerNewUser } from '../services/userService.js';


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
    console.log(">>check controller", userData)
    return res.status(200).json({
        errCode: userData.errCode,
        message: userData.errMessage,
        user: userData ? userData : {}
    })
    
}

