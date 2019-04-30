<?php
date_default_timezone_set("Asia/Karachi");
$currentTime = time();
$dateTime = strftime("%B %d, %Y %H : %M",$currentTime);
echo $dateTime;
?>
