<?php
session_start();
include("../nustatymai.php");
include("../sablonai.php");

// tik klientams
$user_id = 1; // prisijungus, cia turetu buti user id

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($db, "utf8");


echo "<html>";
head("Pasižymėtų knygų sąrašas");
echo "<body>";

navbar_inside();

echo "<div class='container'>";

echo "<center><h2>Pasižymėtų knygų sąrašas</h2></center>";


$query = "SELECT kurinys.* FROM kurinys
LEFT JOIN lentynos_zyma ON lentynos_zyma.fk_KurinysID = kurinys.id
WHERE lentynos_zyma.fk_KlientasID = $user_id";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0){
	echo "<table class='table table-bordered table-hover'>";
	echo "<thead><tr><th>Pavadinimas</th><th>Autorius</th></tr></thead>";
	while (($row = mysqli_fetch_assoc($result)) != null){
		echo "<tr>";
		
		echo "<td>";
			echo $row["Pavadinimas"];
			echo "<form action='knygosPerziura.php' method='post'>";
			echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
			echo "<input type='submit' class='btn btn-sm' value='Peržiūrėti'/>";
			echo "</form>";
		echo "</td>";
		echo "<td>".$row["Autorius"]."</td>";
		
		echo "</tr>";
	}
	echo "</table>";
}else{
	echo "Nėra, ką rodyti";
}

echo "</div>";

echo "</body>";
echo "</html>";
?>
