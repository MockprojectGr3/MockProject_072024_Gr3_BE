import sql from "mssql/msnodesqlv8.js";
import dotenv from "dotenv";

dotenv.config();

const dbConfig = {
  user: process.env.DB_USER,
  server: process.env.DB_SERVER,
  database: process.env.DB_DATABASE_NAME,
  options: {
    trustedConnection: true,
  },
  port: +process.env.DB_PORT || 1433,
};

const poolPromise = new sql.ConnectionPool(dbConfig)
  .connect()
  .then((pool) => {
    console.log("Connected to SQL Server");
    return pool;
  })
  .catch((err) => {
    console.error("Database connection failed:", err);
    process.exit(1);
  });

export const connectDB = () => poolPromise;
