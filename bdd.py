import mysql.connector
conn = mysql.connector.connect(host="localhost",
                               user="root", password="root", 
                               database="restau-from-git")
cursor = conn.cursor()

cursor.execute("""SELECT u_name, u_password FROM users  """ )
rows = cursor.fetchall()
fichier = open("data.txt", "a")
for row in rows:
    fichier.write('{0} : {1} '.format(row[0], row[1]))
   
conn.close()
fichier.close()
