import time
import subprocess
import os

bcm2835_temp_path = "/var/www/html/OnomeWeb/resources/scripts/platform/monitor/bcm2835/temp"

print "== Welcome to Project Onome System Monitor =="
print "== Version 0.0.1 =="
print "This script will monitor the platform and check for fails."

time.sleep(0.5)
print "[SysMonitor] Starting script services..."

# Make services available to Project Onome App
os.system("sudo touch /var/www/html/OnomeWeb/resources/data/tmp/onomeConnectionOnline")

while True:
    print "[SysMonitor] Getting info..."
    time.sleep(1)
    print "[SysMonitor] Getting info for BCM2835..."
    # TEMP
    with open(bcm2835_temp_path, 'w') as bcm2835_temp:
        subprocess.call(["cat", "/sys/class/thermal/thermal_zone0/temp"], stdout=bcm2835_temp)
    print "[SysMonitor] Data wrote to log..."
    time.sleep(10)