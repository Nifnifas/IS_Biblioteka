<?php
session_start();
include("../nustatymai.php");
include("../sablonai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($db, "utf8");


echo "<html>";
head("Knygų sąrašas");
echo "<body>";

navbar_inside();

echo "<div class='container'>";

if (true) // tik darbuotojams
	echo "<a href='knygosKurimas.php'>Naujas kūrinys</a><br/>";

echo "<center><h2>Knygų sąrašas</h2></center>";

echo "Paieška:<br/>";
echo "<form method='post'>";

$query = "SELECT * FROM kurinys WHERE 1";

$search_pav = "";
$search_aut = "";
if (isset($_REQUEST["submit"])){
	$search_pav = $_REQUEST["pav"];
	$search_aut = $_REQUEST["aut"];
	
	$query .= " AND pavadinimas LIKE '%".mysqli_real_escape_string($db, $search_pav)."%'";
	$query .= " AND autorius LIKE '%".mysqli_real_escape_string($db, $search_aut)."%'";
}
echo "Pavadinimas: <input type='text' name='pav' value='".$search_pav."'/> ";
echo "Autorius: <input type='text' name='aut' value='".$search_aut."'/> ";

echo "<input type='submit' name='submit' class='btn btn-sm' value='Ieškoti'/>";
echo "</form>";

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
