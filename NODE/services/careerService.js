import { connectDB } from "../configs/dbConnect.js";
import { CAREER } from "../constant/variable.js";
const pool = await connectDB();

class CareerService {
  async available() {
    try {
      const request = pool.request();
      const result = await request.query(
        ` SELECT * FROM [MockProject_072024_Nhom3].[dbo].[Recruitment] WHERE [status] = 'open'`
      );
      return result.recordset;
    } catch (error) {
      throw new Error("Failed to retrieve career: " + error.message);
    }
  }
}

export default new CareerService();
