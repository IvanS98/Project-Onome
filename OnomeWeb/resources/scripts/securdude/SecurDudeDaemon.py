# SecurDude Daemon Service
import os, time

print "[Onome] SecurDude daemon is starting..."
time.sleep(1)
print "==== WELCOME TO SECURDUDE ===="
print "[SecurDude] Generating temporary file..."
os.system("sudo touch /var/www/html/OnomeWeb/resources/data/tmp/onomeSecurDudeRunning")
time.sleep(1)
print "[SecurDude] All done! Please use RFID to enable extensions."
while True:
    print "[SecurDude] Keeping service in background!"
    time.sleep(3600)