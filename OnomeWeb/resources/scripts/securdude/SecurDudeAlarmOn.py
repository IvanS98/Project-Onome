import time
import os
print ("[SecurDude] Starting security alarm daemon...")
os.system("sudo echo ''Alarm enabled'' > /var/www/html/OnomeWeb/resources/scripts/status/alarm/alarm_status")
os.system("sudo touch /var/www/html/OnomeWeb/resources/data/tmp/onomeSecurDudeOn")
os.system("sudo /var/www/html/OnomeWeb/resources/scripts/securdude/get_alarm.sh &")
while True:
    print "Keeping process in background"
    time.sleep(3600)