<?php
$mac = shell_exec("arp -a ".escapeshellarg($_SERVER['REMOTE_ADDR'])." | grep -o -E '(:xdigit:{1,2}:){5}:xdigit:{1,2}'");
echo $mac;
?>