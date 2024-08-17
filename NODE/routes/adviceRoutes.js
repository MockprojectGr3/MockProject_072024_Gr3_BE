import SecurityAdviceController from "../controllers/adviceController";
import { Router } from "express";

const adviceRoutes = Router();

adviceRoutes.get("/advice", SecurityAdviceController.index);

export default adviceRoutes;