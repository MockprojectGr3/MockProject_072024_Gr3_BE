import { Router } from "express";

import newsRouter from './news.route.js';

const router = Router();

router.use('/news', newsRouter);

export default router;