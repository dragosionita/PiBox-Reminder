#!/usr/bin/python
#!/usr/bin/env python

# start.py 04/2013 Dragos Ionita

from Adafruit_CharLCD import Adafruit_CharLCD
import subprocess
import RPi.GPIO as GPIO
import time
import os
from datetime import datetime

import urllib2
from json import load

import MySQLdb as mdb
import sys



#Database connection
con = mdb.connect('localhost', 'root', 'dragos1234', 'pibox');

#Global variables
buttonPressed = False
menu = ['Stand By', 'Wheather', 'Reminder', 'Ip']
currentMenu = 0

firstMessage = '     Hello\n PiBox Reminder'
location='bucharest'

# Set GPIO Ports
GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.IN)

# Init LCD
lcd = Adafruit_CharLCD()

def clearLCD():
    lcd.clear()

def LCDmessage(message):
    clearLCD()
    lcd.message(message)

# Hello Message
LCDmessage(firstMessage)

# Utils functions
def speech(text):
    subprocess.call(['mpg123', 'http://tts-api.com/tts.mp3?q='+text])
    time.sleep(1)

def getWeatherText(location):
    req = urllib2.urlopen('http://openweathermap.org/data/2.1/find/name?q='+location)
    response = load(req)
    temp = response['list'][0]['main']['temp'] - 273
    weather = response['list'][0]['weather'][0]['main']

    text = 'Hello!' + ' in ' + location + ' now is ' + str(temp) + ' degrees Celsius and weather is ' + weather
    return text

# Main functions
def ip():
    LCDmessage('Your IP:\n   10.10.0.13')
    
def wheather():
    LCDmessage('    Wheather')
    speech(getWeatherText(location))

def standby():
    LCDmessage('    Stand By')

def facebook():
    LCDmessage('    Facebook')

def reminder():
    con = mdb.connect('localhost', 'root', 'dragos1234', 'pibox');
    cur = con.cursor()
    cur.execute("SELECT * FROM reminder") #$where scheduled='"+str(datetime.now())[:19] + "'")
    tm = time.time()
    tm = str(round(tm)).rstrip('0').rstrip('.')
    numrows = int(cur.rowcount)
    for i in range(numrows):
        row = cur.fetchone()
        if (tm == str(row[3])):
            speech(str(row[2]))
            
    LCDmessage('    Reminder')

while True:
    if (GPIO.input(17) == False):
        
        if (menu[currentMenu] == 'Ip'):
            ip()
        elif (menu[currentMenu] == 'Stand By'):
            standby()
        elif (menu[currentMenu] == 'Reminder'):
            reminder()
        elif (menu[currentMenu] == 'Wheather'):
            wheather()


        currentMenu = currentMenu + 1
        if (currentMenu > len(menu)-1):
            currentMenu = 0
        
    else:
        buttonPressed = False
        if (menu[currentMenu-1] == 'Reminder'):
            reminder()

    
    time.sleep(0.5)

