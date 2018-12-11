<?php
session_start();
require('./../../Procesai/dbConnect.php');

if (isset($_POST['delete-submit'])) {
	$id = $_GET['id'];
	$query = "UPDATE `skola` SET `Grazinimo_data` = NOW() WHERE `skola`.`id` = '$id'";

	mysqli_query($connect, $query);

	header("Location: ../skoluSarasas.php?return=success");
    exit();
}
else {
    header("Location: ../../index.php");
    exit();
}
?>