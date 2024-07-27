import sql from 'mssql';
import dbConfig from './dbConfig.js';

const pool = new sql.ConnectionPool(dbConfig);

const connectDB = async () => {
    try {
        await pool.connect();
        console.log('Connected to SQL Server');
    } catch (err) {
        console.error('Database connection failed:', err);
    }
};

export { pool, connectDB };