<?php
session_start();
require('../../Procesai/dbConnect.php');

if (isset($_POST['register-submit'])) {
	
	$bookId = $_GET['book'];
	
	$userId = $_SESSION['userId'];

	$idQuery = "SELECT `is_vartotojas`.`kliento_id` 
				FROM `is_vartotojas` 
				WHERE `is_vartotojas`.`id` = '$userId'";
	$idResult = mysqli_query($connect, $idQuery) or die(mysqli_error($connect));
	$idRow = $idResult->fetch_assoc();

	$id = $idRow['kliento_id'];

	$query = "	SELECT prioritetas 
				FROM rezervacija 
				WHERE fk_KurinysID = '$bookId' 
				ORDER BY id DESC LIMIT 1";

	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	$row = $result->fetch_assoc();

	$priority = $row['prioritetas'] + 1;

	$queryMain = "	INSERT INTO `rezervacija` 
						(`Data`, `Prioritetas`, `fk_KurinysID`, `fk_KlientasID`) 
					VALUES (NOW(), '$priority', '$bookId', '$id');";
	mysqli_query($connect, $queryMain) or die(mysqli_error($connect));

	header("Location: ../../Knygu_modulis/knygosPerziura.php?id=$bookId");
	exit();
}
else {
    header("Location: ../../index.php");
    exit();
}
?>