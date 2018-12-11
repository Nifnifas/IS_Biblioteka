<?php
session_start();
require('./../../Procesai/dbConnect.php');

if (isset($_POST['delete-submit'])) {
	$id = $_GET['id'];
	$query = "DELETE FROM `sutartis` WHERE `sutartis`.`Sutarties_Nr` = '$id'";
	$subQuery = "DELETE FROM `sutartis_egzempliorius` WHERE `sutartis_egzempliorius`.`fk_SutartisID` = '$id'";

	mysqli_query($connect, $subQuery);
	mysqli_query($connect, $query);

	header("Location: ../sutarciuSarasas.php?removal=success");
    exit();
}
else {
    header("Location: ../../index.php");
    exit();
}
?>