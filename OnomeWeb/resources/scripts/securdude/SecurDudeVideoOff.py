import os
print ("[SecurDude] Disabling video surveillance daemon...")
os.system("sudo pkill -f motion")
os.system("sudo /var/www/html/OnomeWeb/resources/scripts/usbreset /dev/bus/usb/001/$( lsusb | grep Logitech | sort -u | cut -c 16-18)")
os.system("rm /var/www/html/OnomeWeb/resources/data/tmp/onomeVideoAvailable")
print ("[SecurDude] Video surveillance disabled!")
