<?php
session_start();
require('../../Procesai/dbConnect.php');

if (isset($_POST['register-submit'])) {
	
	$bookId = $_GET['book'];

	$query = "";
}
else {
    header("Location: ../../index.php");
    exit();
}
?>