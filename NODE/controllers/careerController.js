import careerService from "../services/careerService.js";

class CareerController {
  async index(req, res) {
    try {
      const career = await careerService.available();
      res.json(career);
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }
}

export default new CareerController();