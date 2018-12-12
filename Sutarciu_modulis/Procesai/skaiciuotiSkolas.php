<?php
session_start();
require('Procesai/dbConnect.php');

$path = 'Sutarciu_modulis/Procesai/datos.txt';

$file = fopen($path, 'r');
$data = fgets($file);
fclose($file);

if (date("Y-m-d") != $data){

	$query = "	SELECT `sutartis`.`fk_KlientasID`, `skola`.`Dydis`, `skola`.`Procentalumas`, `skola`.`id`
				FROM `skola`, `sutartis` 
				WHERE `skola`.`fk_SutartisID` = `sutartis`.`Sutarties_Nr` 
					AND `skola`.`Grazinimo_data` IS NULL";
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	
	while ($row = $result->fetch_assoc()){

		$dydis = $row['Dydis'];
		$procentalumas = $row['Procentalumas'];
		$klientas = $row['fk_KlientasID'];
		$skola = $row['id'];

		$subQuery = "	SELECT `lengvata`.`Tasku_kiekis`, `lengvata`.`id`
						FROM `lengvata`
						WHERE `lengvata`.`fk_KlientasID` = '$klientas' 
							AND `lengvata`.`Tasku_kiekis` > 0
							AND `lengvata`.`Tipas` = 'Skolos'";
		$subResult = mysqli_query($connect, $subQuery) or die(mysqli_error($connect));

		$actualProcentalums = $procentalumas;
		while ($rowblow = $subResult->fetch_assoc()){
			$actualProcentalums /= 2;
			$taskai = $rowblow['Tasku_kiekis'] - 1;
			$lengId = $rowblow['id'];
			$uberSubQuery = "	UPDATE `lengvata` 
								SET `Tasku_kiekis` = '$taskai' 
								WHERE `id` = '$lengId'";
			mysqli_query($connect, $uberSubQuery) or die(mysqli_error($connect));
		}

		if (date('d') == 1){
			$procentalumas *= 2;
		}

		$dydis *= 1 + $actualProcentalums;

		$subQuery = "	UPDATE `skola`
					SET `Dydis` = '$dydis', `Procentalumas` = '$procentalumas'
					WHERE `id` = '$skola'";
		mysqli_query($connect, $subQuery) or die(mysqli_error($connect));
	}
	
	//Naujos skolos
	$query = "	SELECT `sutartis`.`Sutarties_Nr`
				FROM `sutartis`, `skola`
				WHERE DATE_ADD(`sutartis`.`Isdavimo_data`, INTERVAL `sutartis`.`Terminas` DAY) < NOW() AND `sutartis`.`Grazinimo_data` IS NULL";
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	while ($row = $result->fetch_assoc()) {
		$zieId = $row['Sutarties_Nr'];
		$subQuery = "	SELECT SUM(`sutartis`.`Sutarties_Nr`) AS `kiekis`
						FROM `sutartis`
						WHERE `Sutarties_Nr` = '$zieId'";
		$subResult = mysqli_query($connect, $subQuery) or die(mysqli_error($connect));
		$subRow = $subResult->fetch_assoc();
		if ($subRow['kiekis'] == 0){
			$subQuery = "INSERT INTO `skola` (`Dydis`, `Procentalumas`, `fk_SutartisID`) VALUES ('0.1', '0.1', '$zieId')";
			$subResult = mysqli_query($connect, $subQuery) or die(mysqli_error($connect));
		}
	}

	$data = date("Y-m-d");
	$file = fopen($path, 'w');
	fwrite($file, $data);
	fclose($file);
}
?>