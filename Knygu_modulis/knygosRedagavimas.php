<?php
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$req_id = $_REQUEST["id"];
if (!isset($req_id)){
	header("Location: knyguSarasas.php");
	die();
}
$p_id = mysqli_real_escape_string($db, $req_id);

$query = "SELECT * FROM kurinys WHERE id = $p_id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

?>
<html>
<head>
	<title>Kūrinio redagavimas</title>
</head>
<body>

<a href="knyguSarasas.php">Knygų sąrašas</a><br/>

<center>
	<table>
		<tr><td>Pavadinimas:</td><td><input type="text" value="Hamletas"/></td></tr>
		<tr><td>Autorius:</td><td><input type="text" value="Viljamas Šekspyras"/></td></tr>
		<tr><td>Išleidimo metai:</td><td><input type="number" value="1601"/></td></tr>
		<tr><td>Aprašymas:</td><td>
			<textarea>Hamletas - Viljamo Šekspyro tragedija, viena žymiausių jo pjesių. Tragedijoje pasakojama, kaip Hamletas keršija Klaudijui, pamatęs savo tėvo, karaliaus Hamleto vaiduoklį. Klaudijus nužudė savo brolį ir perėmė sostą, taip pat vedė savo mirusiojo brolio žmoną.</textarea>
		</td></tr>
	</table>

	<input type="submit" value="Įrašyti"/>
        <br>
                <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
</center>

</body>
</html>