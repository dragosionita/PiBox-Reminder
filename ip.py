#!/usr/bin/python
# -*- coding:utf-8 -*-

from Adafruit_CharLCD import Adafruit_CharLCD
from subprocess import * 
from time import sleep, strftime
from datetime import datetime

lcd = Adafruit_CharLCD()

while 1:
    lcd.clear()
    lcd.message(datetime.now().strftime('%b %d  %H:%M:%S\n'))
    sleep(2)
