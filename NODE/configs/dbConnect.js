import sql from 'mssql';

const dbConfig = {
    user: 'sa',
    password: '123456',
    server: 'localhost',
    database: 'MockProject_072024_Nhom3_v1',
    options: {
        encrypt: true,
        trustServerCertificate: true,
        enableArithAbort: true,
    },
    port: 1433,
};

const poolPromise = new sql.ConnectionPool(dbConfig)
    .connect()
    .then(pool => {
        console.log('Connected to SQL Server');
        return pool;
    })
    .catch(err => {
        console.error('Database connection failed:', err);
        process.exit(1);
    });

export const connectDB = () => poolPromise;
