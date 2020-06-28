#!/usr/bin/env python
# -*- coding: utf8 -*-

import RPi.GPIO as GPIO
import MFRC522
import signal
import time
import os
import subprocess
import serial

arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)

# Keys allowed

ONM1710 = [218, 248, 55, 187, 174] # HOMEGATE
ONM1711 = [16, 250, 54, 187, 103] # SECURITY ALARM
ONM1712 = [208, 2, 131, 124, 45] # AUTOLIGHTS

# Special keys
RKILL = [61, 193, 27, 194, 37]
SYSOFF = [224, 217, 193, 128, 120]
SYSREB = [61, 65, 55, 114, 57]

# Devices status
atlhg_status = 0

continue_reading = True

def keyauthorized():
    arduinoSerialData.write('R')
    print "[SecurDude] Key authorized!"

def keyauthorizedd():
    arduinoSerialData.write('s')
    print "[SecurDude] Key authorized!"

def keyrefused():
    arduinoSerialData.write('r')
    print "[SecurDude] Key refused!"

# Create an object of the class MFRC522
MIFAREReader = MFRC522.MFRC522()

os.system("sudo touch /var/www/html/OnomeWeb/resources/data/tmp/onomeRFIDAvailable")
print "[SecurDude] Welcome to RFIDRead"
time.sleep(0.1)
print "[SecurDude] Getting ready..."
time.sleep(0.2)
print "[SecurDude] Device ready!"

while continue_reading:
    time.sleep(0.5)
    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)

    if status == MIFAREReader.MI_OK:
        print "[SecurDude] Key detected:"

    (status,uid) = MIFAREReader.MFRC522_Anticoll()

    if status == MIFAREReader.MI_OK:
        print uid

        # Manage home gate
        if (uid == ONM1710):
            keyauthorized()
            arduinoSerialData.write('q')
            continue

        # Manage security alarm
        if (uid == ONM1711):
            keyauthorized()
            os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/securdude/SecurDudeAlarmTrigger.py")
            continue
        
        if (uid == ONM1712 and atlhg_status == 0):
            keyauthorized()
            os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/OnomeAutoLightOn.py &")
            atlhg_status = 1
            continue

        if (uid == ONM1712 and atlhg_status == 1):
            keyauthorized()
            os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/OnomeAutoLightOff.py &")
            atlhg_status = 0
            continue
			
		if (uid == RKILL):
            try:
                task_check = subprocess.check_output(['pgrep', '-f', 'RFIDDisablerOnline.py'])
                success = True
                keyauthorized()
                os.system("touch /var/www/html/OnomeWeb/resources/data/tmp/onomeRFIDDisablerProcessing")
                os.system("sudo rm -r /var/www/html/OnomeWeb/resources/data/tmp/onomeRFIDAvailable")
                print "[SecurDude] RFID processes are going to be killed!!!"
                time.sleep(0.5)
                os.system("sudo pkill -f RFIDDisablerOnline.py")
                arduinoSerialData.write('s')
                os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/RFID/RFIDOff.py")
            except subprocess.CalledProcessError as e:
                print e.output
                success = False
                print "[SecurDude] Error: RFIDDisabler is not running!"
                keyrefused()
            continue

        # These will shutdown and restart system
        if (uid == SYSOFF):
            keyauthorized()
            os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/system/sys_off.py")
            continue
        
        if (uid == SYSREB):
            keyauthorized()
            os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/system/sys_restart.py")
            continue

        # Else
        else:
            keyrefused()
