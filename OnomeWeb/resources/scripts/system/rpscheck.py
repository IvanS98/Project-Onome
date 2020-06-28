'''
Running Processes Checker
(C) 2017-2018 Ivan Sollazzo. All rights reserved.
'''

import os
import os.path
import subprocess
import time

# This script will check what processes are running on Project Onome, record the status
# and then write it to a file.

# Processes to check

onm_temphum = 0
onm_autolights = 0
onm_rfid = 0
sd_alarm = 0
sd_videosurveillance = 0

print "===== WELCOME TO RPSCHECK SERVICE ====="

while True:
    # Check status for DHT11 services
    print "[Onome] Checking status for onm_temphum..."
    time.sleep(0.1)
    try:
        task_check = subprocess.check_output(['pgrep', '-f', 'getdht11.py'])
        success = True
        print "[Onome] OKAY, onm_temphum is running!"
        time.sleep(0.1)
        print "[Onome] Recording status for onm_temphum..."
        onm_temphum = 1
        time.sleep(0.1)
        print "[Onome] Status updated!"
    except subprocess.CalledProcessError as e:
        print e.output
        success = False
        print "[Onome] OKAY, onm_temphum is not running!"
        time.sleep(0.1)
        print "[Onome] Recording status for onm_temphum..."
        onm_temphum = 0
        time.sleep(0.1)
        print "[Onome] Status updated!"

    # Check status for automatic lights
    print "[Onome] Checking status for onm_autolights..."
    time.sleep(0.1)
    try:
        task_check = subprocess.check_output(['pgrep', '-f', 'OnomeAutoLightOn.py'])
        success = True
        print "[Onome] OKAY, onm_autolights is running!"
        time.sleep(0.1)
        print "[Onome] Recording status for onm_autolights..."
        onm_autolights = 1
        time.sleep(0.1)
        print "[Onome] Status updated!"
    except subprocess.CalledProcessError as e:
        print e.output
        success = False
        print "[Onome] OKAY, onm_autolights is not running!"
        time.sleep(0.1)
        print "[Onome] Recording status for onm_autolights..."
        onm_autolights = 0
        time.sleep(0.1)
        print "[Onome] Status updated!"

    # Check status for SecurDude Alarm
    print "[Onome] Checking status for sd_alarm..."
    time.sleep(0.1)
    try:
        task_check = subprocess.check_output(['pgrep', '-f', 'SecurDudeAlarmOn.py'])
        success = True
        print "[Onome] OKAY, sd_alarm is running!"
        time.sleep(0.1)
        print "[Onome] Recording status for sd_alarm..."
        sd_alarm = 1
        time.sleep(0.1)
        print "[Onome] Status updated!"
    except subprocess.CalledProcessError as e:
        print e.output
        success = False
        print "[Onome] OKAY, sd_alarm is not running!"
        time.sleep(0.1)
        print "[Onome] Recording status for sd_alarm..."
        sd_alarm = 0
        time.sleep(0.1)
        print "[Onome] Status updated!"

    # Check status for SecurDude Video Surveillance
    print "[Onome] Checking status for sd_videosurveillance..."
    time.sleep(0.1)
    try:
        task_check = subprocess.check_output(['pgrep', '-f', 'motion'])
        success = True
        print "[Onome] OKAY, sd_videosurveillance is running!"
        time.sleep(0.1)
        print "[Onome] Recording status for sd_videosurveillance..."
        sd_videosurveillance = 1
        time.sleep(0.1)
        print "[Onome] Status updated!"
    except subprocess.CalledProcessError as e:
        print e.output
        success = False
        print "[Onome] OKAY, sd_videosurveillance is not running!"
        time.sleep(0.1)
        print "[Onome] Recording status for sd_videosurveillance..."
        sd_videosurveillance = 0
        time.sleep(0.1)
        print "[Onome] Status updated!"

    # Check status for RFID
    print "[Onome] Checking status for onm_rfid..."
    time.sleep(0.1)
    try:
        task_check = subprocess.check_output(['pgrep', '-f', 'RFIDRead.py'])
        success = True
        print "[Onome] OKAY, onm_rfid is running!"
        time.sleep(0.1)
        print "[Onome] Recording status for onm_rfid..."
        onm_rfid = 1
        time.sleep(0.1)
        print "[Onome] Status updated!"
    except subprocess.CalledProcessError as e:
        print e.output
        success = False
        print "[Onome] OKAY, onm_rfid is not running!"
        time.sleep(0.1)
        print "[Onome] Recording status for onm_rfid..."
        onm_rfid = 0
        time.sleep(0.1)
        print "[Onome] Status updated!"

    rps_total = onm_temphum + onm_autolights + sd_alarm + sd_videosurveillance + onm_rfid
    print "[Onome] Total running devices: ", rps_total
    time.sleep(0.1)
    print "[Onome] Updating powered_devices_status file..."
    rps_file_path = "/var/www/html/OnomeWeb/resources/scripts/status/powered_devices/powered_devices_status"
    with open(rps_file_path, 'w') as rps_updt:
        rps_updt.write("%d" % rps_total)
        rps_updt.close
    print "[Onome] Update complete!"
    time.sleep(5)
    print "[Onome] OKAY, keeping trigger on!"