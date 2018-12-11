<?php
session_start();
include("../nustatymai.php");

// tik darbuotojams

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($db, "utf8");

$err_msg = "";
	$req_pav = isset($_REQUEST["pav"]) ? $_REQUEST["pav"] : "";
	$req_aut = isset($_REQUEST["aut"]) ? $_REQUEST["aut"] : "";
	$req_met = isset($_REQUEST["met"]) ? $_REQUEST["met"] : "";
	$req_apr = isset($_REQUEST["apr"]) ? $_REQUEST["apr"] : "";
if (isset($_REQUEST["submit"])){
	
	if (empty($req_pav) || empty($req_aut) || empty($req_met) || empty($req_apr)){
		$err_msg = "Būtina užpildyti visus laukus";
	}else if (false){
		$err_msg = "Klaida";
	}else if (false){
		$err_msg = "Klaida";
	}else if (false){
		$err_msg = "Klaida";
	}else{
		$p_pav = mysqli_real_escape_string($db, $req_pav);
		$p_aut = mysqli_real_escape_string($db, $req_aut);
		$p_met = mysqli_real_escape_string($db, $req_met);
		$p_apr = mysqli_real_escape_string($db, $req_apr);
		
		$query = "INSERT INTO kurinys VALUES(null, '$p_pav', '$p_aut', $p_met , '$p_apr')";
		$result = mysqli_query($db, $query);
		
		header("Location: knyguSarasas.php");
		die();
	}
}

?>

<html>
<head>
	<title>Kūrinio sukūrimas</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<a href="knyguSarasas.php">Knygų sąrašas</a><br/>

<center>
	<form method="post">
	<table>
	<?php
		echo "<tr><td>Pavadinimas:</td><td>";
			echo "<input type='text' name='pav' value='".$req_pav."'/>";
		echo "</td></tr>";
		
		echo "<tr><td>Autorius:</td><td>";
			echo "<input type='text' name='aut' value='".$req_aut."'/>";
		echo "</td></tr>";
		
		echo "<tr><td>Išleidimo metai:</td><td>";
			echo "<input type='number' name='met' value='".$req_met."'/>";
		echo "</td></tr>";
		
		echo "<tr><td>Aprašymas:</td><td><textarea name='apr'>";
			echo $req_apr;
		echo "</textarea></td></tr>";
	?>
	</table>
	
	<input type="submit" name="submit" value="Įrašyti"/>
	</form>
	<?php
		if (!empty($err_msg)){
			echo $err_msg;
		}
	?>
	<br/>
</center>

</body>
</html>