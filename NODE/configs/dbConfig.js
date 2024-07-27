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

export default dbConfig;