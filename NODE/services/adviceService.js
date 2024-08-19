import { connectDB } from "../configs/dbConnect.js";
const pool = await connectDB();

class adviceService {
  async index() {
    try {
      const request = pool.request();
      const result = await request.query(
        `SELECT 
            f.id,
            f.user_id,
            u.full_name AS user_name,
            f.content,
            f.createdAt,
        FROM 
            [MockProject_072024_Nhom3].[dbo].[Feedback] f
        JOIN 
            [MockProject_072024_Nhom3].[dbo].[User] u ON f.user_id = u.id`
      );
      return result.recordset;
    } catch (error) {
      throw new Error("Failed to retrieve advices: " + error.message);
    }
  }
}

export default new adviceService();
