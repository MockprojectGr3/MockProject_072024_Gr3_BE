import { connectDB } from "../configs/dbConnect.js";

const pool = await connectDB();

class ServiceService {
  async getAllServices() {
    try {
      const request = pool.request();
      const result = await request.query("SELECT * FROM [dbo].[Service]");
      return result.recordset;
    } catch (error) {
      throw new Error("Failed to retrieve services: " + error.message);
    }
  }

  async aboutGuarid() {
    try {
      const result = [
        "Established in 2000",
        "Trusted security provider",
        "Smart features for enhanced safety",
        "Two decades of experience",
        "Innovative security solutions",
        "Prioritizing your safety",
      ];
      return result;
    } catch (error) {
      throw new Error("Failed to retrieve services: " + error.message);
    }
  }

  async ourService() {
    try {
      const request = pool.request();
      const result = await request.query("SELECT * FROM [dbo].[Service]");
      return result.recordset;
    } catch (error) {
      throw new Error("Failed to retrieve services: " + error.message);
    }
  }
}

export default new ServiceService();