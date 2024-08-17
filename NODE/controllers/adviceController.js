import adviceService from "../services/adviceService.js";

class AdviceController {
  async index(req, res) {
    try {
      const securityAdvice = await adviceService.index();
      res.json(securityAdvice);
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }
}

export default new AdviceController();