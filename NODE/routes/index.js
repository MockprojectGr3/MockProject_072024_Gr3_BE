import { Router } from "express";
import { handelLogin,handleRegister,handleRequestPasswordReset , handleResetPassword } from "../controllers/authController.js";
import newsRouter from './news.route.js';

const router = Router();

router.use('/news', newsRouter);


router.post('/login', handelLogin)
router.post('/register', handleRegister);
router.post('/forgot-password', handleRequestPasswordReset);
router.post('/reset-password', handleResetPassword);

export default router;