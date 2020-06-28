import serial
import time
import os
print ("[Onome] Disabling DHT daemon...")
os.system("sudo pkill -f OnomeTempHumOn.py")
os.system("sudo pkill -f rundht11.sh")
os.system("sudo pkill -f getdht11.py")
os.system("sudo echo ''--'' > /var/www/html/OnomeWeb/resources/scripts/status/temphum/temp_status")
os.system("sudo echo ''Sensor disabled'' > /var/www/html/OnomeWeb/resources/scripts/status/temphum/hum_status")
os.system("sudo echo 'Welcome back!' > /var/www/html/OnomeWeb/resources/scripts/status/temphum/welcome_status")
os.system("sudo rm -R /var/www/html/OnomeWeb/resources/data/tmp/onomeDHT11On")
arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)
arduinoSerialData.write('b')
print ("[Onome] Sensor disabled!")