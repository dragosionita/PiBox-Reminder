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

print time.time()

#Database connection
con = mdb.connect('localhost', 'root', 'dragos1234', 'pibox');

#Global variables
buttonPressed = False
menu = ['Wheather', 'Facebook', 'Reminder', 'Ip']
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
    #speech(getWeatherText(location))

def facebook():
    LCDmessage('    Facebook')

def reminder():
    cur = con.cursor()
    cur.execute("SELECT * FROM reminder") #$where scheduled='"+str(datetime.now())[:19] + "'")
    print str(datetime.now())[:19]
    numrows = int(cur.rowcount)
    for i in range(numrows):
        row = cur.fetchone()
        #print row[3]
        if (row):
            print str(row[3])
    LCDmessage('    Reminder')

while True:
    if (GPIO.input(17) == False):
        print(menu[currentMenu])
        
        if (menu[currentMenu] == 'Ip'):
            ip()
        elif (menu[currentMenu] == 'Facebook'):
            facebook()
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

