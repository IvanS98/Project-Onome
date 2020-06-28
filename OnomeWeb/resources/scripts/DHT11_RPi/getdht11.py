#-*- coding: utf-8 -*-
import RPi.GPIO as GPIO
import dht11
import os.path
import time
temp_path = '/var/www/html/OnomeWeb/resources/scripts/status/temphum/temp_status'
hum_path = '/var/www/html/OnomeWeb/resources/scripts/status/temphum/hum_status'
wlc_path = '/var/www/html/OnomeWeb/resources/scripts/status/temphum/welcome_status'
degree = unichr(176)

# initialize GPIO
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()

# Read istance using pin 22 from RPi
DHTinstance = dht11.DHT11(pin=22)

while True:
    DHTresult = DHTinstance.read()
    if DHTresult.is_valid():
	# Measure temperature
		print("[DHT] Measuring temperature...")
		DHTtempMeasure = 0
		DHTtempTotal = 0
		for DHTtempMeasure in range(0, 10):
			DHTtempVal = DHTresult.temperature
			DHTtempTotal = DHTtempTotal + DHTtempVal
		DHTtempAverage = DHTtempTotal / 10
	# Measure humidity
		print("[DHT] Measuring humidity...")
		DHThumMeasure = 0
		DHThumTotal = 0
		for DHThumMeasure in range(0, 10):
			DHThumVal = DHTresult.humidity
			DHThumTotal = DHThumTotal + DHThumVal
		DHThumAverage = DHThumTotal / 10
		print("[DHT] Temperature is %d°C" % DHTtempAverage)
		print("[DHT] Humidity is %d %%" % DHThumAverage)
		print("[DHT] Writing data to log...")
		with open(temp_path, 'w') as tf:
			tf.write("%d°C" % DHTtempAverage)
			tf.close
		with open(hum_path, 'w') as hf:
			hf.write("Humidity %d%%" % DHThumAverage)
			hf.close

	# Notification engine calls
    if DHTtempAverage < 10:
		os.system("sudo touch onomeDHT11OFRAlertLow > /var/www/html/OnomeWeb/resources/data/tmp/")
    if DHTtempAverage > 30:
		os.system("sudo touch onomeDHT11OFRAlertHigh > /var/www/html/OnomeWeb/resources/data/tmp/")
    else:
		os.system("sudo rm /var/www/html/OnomeWeb/resources/data/tmp/onomeDHT11OFRAlertLow")
		os.system("sudo rm /var/www/html/OnomeWeb/resources/data/tmp/onomeDHT11OFRAlertHigh")
    time.sleep(60)