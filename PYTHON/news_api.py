import pandas as pd
from flask import Flask, request, jsonify

app = Flask(__name__)

# Đọc dữ liệu từ file Excel
data = pd.read_excel('data.xlsx')
data = data.to_dict('records')

@app.route('/api/v1/news', methods=['GET', 'POST'])
def getORadd_news():
    if request.method == 'GET':
        return jsonify(data)  # Trả về dữ liệu dưới dạng JSON
    elif request.method == 'POST':
        new_post = request.json
        data.append(new_post)
        return jsonify(new_post)  # Trả về bản ghi mới thêm

@app.route('/api/v1/news/<int:id>', methods=['GET'])
def get_one(id):
    news = next((r for r in data if r['id'] == id), None)
    if news is not None:
        return jsonify(news)  # Trả về bản ghi dưới dạng JSON
    return jsonify({'Error': 'Service not found'}), 404  # Trả về lỗi nếu không tìm thấy

if __name__ == '__main__':
    app.run(host='0.0.0.0')
