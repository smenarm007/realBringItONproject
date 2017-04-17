<?php
$mapPoints = array();


  $host = "127.0.0.1";
    $user = "smenarm007";                     //Your Cloud 9 username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "mysql";                                  //Your database name you want to connect to
    $port = 3306;    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
  
  $latArray = array();
  
  $longArray = array();
  
  $offArray = array();
  
//get the number of rows in the table
$countarray = mysqli_query($connection, "SELECT COUNT(*) from DataPoints;");
$r = mysqli_fetch_assoc($countarray);
$number = array_values($r);
$count = $number[0];

//store all the latitudes in an array
for($x = 1; $x <= $count; $x++)
{
 $Lats = mysqli_query($connection, "SELECT Latitude from DataPoints where ID = $x");
 $parsedLats = mysqli_fetch_assoc($Lats);
 $tempLat = array_values($parsedLats);
 $latArray[] = $tempLat[0];
}
//store all longitudes in an array
for($x = 1; $x <= $count; $x++)
{
 $Longs = mysqli_query($connection, "SELECT Longitude from DataPoints where ID = $x");
 $parsedLongs = mysqli_fetch_assoc($Longs);
 $tempLongs = array_values($parsedLongs);
 $longArray[] = $tempLongs[0];
}
//store all offenses in an array
for($x = 1; $x <= $count; $x++)
{
 $offs = mysqli_query($connection, "SELECT Offense from DataPoints where ID = $x");
 $parsedOffs = mysqli_fetch_assoc($offs);
 $tempOff = array_values($parsedOffs);
 $offArray[] = $tempOff[0];
}
for($x = 1; $x <= $count; $x++)
{
 $Times = mysqli_query($connection, "SELECT TimeReported from DataPoints where ID = $x");
 $parsedTimes = mysqli_fetch_assoc($Times);
 $tempTimes = array_values($parsedTimes);
 $TimesArray[] = $tempTimes[0];
}
//create an associative array of the arrays previously created.
$mapPoints['Offenses'] = $offArray;
$mapPoints['Latitudes'] = $latArray;
$mapPoints['Longitudes'] = $longArray;
$mapPoints['TimeStamps'] = $TimesArray;


echo json_encode($mapPoints);


?>