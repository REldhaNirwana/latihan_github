<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "pinjamruang";
$db = mysqli_connect($host, $user, $password, $dbname);

if(!$db){
 die("error in connection");
}

//echo "database connected"
?>