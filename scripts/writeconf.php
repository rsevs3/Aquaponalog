<?php

//#################################################################################################
//This sections opens a file and stores the entered data for future use.
//#################################################################################################

$config = fopen("../scripts/config.cfg", "w+") or exit("Unable to open file.");    	                //Open the config file ready to be written to

echo fwrite($config, "SQL_Username = " . $_POST[sqluser] . " \r\n");			                    //Add the MySQL Username to the file
echo fwrite($config, "SQL_Password = " . $_POST[sqlpass] . " \r\n");			                    //Add the MySQL Password to the file
echo fwrite($config, "Port_Name = " . $_POST[portname] . " \r\n");			                        //Add the Port Name to the file
echo fwrite($config, "Port_Baud = " . $_POST[portbaud] . " \r\n");			                        //Add the Port Baud to the file
echo fwrite($config, "Protocol_Float = " . $_POST[protocolfloat] . " \r\n");		                //Add the Data Type to the file
echo fwrite($config, "Protocol_Version = " . $_POST[protocolversion] . " \r\n");	                //Add the Protocol Version to the file
echo fwrite($config, "RTC_Available = " . $_POST[rtcavailable] . " \r\n");		                    //Add the RTC Availability to the file
echo fwrite($config, "Update_Frequency = " . $_POST[updatefrequency] . " \r\n");	                //Add the Update Frequency to the file
echo fwrite($config, "Temperature_Number = " . $_POST[tempno] . " \r\n");		                    //Add the Number of Temp Sensors to the file
echo fwrite($config, "Humidity_Number = " . $_POST[humidityno] . " \r\n");		                    //Add the Number of Humidity Sensors to the file

fclose($config);									//Close the file

//#################################################################################################
//This sections creates the database and tables if they do not exist.
//#################################################################################################

$db = mysql_connect("localhost", $_POST[sqluser], $_POST[sqlpass]);			                        //Connect to the MySQL server

if (!$db)
  {
  die('Could not connect: ' . mysql_error());
  }

if (!mysql_query("CREATE DATABASE IF NOT EXISTS aquaponalog",$db))		                        	//Create the database if it does not exist
  {
  echo "Error creating database: " . mysql_error();
  }

if (!mysql_select_db("aquaponalog", $db))					                                    	//Select the database so we can edit it
  {
  echo "Error selecting database: " . mysql_error();
  }

$string = "CREATE TABLE IF NOT EXISTS data (";					                                	//Generate the string needed to create the table

for ($i=1; $i <= $_POST[tempno]; $i++)						                                    	//Add the required columns for number of temp sensors
  {
  $string .= "temp" . $i . " INT NOT NULL, ";
  }

for ($i=1; $i <= $_POST[humidityno]; $i++)					                                    	//Add the required colums for number of humidity sensors
  {
  $string .= "humidity" . $i . " INT NOT NULL, ";
  }

$string = substr($string, 0, -2);						                                        	//Remove the last two unrequired digits from the string

$string .= ")";									                                                	//Close the command

if (!mysql_query($string,$db))						                                        		//Create the table if it does not exist
  {
  echo "Error creating table: " . mysql_error();
  }

mysql_close($db);								                                                	//Close the connection to the database

//#################################################################################################
//Return back to the setup page.
//#################################################################################################

header('Location: http://localhost/pages/setup.php');	                            				//Return to the setup page so you dont know this script has run

?>