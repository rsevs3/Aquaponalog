<?php

$config = fopen("config.cfg", "w+") or exit("Unable to open file.");
//echo fwrite($config, "Aquaponalog Configuration File \r\n\r\n");
//echo fwrite($config, "[System] \r\n");
echo fwrite($config, "SQL_Username = " . $_POST[sqluser] . " \r\n");
echo fwrite($config, "SQL_Password = " . $_POST[sqlpass] . " \r\n");
echo fwrite($config, "Port_Name = " . $_POST[portname] . " \r\n");
echo fwrite($config, "Port_Baud = " . $_POST[portbaud] . " \r\n");
echo fwrite($config, "Protocol_Float = " . $_POST[protocolfloat] . " \r\n");
echo fwrite($config, "Protocol_Version = " . $_POST[protocolversion] . " \r\n");
echo fwrite($config, "RTC_Available = " . $_POST[rtcavailable] . " \r\n");
echo fwrite($config, "Update_Frequency = " . $_POST[updatefrequency] . " \r\n");
echo fwrite($config, "Temperature_Number = " . $_POST[tempno] . " \r\n");
echo fwrite($config, "Humidity_Number = " . $_POST[humidityno] . " \r\n");

fclose($config);

$db = mysql_connect("localhost", $_POST[sqluser], $_POST[sqlpass]);

if (!$db)
  {
  die('Could not connect: ' . mysql_error());
  }

if (!mysql_query("CREATE DATABASE aquaponalog",$db))
  {
  echo "Error creating database: " . mysql_error();
  }

mysql_close($db);

header('Location: http://localhost/setup.php');

?>