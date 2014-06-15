<?php require_once('Connections/Weather.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_Weather, $Weather);
$query_outdoor_high = "SELECT * FROM records WHERE record_name =  'outside_temp_high'";
$outdoor_high = mysql_query($query_outdoor_high, $Weather) or die(mysql_error());
$row_outdoor_high = mysql_fetch_assoc($outdoor_high);
$totalRows_outdoor_high = mysql_num_rows($outdoor_high);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Weather - Records</title>
<link href="css/weather.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/img/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Monda:400,700' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="wrapperNew">
<div id="header">
<div id="HeaderImg"><a href="index.php"><img src="img/logo.png" width="129" height="80" /></a></div><span class="headertext">Weather</span>
</div>
<div id="content">
<div id="Top_Navigation">
<ul>
<li><a href="index.php" class="inactivepage">Current Weather</a></li>
<li><a href="temperature.html" class="inactivepage">Temperature</a></li>
<li><a href="rainfall.html" class="inactivepage">Rainfall</a></li>
<li><a href="wind.html" class="inactivepage">Wind</a></li>
<li><a href="humidity.html" class="inactivepage">Humidity</a></li>
<li><a href="barometer.html" class="inactivepage">Barometer</a></li>
</ul>
</div>

<div id="current_weather">
<div id="Content_Light">
<p class="font20">Records</p>
<div id="break"></div>
<div id="Left">
<p class="font18">Outside</p>
<p>High: <?php echo $row_outdoor_high['record_value']; ?><span class="font12"> - <?php echo date("m/d/Y",strtotime($row_outdoor_high['Date'])); ?></span></p>
<p>Low: 32.45<span class="font12"> - 2/23/2013</span></p>
</div>
<div id="Right">
<p class="font18">Inside</p>
<p>High: 90.45<span class="font12"> - 6/9/2013</span></p>
<p>Low: 60.10<span class="font12"> - 1/7/2013</span></p>
</div>
<br clear="all" />
</div>
<div id="Content_Light">
<p class="font20">Rainfall</p>
<div id="break"></div>
<div id="Left">
</div>
<div id="Right">
</div>
<br clear="all" />
</div>
</div>
<div id="footer"><div>
</div>

</div>
</body>
</html>
<?php
mysql_free_result($outdoor_high);
?>
