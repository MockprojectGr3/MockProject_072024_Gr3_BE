import sqlalchemy as db
from flask import Flask, request, url_for
from sqlalchemy import create_engine, text

app = Flask(__name__)

engine = create_engine('mssql+pyodbc://@DESKTOP-A6KDB9G/sql_practice?driver=ODBC+Driver+13+for+SQL+Server')
conn = engine.connect()

@app.route('/favicon.ico')
def favicon():
    return url_for('static', filename='favicon.png')

@app.route('/api/v1/training-courses', methods=['GET', 'POST'])
def getORadd_courses():
    if request.method=='GET':
        page = request.args.get('page')
        if page:
            page = int(page)*5
            q_result = conn.execute(text(f'SELECT course_id, name, [desc], dur, start_at, end_at, created_at, updated_at FROM training_courses WHERE deleted=0 AND course_id BETWEEN {page-4} AND {page};')).fetchall()
        else:
            q_result = conn.execute(text('SELECT course_id, name, [desc], dur, start_at, end_at, created_at, updated_at FROM training_courses WHERE deleted=0;')).fetchall()
        return [{'course_id':r[0], 'name':r[1], 'desc':r[2], 'dur':r[3], 'start_at':r[4], 'end_at':r[5], 'created_at':r[6], 'updated_at':r[7]} for r in q_result]
    elif request.method=='POST':
        new_course = request.json
        if type(new_course)==dict:
            new_course = [new_course]
        for c in new_course:
            course_id = conn.execute(text('SELECT MAX(course_id)+1 FROM training_courses;')).fetchone()[0]
            name = c['name']
            desc = c['desc']
            dur = c['dur']
            start_at = c['start_at']
            end_at = c['end_at']
            created_at = c['created_at']
            updated_at = c['updated_at']
            conn.execute(text(f"INSERT INTO training_courses VALUES({course_id}, '{name}', '{desc}', '{dur}', '{start_at}', '{end_at}', '{created_at}', '{updated_at}', 0);"))
            conn.commit()
        return f"New course(s) created."

@app.route('/api/v1/training-courses/<int:course_id>', methods=['GET', 'DELETE'])
def get_course(course_id):
    q_result = conn.execute(text('SELECT course_id, name, [desc], dur, start_at, end_at, created_at, updated_at FROM training_courses WHERE deleted=0 AND course_id={};'.format(course_id))).fetchone()
    if q_result:
        if request.method=='GET':
            conn.rollback()
            return {'course_id':q_result[0], 'name':q_result[1], 'desc':q_result[2], 'dur':q_result[3], 'start_at':q_result[4], 'end_at':q_result[5], 'created_at':q_result[6], 'updated_at':q_result[7]}
        elif request.method=='DELETE':
            conn.execute(text('UPDATE training_courses SET deleted=1 WHERE course_id={};'.format(course_id)))
            conn.commit()
            return 'Course with id {} is deleted.'.format(course_id)
    return 'Cannot find course with id {}.'.format(course_id)

if __name__=='__main__':
    app.run(debug=True, host='0.0.0.0')