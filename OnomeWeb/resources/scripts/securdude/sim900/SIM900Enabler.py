import serial
import RPi.GPIO as GPIO
import os, time

GPIO.setmode(GPIO.BOARD)

# Enable Serial Communication
port = serial.Serial("/dev/ttyS0", baudrate=9600, timeout=1)
arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)

print "[SecurDude] Starting SIM900 service..."
time.sleep(20)
os.system("echo z > /dev/ttyACM0")
time.sleep(5)
print "[SecurDude] Starting SIM900SleepModeDisable service..."
os.system("python /var/www/html/OnomeWeb/resources/scripts/securdude/sim900/SIM900SleepModeDisable.py &")
print "[SecurDude] Waiting for GSM connection. This will take a few seconds..."
time.sleep(10)
print "[SecurDude] Waiting for module..."
port.write('AT'+'\r\n')
rcv = port.read(10)
print rcv
time.sleep(0.01)
print "[SecurDude] Module ready!"
print "[SecurDude] All done!"