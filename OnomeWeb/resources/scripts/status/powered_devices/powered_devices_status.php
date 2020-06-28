<?php
$pwrdevices_status = file_get_contents('/var/www/html/OnomeWeb/resources/scripts/status/powered_devices/powered_devices_status');
echo $pwrdevices_status;
?>