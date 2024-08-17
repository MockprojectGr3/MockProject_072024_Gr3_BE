import express from "express";
import SecurityAdviceController from "../controllers/adviceController";
// import SecurityAdviceController,{ index } from "../controllers/adviceController";

const adviceRoutes = express.Router();

adviceRoutes.get("/advice", SecurityAdviceController.index);
// adviceRoutes.get("/advice", index);

export default adviceRoutes;