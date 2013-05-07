<?php

$config = fopen("../scripts/config.cfg", "r") or exit("Unable to open file.");

$sqluser=explode(" ",(fgets($config)));
$sqlpass=explode(" ",(fgets($config)));
$port=explode(" ",(fgets($config)));
$baud=explode(" ",(fgets($config)));
$float=explode(" ",(fgets($config)));
$version=explode(" ",(fgets($config)));
$rtc=explode(" ",(fgets($config)));
$frequency=explode(" ",(fgets($config)));
$temp=explode(" ",(fgets($config)));
$humidity=explode(" ",(fgets($config)));

fclose($config);

$python = fopen("../scripts/comms.py", "w+") or exit("Unable to open file.");

echo fwrite($python, "#!/usr/bin/python

import Serial
import MySQLdb
from time import sleep

db = MySQLdb.connect(host='localhost', user='" . $sqluser[2] . "', passwd='" . $sqlpass[2] . "', db='aquaponalog')

s = serial.Serial(port='" . $port[2] . "', baudrate=" . $baud[2] . ")

s.write(chr(0xFF))
reply = explode(\" \", s.readline())
index = 0
counter = 0

while counter < " . $temp . "
    print reply[index]
    index++
    counter++
    
while counter < " . $humidity . "
    print reply[index]
    index++
    counter++
");


fclose($python);

header('Location: http://localhost/pages/setup.php');

?>
