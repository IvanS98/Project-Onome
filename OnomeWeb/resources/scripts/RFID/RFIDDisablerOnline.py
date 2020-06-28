'''
RFID Disabler for SecurDude Auth System
(C) 2017-2018 Ivan S. All rights reserved.
'''
import time
import os

while True:
    print "[SecurDude] Keeping in background"
    os.system("touch /var/www/html/OnomeWeb/resources/data/tmp/onomeRFIDDisablerOnlineOutput")
    os.system("echo Disabler\ ready! > /var/www/html/OnomeWeb/resources/data/tmp/onomeRFIDDisablerOnlineOutput")
    time.sleep(10)
    print "[SecurDude] System timeout, breaking..."
    os.system("echo System\ timeout.\ Please,\ reload\ the\ page\ again! > /var/www/html/OnomeWeb/resources/data/tmp/onomeRFIDDisablerOnlineOutput")
    break