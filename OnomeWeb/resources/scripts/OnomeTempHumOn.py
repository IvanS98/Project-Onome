import serial
import time
import os
arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)
print ("[Onome] Starting DHT daemon...")
os.system("sudo touch /var/www/html/OnomeWeb/resources/data/tmp/onomeDHT11On")
os.system("sudo /var/www/html/OnomeWeb/resources/scripts/DHT11_RPi/rundht11.sh &")
while True:
 arduinoSerialData.write('a')
 time.sleep(60)