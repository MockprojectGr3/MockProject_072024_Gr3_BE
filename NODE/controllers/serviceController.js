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

  async about(req, res) {
    try {
      const services = await ServiceService.aboutGuarid();
      res.json(services);
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }
  async tracking(req, res) {
    try {
      const tracking = [
        {
          id: 1,
          bodyguard_name: "John Doe",
          phone: "097-555-0101",
          level: "High Level",
          start_date: "2023-01-15",
          end_date: "2023-04-15",
          status: "on finish",
        },
        {
          id: 2,
          bodyguard_name: "Jane Smith",
          phone: "012-555-0102",
          level: "High Level",
          start_date: "2023-02-01",
          end_date: "2023-05-01",
          status: "on finish",
        },
        {
          id: 3,
          bodyguard_name: "Mike Johnson",
          phone: "033-555-0103",
          level: "High Level",
          start_date: "2023-03-10",
          end_date: "2023-06-10",
          status: "on going",
        },
        {
          id: 4,
          bodyguard_name: "Emily Davis",
          phone: "022-555-0104",
          level: "High Level",
          start_date: "2023-04-20",
          end_date: "2023-07-20",
          status: "on going",
        },
        {
          id: 5,
          bodyguard_name: "David Wilson",
          phone: "098-555-0105",
          level: "Normal Level",
          start_date: "2023-05-15",
          end_date: "2023-08-15",
          status: "on finish",
        },
        {
          id: 6,
          bodyguard_name: "Sophia Brown",
          phone: "097-555-0106",
          level: "High Level",
          start_date: "2023-06-01",
          end_date: "2023-09-01",
          status: "on going",
        },
        {
          id: 7,
          bodyguard_name: "James Taylor",
          phone: "099-555-0107",
          level: "Normal Level",
          start_date: "2023-07-05",
          end_date: "2023-10-05",
          status: "on going",
        },
        {
          id: 8,
          bodyguard_name: "Olivia Martinez",
          phone: "099-555-0108",
          level: "High Level",
          start_date: "2023-07-10",
          end_date: "2023-10-10",
          status: "on going",
        },
        {
          id: 9,
          bodyguard_name: "Daniel Anderson",
          phone: "099-555-0109",
          level: "Normal Level",
          start_date: "2023-08-15",
          end_date: "2023-11-15",
          status: "on finish",
        },
        {
          id: 10,
          bodyguard_name: "Mia Thomas",
          phone: "033-555-0110",
          level: "Normal Level",
          start_date: "2023-09-01",
          end_date: "2023-12-01",
          status: "on going",
        },
        {
          id: 11,
          bodyguard_name: "Lucas Jackson",
          phone: "022-555-0111",
          level: "High Level",
          start_date: "2023-09-15",
          end_date: "2023-12-15",
          status: "on going",
        },
        {
          id: 12,
          bodyguard_name: "Ava White",
          phone: "080-555-0112",
          level: "High Level",
          start_date: "2023-10-05",
          end_date: "2024-01-05",
          status: "on finish",
        },
        {
          id: 13,
          bodyguard_name: "Ethan Harris",
          phone: "091-555-0113",
          level: "High Level",
          start_date: "2023-10-15",
          end_date: "2024-01-15",
          status: "on going",
        },
        {
          id: 14,
          bodyguard_name: "Sophia Martin",
          phone: "011-555-0114",
          level: "High Level",
          start_date: "2023-11-01",
          end_date: "2024-02-01",
          status: "on going",
        },
        {
          id: 15,
          bodyguard_name: "Liam Lee",
          phone: "099-555-0115",
          level: "Goodbye",
          start_date: "2023-11-10",
          end_date: "2024-02-10",
          status: "on going",
        },
      ];
      res.json(tracking);
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }
}

export default new ServiceController();
