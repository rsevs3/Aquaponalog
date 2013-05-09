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

//   Aquaponalog - The Open Source Aquaponics Datalogger
//   Copyright (C) 2013  Ryan Sevelj
 
//   This program is free software: you can redistribute it and/or modify
//   it under the terms of the GNU General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.

//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.

//   You should have received a copy of the GNU General Public License
//   along with this program.  If not, see <http://www.gnu.org/licenses/>.

?>
