import { connectDB } from "../configs/dbConnect.js";

export const handlerNewsDetail = async (inputId) => {
    return new Promise(async (resolve, reject) => {
        try {
            const pool = await connectDB();
            await pool.query(
                `SELECT News.*, NewsImages.image_id, Images.url
                FROM news
                JOIN NewsImages ON NewsImages.news_id = News.id
                JOIN Images ON Images.id = NewsImages.image_id
                WHERE news.id = ${inputId}`, (err, data) => {
                if (err) throw new Error("Query failed");
                console.log('data: ', data)
                resolve(data.recordset[0]);
            })
        } catch (error) {
            console.log(error);
            reject(error);
        }
    });
};




