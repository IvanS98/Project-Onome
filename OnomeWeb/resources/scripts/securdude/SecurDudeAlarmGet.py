import RPi.GPIO as GPIO
import os
import os.path
import time

securdude_alert_input = '/var/www/html/OnomeWeb/resources/scripts/securdude/alert_input'
securdude_movement_output = '/var/www/html/OnomeWeb/resources/scripts/status/alarm/movement_status'

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(23, GPIO.IN)
time.sleep(0.1)
print ("[SecurDude] System is calibrating sensor. Please wait...")
time.sleep(20)
print ("[SecurDude] Sensor calibration complete!")
os.system("sudo echo ''Waiting for motion...'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/step_status")
while True:
	i=GPIO.input(23)
	if i ==0:
		print "[SecurDude] Motion not detected!",i
		time.sleep(0.1)
		print "[SecurDude] OKAY! Writing data to log..."
		with open(securdude_alert_input, 'w') as alert_input:
			alert_input.write("0")
			alert_input.close
		time.sleep(1)
	elif i==1:
		print "[SecurDude] Motion detected!",i
		time.sleep(0.1)
		print "[SecurDude] OKAY! Writing data to log..."
		with open(securdude_alert_input, 'w') as alert_input:
			alert_input.write("1")
			alert_input.close
		os.system("sudo echo ''Updating status info...'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/step_status")
		os.system("sudo echo ''A suspected intrusion has been detected'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/alarm_status")
		os.system("sudo touch /var/www/html/OnomeWeb/resources/data/tmp/onomeSecurDudeAlarmAlert")
		with open(securdude_movement_output, 'w') as movement_output:
			movement_output.write("Latest status recorded on " + time.strftime("%c"))
			movement_output.close
		print "[SecurDude] Triggering SIM900 daemon..."
		os.system("python /var/www/html/OnomeWeb/resources/scripts/securdude/sim900/SIM900TargetTrigger.py")
		break
os.system("sudo pkill -f SecurDudeAlarmGet.py")
