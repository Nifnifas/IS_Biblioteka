<?php
session_start();
include("../nustatymai.php");
include("../sablonai.php");

// tik darbuotojams
if ($_SESSION['userLevel'] != 2){
	header("Location: knyguSarasas.php");
	die();
}

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
		
		$query = "INSERT INTO kurinys (`id`, `Pavadinimas`, `Autorius`, `Isleidimo_metai`, `Aprasymas`) VALUES(null, '$p_pav', '$p_aut', $p_met , '$p_apr')";
		$result = mysqli_query($db, $query);
		
		header("Location: knyguSarasas.php");
		die();
	}
}

echo "<html>";
head("Kūrinio sukūrimas");
echo "<body>";

navbar_inside();

echo "<div class='container'>";

echo "<form method='post'>";
	echo "<div class='form-group'>";
		echo "<label for='pav'>Pavadinimas</label>";
		echo "<input id='pav' placeholder='Pavadinimas' type='text' name='pav' class='form-control' value='".$req_pav."'/>";
	echo "</div>";
	echo "<div class='form-group'>";
		echo "<label for='aut'>Autorius</label>";
		echo "<input id='aut' placeholder='Autorius' type='text' name='aut' class='form-control' value='".$req_aut."'/>";
	echo "</div>";
	echo "<div class='form-group'>";
		echo "<label for='met'>Išleidimo metai</label>\n";
		echo "<input id='met' placeholder='Išleidimo metai' type='number' name='met' class='form-control' value='".$req_met."'/>";
	echo "</div>";
	echo "<div class='form-group'>";
		echo "<label for='apr'>Aprašymas</label>\n";
		echo "<textarea id='apr' placeholder='Aprašymas' name='apr' class='form-control'>".$req_apr."</textarea>";
	echo "</div>";
echo "<input type='submit' name='submit' class='btn btn-primary' value='Įrašyti'/>";
echo "</form>";

if (!empty($err_msg)){
	echo "<div class='alert alert-danger'>";
	echo $err_msg;
	echo "</div>";
}
?>
<br/>

</div>

</body>
</html>