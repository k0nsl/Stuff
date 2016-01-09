<?php

$prefix = rand(16,25);
$netze =  rand(2,6);

echo "Prefix: /". $prefix; echo "<br>";
$netz = "192.";
$netmaske = "255.";
if ($prefix == 8) {
    $netmaske = "255.0.0.0";
    $netz = "192.0.0.0";
} elseif ($prefix == 9) {
    $netmaske = "255.128.0.0";
    $netz.= rand(0,129) .".0.0";
} elseif ($prefix == 10) {
    $netmaske = "255.192.0.0";
    $netz.= rand(0,192) .".0.0";
} elseif ($prefix == 11) {
    $netmaske = "255.224.0.0";
    $netz.= rand(0,224) .".0.0";
} elseif ($prefix == 12) {
    $netmaske = "255.240.0.0";
    $netz.= rand(0,240) .".0.0";
} elseif ($prefix == 13) {
    $netmaske = "255.248.0.0";
    $netz.= rand(0,248) .".0.0";
} elseif ($prefix == 14) {
    $netmaske = "255.252.0.0";
    $netz.= rand(0,252) .".0.0";
} elseif ($prefix == 15) {
    $netmaske = "255.254.0.0";
    $netz.= rand(0,254) .".0.0";
} elseif ($prefix == 16) {
    $netmaske = "255.255.0.0";
    $netz.= rand(0,255) .".0.0";
} elseif ($prefix == 17) {
    $netmaske = "255.255.128.0";
    $netz.= "255.". rand(0,128) .".0";
} elseif ($prefix == 18) {
    $netmaske = "255.255.192.0";
    $netz.= "255.". rand(0,192) .".0";
} elseif ($prefix == 19) {
    $netmaske = "255.255.224.0";
    $netz.= "255.". rand(0,224) .".0";
} elseif ($prefix == 20) {
    $netmaske = "255.255.240.0";
    $netz.= "255.". rand(0,240) .".0";
} elseif ($prefix == 21) {
    $netmaske = "255.255.248.0";
    $netz.= "255.". rand(0,248) .".0";
} elseif ($prefix == 22) {
    $netmaske = "255.255.252.0";
    $netz.= "255.". rand(0,252) .".0";
} elseif ($prefix == 23) {
    $netmaske = "255.255.254.0";
    $netz.= "255.". rand(0,254) .".0";
} elseif ($prefix == 24) {
    $netmaske = "255.255.255.0";
    $netz.= "255.". rand(0,255) .".0";
}


echo "Netzmaske: " . $netmaske; echo "<br>";
echo "Netz: ". $netz; echo "<br><br>";

echo "Teile das Netz in " . $netze . " netze.";  echo "<br>";echo "<br>";

if($netze == 2) {
$tmp = 32 - $prefix;
$max_hosts = pow(2,$tmp) -2 ;
$low = floor($max_hosts / 4);
$high = floor($max_hosts / 100 * 99);
$new = rand($low,$hight);
$high = $high - $new;
echo "Netz 1: ". $new; echo "<br>";
$new = rand($low,$hight);
$high = $high - $new;
echo "Netz 2: ". $new; echo "<br>";
} elseif ($netze == 3) {
  $tmp = 32 - $prefix;
  $max_hosts = pow(2,$tmp) -2 ;
  $low = floor($max_hosts / 4);
  $high = floor($max_hosts / 100 * 99);
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 1: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 2: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 3: ". $new; echo "<br>";
} elseif ($netze == 4) {
  $tmp = 32 - $prefix;
  $max_hosts = pow(2,$tmp) -2 ;
  $low = floor($max_hosts / 4);
  $high = floor($max_hosts / 100 * 99);
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 1: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 2: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 3: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 4: ". $new; echo "<br>";
} elseif ($netze == 5) {
  $tmp = 32 - $prefix;
  $max_hosts = pow(2,$tmp) -2 ;
  $low = floor($max_hosts / 4);
  $high = floor($max_hosts / 100 * 99);
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 1: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 2: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 3: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 4: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 5: ". $new; echo "<br>";
} elseif ($netze == 6) {
  $tmp = 32 - $prefix;
  $max_hosts = pow(2,$tmp) -2 ;
  $low = floor($max_hosts / 4);
  $high = floor($max_hosts / 100 * 99);
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 1: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 2: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 3: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 4: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 5: ". $new; echo "<br>";
  $new = rand($low,$hight);
  $high = $high - $new;
  echo "Netz 6: ". $new; echo "<br>";
}



































 ?>
