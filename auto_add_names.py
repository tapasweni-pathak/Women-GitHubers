## This is a small script to automatically add your name in the list alphabetically

import re
import os

##part 1- Get the info
print('Welcome Women Githuber')
name=input('Enter the name you wish to see on the list::')
githandle=input('Enter your Git Handle (https://github.com, already appended)::')

f1=open('README.md','r+')
f2=open('temp.md','w')

## part 2 -Check the order and insert the values
for i in range(5):
	f2.write(next(f1))	
for value in f1:
	line=value
	if line.strip()!='':
		line=str(re.findall(r'\[([^]]*)\]', line))
		line=line.strip('[]\'')
		if line.lower()<=name.lower():
			f2.write(value+'\n')
		else:
		 	line='['+name+'](https://github.com/'+githandle+')'
		 	f2.write(line+'\n')
		 	break

for value in f1:
	f2.write(value)		 	
	
f1.close()
f2.close()
os.remove('README.md')
os.rename('temp.md','README.md')		
