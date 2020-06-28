<?php $bcm2835_temp = file_get_contents('/var/www/html/OnomeWeb/resources/scripts/platform/monitor/bcm2835/temp');
echo sprintf("%.2f", $bcm2835_temp / 1000);
echo '°C';
?>
