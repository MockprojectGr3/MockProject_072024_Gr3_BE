import sql from 'mssql';
import dotenv from 'dotenv';

dotenv.config();

const dbConfig = {
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    server: process.env.DB_SERVER,
    database: process.env.DB_DATABASE_NAME,
    options: {
        instanceName: process.env.DB_INSTANCE_NAME || "",
        encrypt: false, // Use this if you're on Windows Azure
        trustedConnection: false,
        trustServerCertificate: true, // Change to false for production
        enableArithAbort: true,
    },
    port: +process.env.DB_PORT,
};

export const connectDB = async () => {
    try {
        const pool = await sql.connect(dbConfig);
        console.log('Connected to SQL Server');
        return pool;

    } catch (err) {
        console.error('Database connection failed:', err.message);
    }
};
