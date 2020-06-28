import serial
import RPi.GPIO as GPIO
import os, time

target_path = "/var/www/html/OnomeWeb/resources/data/security/settings/s900_target"

GPIO.setmode(GPIO.BOARD)

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

print "[SecurDude] Current number is", target

os.system("sudo echo ''Composing SMS...'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/step_status")

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

port.write('AT+CMGS="'+ target + '"' + '\r\n')
rcv = port.read(10)
print rcv
time.sleep(1)

port.write('A suspected intrusion has been detected. Please visit http://192.168.2.25/OnomeWeb/security for more details.'+'\r\n')
rcv = port.read(10)
print rcv

port.write("\x1A") # Enable to send SMS
for i in range(10):
    rcv = port.read(10)
    print rcv

time.sleep(7)

os.system("sudo echo ''Calling target number...'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/step_status")

print "[SecurDude] Calling target number..."
port.write('ATD' + target + ';' + '\r\n')
rcv = port.read(10)
print rcv
time.sleep(1)

os.system("sudo echo ''System went back to sleep mode.'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/step_status")