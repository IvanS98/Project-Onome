import serial
import time
import os
arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)
print ("[Onome] Starting autolights daemon...")
os.system("sudo echo ''Automated lights enabled'' > /var/www/html/OnomeWeb/resources/scripts/status/autolight/autolight_status")
os.system("sudo touch /var/www/html/OnomeWeb/resources/data/tmp/onomeAutoLightsOn")
while True:
 arduinoSerialData.write('c')
 time.sleep(5)