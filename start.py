#!/usr/bin/python
#!/usr/bin/env python

# start.py 04/2013 Dragos Ionita

from Adafruit_CharLCD import Adafruit_CharLCD
from subprocess import *
import RPi.GPIO as GPIO
import time
import os

#Global variables
buttonPressed = False
menu = ['Wheather', 'Facebook', 'Reminder', 'Ip']
currentMenu = 0



# Set GPIO Ports
GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.IN)

# Init LCD
lcd = Adafruit_CharLCD()

def clearLCD():
    lcd.clear()

def LCDmessage(message):
    lcd.message(message)

def ip():
    #print('Ip:\n10.10.0.13');
    clearLCD()
    LCDmessage('Your IP:\n10.10.0.13')
    


while True:
    if (GPIO.input(17) == False):
        print(menu[currentMenu]);
        
        if (menu[currentMenu] == 'Ip'):
            ip()

        currentMenu = currentMenu + 1
        if (currentMenu > len(menu)-1):
            currentMenu = 0
        time.sleep(1)
    else:
        buttonPressed = False


