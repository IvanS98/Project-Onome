# SecurDude Alarm Trigger
# (C) 2017-2018 Ivan Sollazzo. All rights reserved.

import os
import subprocess

print "[SecurDude] Checking if SecurDude Alarm is running"

try:
        task_check = subprocess.check_output(['pgrep', '-f', 'SecurDudeAlarmOn.py'])
        success = True
        print "[SecurDude] Process is running"
except subprocess.CalledProcessError as e:
        print e.output
        success = False
        print "[SecurDude] Process is not running"

if (success == True):
        print "[SecurDude] Stopping alarm daemon..."
        os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/securdude/SecurDudeAlarmOff.py &")
        os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/securdude/SecurDudeVideoOff.py &")
if (success == False):
        print "[SecurDude] Starting alarm daemon..."
        os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/securdude/SecurDudeAlarmOn.py &")
        os.system("sudo python /var/www/html/OnomeWeb/resources/scripts/securdude/SecurDudeVideoOn.py &")