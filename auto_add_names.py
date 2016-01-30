## This is a small script to automatically add your name in the list alphabetically

import re
import os


 ## cheking the input function as per python version
if hasattr(__builtins__, 'raw_input'):
      input=raw_input

##part 1- Get the info
print('Welcome Women Githuber')
name=input('Enter the name you wish to see on the list::')
githandle=input('Enter your Git Handle (https://github.com, already appended)::')

#f1=open('README.md','r+')
#f2=open('temp.md','w')

with open('README.md','r+') as f1, open('temp.md','w') as f2:	
	for value in f1:
		line=value
		if line.strip()!='':
			line=str(re.findall(r'\[([^]]*)\]', line))
			line=line.strip('[]\'')
			if line.lower()<=name.lower():
				f2.write(value)
			else:
		 		f2.write('['+name+'](https://github.com/'+githandle+')\n\n')
		 		f2.write(value)
		 		break
		else:
			f2.write(line)	 	
	for value in f1:
		f2.write(value)		 	
	
#f1.close()
#f2.close()

os.replace('temp.md','README.md')	
