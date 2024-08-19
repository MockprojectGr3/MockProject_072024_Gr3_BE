import sqlalchemy as db
from flask import Flask, request, url_for
from sqlalchemy import create_engine, text

app = Flask(__name__)

engine = create_engine('mssql+pyodbc://@DESKTOP-A6KDB9G/sql_practice?driver=ODBC+Driver+13+for+SQL+Server')
conn = engine.connect()

@app.route('/favicon.ico')
def favicon():
    return url_for('static', filename='favicon.png')

@app.route('/api/v1/feedback-request', methods=['GET', 'POST'])
def getORadd_feedbacks():
    if request.method=='GET':
        page = request.args.get('page')
        if page:
            page = int(page)*5
            q_result = conn.execute(text(f'SELECT * FROM feedback_request WHERE feedback_id BETWEEN {page-4} AND {page};')).fetchall()
        else:
            q_result = conn.execute(text('SELECT * FROM feedback_request WHERE feedback_id>0;')).fetchall()
        return [{'feedback_id':r[0], 'customer_id':r[1], 'contract_id':r[2], 'feedback':r[3], 'created_at':r[4]} for r in q_result]
    elif request.method=='POST':
        new_feedback = request.json
        feedback_id = conn.execute(text('SELECT MAX(feedback_id)+1 FROM feedback_request;')).fetchone()[0]
        customer_id = new_feedback['customer_id']
        contract_id = new_feedback['contract_id']
        feedback = new_feedback['feedback']
        created_at = new_feedback['created_at']
        conn.execute(text(f"INSERT INTO feedback_request VALUES({feedback_id}, {customer_id}, {contract_id}, '{feedback}', '{created_at}')"))
        conn.commit()
        return '200'

if __name__=='__main__':
    app.run()