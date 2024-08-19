import sqlalchemy as db
from flask import Flask, request, url_for
from sqlalchemy import create_engine, text

app = Flask(__name__)

engine = create_engine('mssql+pyodbc://@DESKTOP-A6KDB9G/sql_practice?driver=ODBC+Driver+13+for+SQL+Server')
conn = engine.connect()

@app.route('/favicon.ico')
def favicon():
    return url_for('static', filename='favicon.png')

@app.route('/api/v1/service-price', methods=['GET', 'POST'])
def getORadd_services():
    if request.method=='GET':
        page = request.args.get('page')
        if page:
            page = int(page)*5
            q_result = conn.execute(text(f'SELECT se_id, se_name, se_desc, se_price FROM service_price WHERE deleted=0 AND se_id BETWEEN {page-4} AND {page};')).fetchall()
        else:
            q_result = conn.execute(text('SELECT se_id, se_name, se_desc, se_price FROM service_price WHERE deleted=0;')).fetchall()
        return [{'se_id':r[0], 'se_name':r[1], 'se_desc':r[2], 'se_price':float(r[3])} for r in q_result]
    elif request.method=='POST':
        new_se = request.json
        if type(new_se)==dict:
            new_se = [new_se]
        for se in new_se:
            se_id = conn.execute(text('SELECT MAX(se_id)+1 FROM service_price;')).fetchone()[0]
            company_id = se_id
            se_name = se['se_name']
            se_desc = se['se_desc']
            se_price = se['se_price']
            deleted = 0
            conn.execute(text(f"INSERT INTO service_price VALUES({se_id}, NULL, '{se_name}', '{se_desc}', {se_price}, {deleted})"))
            conn.commit()
        return f"Service(s) inserted."

@app.route('/api/v1/service-price/<int:se_id>', methods=['GET', 'DELETE'])
def get_service(se_id):
    q_result = conn.execute(text('SELECT se_id, se_name, se_desc, se_price FROM service_price WHERE deleted=0 AND se_id={};'.format(se_id))).fetchone()
    if q_result:
        if request.method=='GET':
            conn.rollback()
            return {'se_id':q_result[0], 'se_name':q_result[1], 'se_desc':q_result[2], 'se_price':float(q_result[3])}
        elif request.method=='DELETE':
            conn.execute(text('UPDATE service_price SET deleted=1 WHERE se_id={};'.format(se_id)))
            conn.commit()
            return 'Service with id {} is deleted.'.format(se_id)
    return 'Cannot find service with id {}.'.format(se_id)

if __name__=='__main__':
    app.run(host='0.0.0.0')