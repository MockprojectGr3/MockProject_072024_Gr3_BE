import ServiceService from "../services/serviceService.js";

class ServiceController {
  async index(req, res) {
    try {
      const services = await ServiceService.getAllServices();
      res.json(services);
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }
  // Test protected branch
}

export default new ServiceController();