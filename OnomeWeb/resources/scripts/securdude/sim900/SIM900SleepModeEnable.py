import serial
import RPi.GPIO as GPIO
import os, time

GPIO.setmode(GPIO.BOARD)

# Enable Serial Communication
port = serial.Serial("/dev/ttyS0", baudrate=9600, timeout=1)

print "[SecurDude] Waiting for module..."
port.write('AT'+'\r\n')
rcv = port.read(10)
print rcv
time.sleep(0.01)

print "[SecurDude] Forcing AT Sleep Mode to 1. Modem will now enter sleep mode!!!"
port.write('AT+CSCLK=1'+'\r\n')
rcv = port.read(10)
print rcv
time.sleep(1)

print "[SecurDude] AT Sleep Mode enabled successfully!"