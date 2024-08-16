import expressAsyncHandler from "express-async-handler";
import { handlerNewsDetail } from '../services/newsService.js';

export const getNewsDetail = async (req, res) => {
    let inputId = req.params.id;
    if (!inputId) return res.json({
        errCode: 400,
        errMessage: `Missing required parameter`
    })
    let response = await handlerNewsDetail(inputId);
    return res.json(response);
};