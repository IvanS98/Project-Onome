'''
RFIDOn
(C) 2017-2018 Ivan Sollazzo. All rights reserved.
'''

import os
import subprocess
import time

print "[Onome] Starting RFID service..."
try:
    task_check = subprocess.check_output(['pgrep', '-f', 'RFIDRead.py'])
    success = True
    print "[Onome] Error, RFIDRead is already running!"
    time.sleep(0.1)
    print "[Onome] Aborting!!!"
except subprocess.CalledProcessError as e:
    print e.output
    success = False
    print "[Onome] OKAY, RFIDRead is not running!"
    time.sleep(0.1)
    print "[Onome] Starting RFIDRead service..."
    os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/RFID/RFIDRead.py &")
    print "[Onome] All done!"