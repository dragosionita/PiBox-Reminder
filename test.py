import urllib2
import subprocess
import random
from json import load
import time
from time import gmtime, strftime

req = urllib2.urlopen('http://openweathermap.org/data/2.1/find/name?q=bucharest')
res = load(req)

temp = res['list'][0]['main']['temp'] - 273
weather = res['list'][0]['weather'][0]['main']
while True:
	x = 'Good Morning! ' + 'In Bucharest now is ' + str(temp) +' degrees Celsius and weather is ' + weather 
	#x = strftime("%S", gmtime()) + 'degrees Celsius.'
	subprocess.call(['mpg123','http://tts-api.com/tts.mp3?q='+x])
	#print 'xxxxxxxxxxxxxxxxxxxxxxxxxx'
	time.sleep(1)
