from flask import Flask, jsonify, request, abort
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mssql+pyodbc://sa:123456@DESKTOP-74S139L\\SQLEXPRESS/Mockproject?driver=ODBC+Driver+17+for+SQL+Server'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

class News(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(255), nullable=False)
    description = db.Column(db.Text, nullable=False)
    deleted_at = db.Column(db.DateTime, nullable=True)

    def to_dict(self):
        return {
            'id': self.id,
            'title': self.title,
            'description': self.description,
            'deleted_at': self.deleted_at
        }

@app.route('/news', methods=['GET'])
def get_news():
    news = News.query.all()
    return jsonify([n.to_dict() for n in news])

@app.route('/news/<int:news_id>', methods=['GET'])
def get_news_by_id(news_id):
    news = News.query.get(news_id)
    if news is None:
        abort(404)
    return jsonify(news.to_dict())

@app.route('/news', methods=['POST'])
def create_news():
    if not request.json or 'title' not in request.json or 'description' not in request.json:
        abort(400)
    news = News(
        title=request.json['title'],
        description=request.json['description'],
        deleted_at=request.json.get('deleted_at')
    )
    db.session.add(news)
    db.session.commit()
    return jsonify(news.to_dict()), 201

@app.route('/news/<int:news_id>', methods=['PUT'])
def update_news(news_id):
    news = News.query.get(news_id)
    if news is None:
        abort(404)
    if not request.json:
        abort(400)
    
    news.title = request.json.get('title', news.title)
    news.description = request.json.get('description', news.description)
    news.deleted_at = request.json.get('deleted_at', news.deleted_at)
    
    db.session.commit()
    return jsonify(news.to_dict())

@app.route('/news/<int:news_id>', methods=['DELETE'])
def delete_news(news_id):
    news = News.query.get(news_id)
    if news is None:
        abort(404)
    db.session.delete(news)
    db.session.commit()
    return jsonify({'result': True})

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
