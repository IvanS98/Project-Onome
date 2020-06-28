import serial
import RPi.GPIO as GPIO
import os, time, os.path

GPIO.setmode(GPIO.BOARD)

target_path = "/var/www/html/OnomeWeb/resources/data/security/settings/s900_target"

# Enable Serial Communication
port = serial.Serial("/dev/ttyS0", baudrate=9600, timeout=1)

print "[SecurDude] Waiting for module..."
port.write('AT'+'\r\n')
rcv = port.read(10)
print rcv
time.sleep(0.01)

with open(target_path, 'r') as get_target:
    target = get_target.read()
    get_target.close()

print "[SecurDude] Selected target number is", target

print "[SecurDude] Calling target number..."
port.write('ATD' + target + ';' + '\r\n')
rcv = port.read(10)
print rcv
time.sleep(1)