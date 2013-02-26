<?php

echo "<html>
  <body>
    <h1 align='center'>Welcome to the Aquaponalog Setup page!</h1>
    <br>
    <br>";

if (!$config=fopen("config.cfg","r"))
	{
    echo "
    <p align=\"center\">This is the first time you have run this program! Welcome :)</p>
    <br>
    <form action=\"writeconf.php\" method=\"post\">
      <table border=\"0\" align=\"center\">
        <tr>
          <th align=\"center\">
            MySQL Details
          </th>
        </tr>
        <tr>
          <td align=\"center\">
            Username <input type=\"text\" name=\"sqluser\">
            Password <input type=\"text\" name=\"sqlpass\">
          </td>
        </tr>
        <tr>
          <th align=\"center\">
            Serial Port Details
          </th>
        </tr>
        <tr>
          <td align=\"center\">
            Port: <input type=\"text\" name=\"portname\">
            Baud: <input type=\"text\" name=\"portbaud\">
          </td>
        </tr>
        <tr>
          <th align=\"center\">
            Transfer Protocol Details
          </th>
        </tr>
        <tr>
          <td align=\"center\">
            Float: <select name=\"protocolfloat\">
              <option value=\"true\">True</option>
              <option value=\"false\">False</option>
            </select>
            Version: <input type=\"text\" name=\"protocolversion\" value=\"1\">
          </td>
        </tr>
        <tr>
          <th align=\"center\">
            Sensor Details
          </th>
        </tr>
        <tr>
          <td align=\"center\">
            RTC: <select name=\"rtcavailable\">
              <option value=\"true\">True</option>
              <option value=\"false\">False</option>
            </select>
            Frequency: <input type=\"text\" name=\"updatefrequency\">
          </td>
        </tr>
        <tr>
          <td align=\"center\">
            Temp: <input type=\"text\" name=\"tempno\">
            Humidity: <input type=\"text\" name=\"humidityno\">
          </td>
        </tr>
        <tr>
          <td align=\"center\">
            <input type=\"submit\" value=\"Submit\">
          </td>
        </tr>
      </table>
    </form>";
	}
else
	{
    echo "
    <p align='center'>You have run this setup before, you old hat :)</p>
    <br>";
    echo "
    <form action=\"writeconf.php\" method=\"post\">
      <table border=\"0\" align=\"center\">
        <tr>
          <th align=\"center\">
            MySQL Details
          </th>
	</tr>
	<tr>
	  <td align=\"center\">";
            $value=explode(" ",(fgets($config)));
            echo "
            Username <input type=\"text\" name=\"sqluser\" value=\"" . $value[2] . "\">";
	    $value=explode(" ",(fgets($config)));
	    echo "
            Password <input type=\"text\" name=\"sqlpass\" value=\"" . $value[2] . "\">
	  </td>
	</tr>
        <tr>
          <th align=\"center\">
            Serial Port Details
          </th>
        </tr>
        <tr>
          <td align=\"center\">";
            $value=explode(" ",(fgets($config)));
            echo "
            Port: <input type=\"text\" name=\"portname\" value=\"" . $value[2] . "\">";
            $value=explode(" ",(fgets($config)));
            echo "
            Baud: <input type=\"text\" name=\"portbaud\" value=\"" . $value[2] . "\">
          </td>
        </tr>
        <tr>
          <th align=\"center\">
            Transfer Protocol Details
          </th>
        </tr>
        <tr>
          <td align=\"center\">";
            $value=explode(" ",(fgets($config)));
            echo "
            Float: <select name=\"protocolfloat\">
              <option value=\"true\""; if($value[2]=="true"){echo " selected";} echo ">True</option>
              <option value=\"false\""; if($value[2]=="false"){echo " selected";} echo ">False</option>
            </select>";
            $value=explode(" ",(fgets($config)));
            echo "
            Version: <input type=\"text\" name=\"protocolversion\" value=\"" . $value[2] . "\">
          </td>
        </tr>
        <tr>
          <th align=\"center\">
            Sensor Details
          </th>
        </tr>
        <tr>
          <td align=\"center\">";
            $value=explode(" ",(fgets($config)));
            echo "
            RTC: <select name=\"rtcavailable\">
              <option value=\"true\""; if($value[2]=="true"){echo " selected";} echo ">True</option>
              <option value=\"false\""; if($value[2]=="false"){echo " selected";} echo ">False</option>
            </select>";
            $value=explode(" ",(fgets($config)));
            echo "
            Frequency: <input type=\"text\" name=\"updatefrequency\" value=\"" . $value[2] . "\">
          </td>
        </tr>
        <tr>
          <td align=\"center\">";
            $value=explode(" ",(fgets($config)));
            echo "
            Temp: <input type=\"text\" name=\"tempno\" value=\"" . $value[2] . "\">";
            $value=explode(" ",(fgets($config)));
            echo "
            Humidity: <input type=\"text\" name=\"humidityno\" value=\"" . $value[2] . "\">
          </td>
        </tr>
	<tr>
	<td align=\"center\">
	<input type=\"submit\">
	</td>
	</tr>
	</table>";
	}



echo "
  </body>
</html>";
?>