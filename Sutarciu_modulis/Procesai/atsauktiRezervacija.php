<?php
session_start();
require('./../../Procesai/dbConnect.php');

if (isset($_POST['cancel-submit'])) {
	$id = $_GET['id'];

	$currentQuery = "	SELECT `prioritetas`, `fk_KurinysID` FROM `rezervacija`
						WHERE id = '$id'";
	
	$resultCurrent = mysqli_query($connect, $currentQuery) or die(mysqli_error($connect));
	$rowC = $resultCurrent->fetch_assoc();

	$kurinioID = $rowC['fk_KurinysID'];
	$currentID = $rowC['prioritetas'];
	
	$maxQuery = "	SELECT `prioritetas` FROM `rezervacija`
					WHERE `fk_KurinysID` = '$kurinioID'
					ORDER BY id DESC LIMIT 1";

	$resultMax = mysqli_query($connect, $maxQuery) or die(mysqli_error($connect));
	$rowM = $resultMax->fetch_assoc();

	$maxID = $rowM['prioritetas'];

	$query = "DELETE FROM `rezervacija` WHERE `rezervacija`.`id` = '$id'";

	mysqli_query($connect, $query);

	for ($i=$currentID+1; $i <= $maxID; $i++ ) { 
		$ilow = $i - 1;
		$query = "	UPDATE `rezervacija` 
					SET `prioritetas` = '$ilow' 
					WHERE `fk_KurinysID` = '$kurinioID' AND `prioritetas` = '$i'";
		mysqli_query($connect, $query);
	}

	header("Location: ../rezervuotuKnyguSarasas.php?return=success");
    exit();
}
else {
    header("Location: ../../index.php");
    exit();
}
?>