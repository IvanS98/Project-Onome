'''
RFIDOff
(C) 2017-2018 Ivan Sollazzo. All rights reserved.
'''

import os
import time
import subprocess

print "[Onome] Stopping RFID service..."
try:
    task_check = subprocess.check_output(['pgrep', '-f', 'RFIDRead.py'])
    success = True
    print "[Onome] OK, RFIDRead is running!"
    time.sleep(0.1)
    print "[Onome] Killing RFIDRead..."
    os.system("pkill -f RFIDRead.py")
    time.sleep(0.1)
    print "[Onome] All done!"
except subprocess.CalledProcessError as e:
    print e.output
    success = False
    print "[Onome] Error, RFIDRead is not running!"
    time.sleep(0.1)
    print "[Onome] Aborting!!!"
os.system("rm -R /var/www/html/OnomeWeb/resources/data/tmp/onomeRFIDDisablerProcessing")