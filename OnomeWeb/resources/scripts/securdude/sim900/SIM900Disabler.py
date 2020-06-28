import serial
import RPi.GPIO as GPIO
import os, time

GPIO.setmode(GPIO.BOARD)

# Enable Serial Communication
arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)

print "[SecurDude] Starting SIM900 service..."
print "[SecurDude] Shutting down module..."
os.system("echo z > /dev/ttyACM0")
print "[SecurDude] All done!"
