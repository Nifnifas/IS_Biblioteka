<?php
session_start();
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($db, "utf8");


?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Knygų sąrašas</title>
</head>
<body>

Darbuotojams:
<a href="knygosKurimas.php">Naujas kūrinys</a>
<br/>
Klientams:
<a href="pazymetuKnyguSarasas.php">Pažymėtų knygų sąrašas</a>
<br/>

<center>
	<h2>Knygų sąrašas</h2>

	Paieška:<br/><br/>
	<form method="post">
<?php
$query = "SELECT * FROM kurinys WHERE 1";

$search_pav = "";
$search_aut = "";
if (isset($_REQUEST["submit"])){
	$search_pav = $_REQUEST["pav"];
	$search_aut = $_REQUEST["aut"];
	
	$query .= " AND pavadinimas LIKE '%".mysqli_real_escape_string($db, $search_pav)."%'";
	$query .= " AND autorius LIKE '%".mysqli_real_escape_string($db, $search_aut)."%'";
}
echo "Pavadinimas: <input type='text' name='pav' value='".$search_pav."'/>";
echo "Autorius: <input type='text' name='aut' value='".$search_aut."'/>";
?>
	<input type="submit" name="submit" value="Ieškoti"/>
	</form>

	<br/><br/><br/>
	
<?php


$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0){
	echo "<table border='1' cellpadding='5'>";
	echo "<tr><td>Pavadinimas</td><td>Autorius</td></tr>";
	while (($row = mysqli_fetch_assoc($result)) != null){
		echo "<tr>";
		
		echo "<td>";
			echo $row["Pavadinimas"];
			echo "<form action='knygosPerziura.php' method='post'>";
			echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
			echo "<input type='submit' value='Peržiūrėti'/>";
			echo "</form>";
		echo "</td>";
		echo "<td>".$row["Autorius"]."</td>";
		
		echo "</tr>";
	}
	echo "</table>";
}else{
	echo "Nėra, ką rodyti";
}
?>
        <br>
                <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti į pradžią</button>
        </div>
</center>

</body>
</html>