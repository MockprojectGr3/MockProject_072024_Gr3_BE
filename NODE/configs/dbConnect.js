import sql from 'mssql';

const dbConfig = {
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    server: process.env.DB_SERVER,
    database: process.env.DB_DATABASE_NAME,
    options: {
        instanceName: process.env.DB_INSTANCE_NAME || "",
        encrypt: true, // Use this if you're on Windows Azure
        trustedConnection: true,
        trustServerCertificate: true, // Change to false for production
        enableArithAbort: true,
    },
    port: process.env.DB_PORT,
};

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