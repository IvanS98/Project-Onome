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

print "[SecurDude] Composing SMS..."
port.write('ATE0'+'\r\n')      # Disable the Echo
rcv = port.read(10)
print rcv
time.sleep(1)

port.write('AT+CMGF=1'+'\r\n')  # Select Message format as Text mode
rcv = port.read(10)
print rcv
time.sleep(1)

port.write('AT+CNMI=2,1,0,0,0'+'\r\n')   # New SMS Message Indications
rcv = port.read(10)
print rcv
time.sleep(1)

# Sending a message to a particular Number

port.write('AT+CMGS="+393713728605"'+'\r\n')
rcv = port.read(10)
print rcv
time.sleep(1)

port.write('A suspected intrusion has been detected. Please visit http://192.168.2.25/OnomeWeb/security for more details.'+'\r\n'$
rcv = port.read(10)
print rcv

port.write("\x1A") # Enable to send SMS
for i in range(10):
    rcv = port.read(10)
    print rcv