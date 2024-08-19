from flask import Flask, jsonify
from flask_sqlalchemy import SQLAlchemy

# Khởi tạo Flask app
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mssql+pyodbc://sa:123456@DESKTOP-74S139L\\SQLEXPRESS/Mockproject?driver=ODBC+Driver+17+for+SQL+Server'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

# Định nghĩa model Service tương ứng với bảng 'Service' trong cơ sở dữ liệu
class Service(db.Model):
    __tablename__ = 'Service'
    id = db.Column(db.Integer, primary_key=True)
    company_id = db.Column(db.Integer)
    name = db.Column(db.String)
    description = db.Column(db.String)
    price = db.Column(db.Float)
    deleted_at = db.Column(db.DateTime)

# Định nghĩa route để lấy danh sách các dịch vụ từ bảng 'Service'
@app.route('/api/services', methods=['GET'])
def get_services():
    services = Service.query.all()  # Truy vấn tất cả các bản ghi trong bảng 'Service'
    result = []
    
    # Duyệt qua các bản ghi và chuyển thành dạng dictionary để trả về JSON
    for service in services:
        service_data = {
            'id': service.id,
            'company_id': service.company_id,
            'name': service.name,
            'description': service.description,
            'price': service.price,
            'deleted_at': service.deleted_at
        }
        result.append(service_data)
    
    # Trả về danh sách dịch vụ dưới dạng JSON
    return jsonify(result)

# Chạy ứng dụng Flask
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
