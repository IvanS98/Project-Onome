import os
import time
print ("[SecurDude] Disabling alarm daemon...")
os.system("sudo echo ''Alarm disabled'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/alarm_status")
os.system("sudo echo ''Sleeping'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/step_status")
time.sleep(3)
os.system("sudo pkill -f SecurDudeAlarmOn.py")
os.system("sudo pkill -f SecurDudeAlarmGet.py")
os.system("sudo pkill -f get_alarm.sh")
os.system("sudo rm -f /var/www/html/OnomeWeb/resources/data/tmp/onomeSecurDudeOn")
os.system("sudo rm -f /var/www/html/OnomeWeb/resources/data/tmp/onomeSecurDudeAlarmAlert")
print ("[SecurDude] Alarm disabled. SecurDude services will continue working in background and sensor can still be able to detect movements.")