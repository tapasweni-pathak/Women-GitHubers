from apscheduler.schedulers.blocking import BlockingScheduler
import requests
import json
import string
import re
import psycopg2
import unicodedata
import os
import psycopg2
import urlparse
import logging
from datetime import datetime

logging.basicConfig()
sched = BlockingScheduler()
#add github developer OAuth Token here
OAuthToken = 'cf######################################'
def extract_users():
	count = 0
	userList = []
	Women_GitHubers_Readme = requests.get('https://raw.githubusercontent.com/tapasweni-pathak/Women-GitHubers/master/README.md')
	file_text = string.split(Women_GitHubers_Readme.text, '\n')
	for line in file_text:
		result = re.search('\(https\:\/\/github\.com\/(.*)\)', line)
		if result:
			userList.append(result.group(1))
	print len(userList), 'women githubers found'
	data = []
	for username in userList:
		count += 1
		print count, 'of', str(len(userList)) + ': Extracting', username,
		user = {}
		response = requests.get('https://api.github.com/users/' + username + '?access_token=' + OAuthToken)
		if(response.ok):
		    user_data = json.loads(response.text or response.content)
		    print '(',
		    print str_parse(user_data['name']),
		    print ')'
		    for x in user_data:
		    	if x in ('id','login','name','avatar_url','html_url','company','location','email','blog','public_repos','followers','following','created_at'):
		    		user[x] = user_data[x]
		    		if x == 'created_at':
		    			date = datetime.strptime(user_data[x], '%Y-%m-%dT%H:%M:%SZ')
		    			#print date, date.strftime("%b %d, %Y")
		    			user[x] = date.strftime("%b %d, %Y")
		data.append(user)
	add_user(data)

def str_parse(string):
	if string:
		return unicodedata.normalize('NFKD', string).encode('ascii','ignore')
	else:
		return string

def add_user(listofusers):
	urlparse.uses_netloc.append("postgres")
	url = urlparse.urlparse(os.environ["DATABASE_URL"])
	conn = psycopg2.connect(
	    database=url.path[1:],
	    user=url.username,
	    password=url.password,
	    host=url.hostname,
	    port=url.port
	)
	cur = conn.cursor()
	cur.execute("CREATE TABLE IF NOT EXISTS users (sno SERIAL NOT NULL,id BIGINT PRIMARY KEY NOT NULL, login char(128) NOT NULL, name char(128), html_url varchar(256), email varchar(256), company varchar(256), location varchar(256), blog varchar(256), avatar_url varchar(256), following BIGINT, followers BIGINT, public_repos bigint, created_at varchar(30));")
	for data in listofusers:
		#print data
		query = "INSERT INTO users (id,login,name,html_url,email,company,location,blog,avatar_url,following,followers,public_repos, created_at) SELECT "
		query += str(data['id']) + ', '
		query += '\'' + str(data['login']) + '\', '
		query += '\'' + str_parse(data['name']) + '\', ' if data['name'] else "null, "
		query += '\'' + str_parse(data['html_url']) + '\', '
		query += '\'' + str_parse(data['email']) + '\', ' if data['email'] else "null, "
		query += '\'' + str_parse(data['company']) + '\', ' if data['company'] else "null, "
		query += '\'' + str_parse(data['location']) + '\', ' if data['location'] else "null, "
		query += '\'' + str_parse(data['blog']) + '\', ' if data['blog'] else "null, "
		query += '\'' + str_parse(data['avatar_url']) + '\', ' if data['avatar_url'] else "null,  "
		query += str(data['following']) + ', ' if data['following'] else "null, "
		query += str(data['followers']) + ', ' if data['followers'] else "null, "
		query += str(data['public_repos']) + ', '  if data['public_repos'] else "null, "
		query += '\'' + str(data['created_at']) + '\' ' if data['created_at'] else "null "
		query += "WHERE NOT EXISTS (SELECT 1 FROM users WHERE id=" + str(data['id']) + ");"
		print 'Saving ', str(data['login']), str_parse(data['name'])
		cur.execute(query)
		conn.commit()	
	conn.close()
# check for new updates every 2 days
@sched.scheduled_job('cron', day_of_week='mon-fri', hour=48)
def scheduled_job():
	extract_users()

sched.start()
