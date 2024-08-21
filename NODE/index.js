import express, { json, urlencoded } from 'express';
import dotenv from 'dotenv';
import morgan from "morgan";
import cors from "cors";

import router from './routes/index.js';
import errorHandler from './utils/errorHandler.js';
import { connectDB } from "./configs/dbConnect.js";
import serviceRoutes from "./routes/serviceRoutes.js";
// import adviceRoutes from "./routes/adviceRoutes.js";
import careerRoutes from "./routes/careerRoutes.js"
dotenv.config();

const app = express();

app.use(json());
app.use(urlencoded({ extended: true }));
app.use(morgan("dev"));
app.use(cors({ origin: "http://localhost:5173" }));

app.use(errorHandler);

app.use('/api', router);
app.use(serviceRoutes);
// app.use(adviceRoutes);
app.use(careerRoutes);
app.use('/api/v1', router);

connectDB();

const PORT = process.env.PORT || 8080;

app.listen(PORT, () => {
    console.log(`Server is running on PORT: ${PORT}`);
})