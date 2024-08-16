import { Router } from "express";
import { getNewsDetail } from "../controllers/newsController.js";
const newsRouter = Router();

newsRouter.get('/news-detail/:id', getNewsDetail);




export default newsRouter;