<?php
$target_data = $_POST['target'];
$targetFolder = "/var/www/html/OnomeWeb/resources/data/security/settings/";
file_put_contents($targetFolder."s900_target", $target_data);
?>