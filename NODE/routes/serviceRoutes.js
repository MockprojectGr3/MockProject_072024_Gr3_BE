import express from "express";
import ServiceController from "../controllers/serviceController.js";

const router = express.Router();

router.get("/services", ServiceController.index);

router.get("/about-guarid", ServiceController.about);

export default router;
