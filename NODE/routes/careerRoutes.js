import careerController from "../controllers/careerController.js";
import { Router } from "express";

const careerRoutes = Router();

careerRoutes.get("/careers", careerController.index);

export default careerRoutes;