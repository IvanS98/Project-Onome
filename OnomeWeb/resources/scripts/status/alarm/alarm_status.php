<?php
$alarm_status = file_get_contents('/var/www/html/OnomeWeb/resources/scripts/status/alarm/alarm_status');
echo $alarm_status;
?>