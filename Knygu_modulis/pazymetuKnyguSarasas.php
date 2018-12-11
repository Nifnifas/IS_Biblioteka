<?php
session_start();
include("../nustatymai.php");

// tik klientams
$user_id = 1; // prisijungus, cia turetu buti user id (jeigu klientas)

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($db, "utf8");


?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Knygų sąrašas</title>
</head>
<body>

<center>
	<h2>Pasižymėtų knygų sąrašas</h2>

	<br/><br/><br/>
<?php

$query = "SELECT kurinys.* FROM kurinys
LEFT JOIN lentynos_zyma ON lentynos_zyma.fk_KurinysID = kurinys.id
WHERE lentynos_zyma.fk_KlientasID = $user_id;
";
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