<?php

$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "is_bibliotekos";

$connect = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);
mysqli_set_charset($connect,"utf8");

if (!$connect){
	die("Nepavyko prisijungti prie duomenų bazės: ".mysqli_connect_error());
}

//norint naudoti šį scriptą, kodo pradžioje įpastinti eilutę apačioje 
//require('dbConnect.php');