import configparser
import os
import time
import getpass

HOST='localhost'
PORT='8889'
DB_USER='root'
DB_PASS='root'
database='restau-from-git'
# if using one database... ('database1',)


filestamp = time.strftime('%Y-%m-%d-%I')
# D:/xampp/mysql/bin/mysqldump for xamp windows
os.popen("mysqldump -h %s -u %s  %s > %s.sql" % (HOST,DB_USER,DB_PASS,database,database+"_"+filestamp))

print("\n|| Database dumped to "+database+"_"+filestamp+".sql || ")



   
