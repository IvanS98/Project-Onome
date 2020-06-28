import serial
import time
import os
print ("[Onome] Disabling autolights daemon...")
os.system("sudo pkill -f OnomeAutoLightOn.py")
os.system("sudo echo ''Automated lights disabled'' > /var/www/html/OnomeWeb/resources/scripts/status/autolight/autolight_status")
os.system("sudo rm -f /var/www/html/OnomeWeb/resources/data/tmp/onomeAutoLightsOn")
arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)
arduinoSerialData.write('d')
print ("[Onome] Autolights disabled!")