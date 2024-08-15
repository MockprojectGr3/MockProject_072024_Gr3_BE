import { Router } from "express";
import { handelLogin,handleRegister } from "../controllers/userController.js";
import newsRouter from './news.route.js';

const router = Router();

router.use('/news', newsRouter);


router.post('/login', handelLogin)
router.post('/register', handleRegister);

export default router;