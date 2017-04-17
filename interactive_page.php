<?php
$txt = $_GET['name'];
$lat = $_GET['Lat'];
$long = $_GET['Long'];
//Connect to the database
    $host = "localhost";
    $user = "keepkid2_smenarm";                     //Your Cloud 9 username
    $pass = "Creeper123";                                  //Remember, there is NO password by default!
    $db = "keepkid2_mapPoints";                                  //Your database name you want to connect to
    $port = 3306;                                //The port #. It is always 3306
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());


//send data to the database and redirect to home.php
mysqli_query($connection,"INSERT INTO DataPoints (Offense, Latitude, longitude)
VALUES ('$txt', '$lat', '$long')");

header("Location: https://testing-for-web-app-smenarm007.c9users.io/home-page.html");
   exit;

    
?>