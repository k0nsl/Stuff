<?php

$device = "eth0";

echo trim(file_get_contents("/sys/class/net/$device/statistics/rx_bytes")).":";
echo trim(file_get_contents("/sys/class/net/$device/statistics/tx_bytes"))."";

?>
