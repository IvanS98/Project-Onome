import serial
import time
import os
os.system("sudo touch /var/www/html/OnomeWeb/resources/data/tmp/onomeSerialAvailable")
print ("===============================================================")
print ("===============================================================")
print ("Welcome to Project Onome!")
time.sleep(0.3)
print("Interfacing with Arduino...")
arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)
while 1:
  if(arduinoSerialData.inWaiting()>0):
   onomeData = arduinoSerialData.readline()
   print onomeData