import os
print ("[SecurDude] Starting video surveillance daemon..")
os.system("sudo motion &")
os.system("touch /var/www/html/OnomeWeb/resources/data/tmp/onomeVideoAvailable")
print ("[SecurDude] Video surveillance enabled!")