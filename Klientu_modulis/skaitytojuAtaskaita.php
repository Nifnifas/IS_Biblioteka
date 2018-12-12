<?php
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($db, "utf8");


?>

<html>
<head>
    <title>Bibliotekos informacinė sistema</title>
</head>

<body>
    <a href="/is_biblioteka/atsijungimas.php">Atsijungti</a><br/>
    <a href="/is_biblioteka/paskyrosRedagavimas.php">Redaguoti paskyrą</a><br/>
    <a href="/is_biblioteka/turimiTaskai.php">Turimi taškai</a><br/>
    <center>
        <h1>Bibliotekos informacinė sistema</h1>
        <h2>Daugiausiai taškų turinčių skaitytojų ataskaita</h2>
        
<?php
$query = "SELECT * FROM klientas ORDER BY Taskai DESC";
        //."ORDER BY Taskai ASC"; //. TBL_KLIENTAS . " INNER JOIN " . TBL_KOMENTARAS
        //. "ON klientas.id=komentaras.fk_KlientasID";
$result = mysqli_query($db, $query);

echo "<table border='1' cellpadding='5'>";
echo "<tr><td>Užimta vieta</td><td>Vardas</td><td>Pavardė</td><td>Taškų kiekis</td></tr>";//
$counter = 1;
while (($row = mysqli_fetch_assoc($result)) != null){// != null){
    
	echo "<tr>";
	
        echo "<td>".$counter."</td>";
        echo "<td>".$row["Vardas"]."</td>";
	echo "<td>".$row["Pavarde"]."</td>";
        echo "<td>".$row["Taskai"]."</td>";
	
	echo "</tr>";
        $counter = $counter + 1;
}
echo "</table>";
?>
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <a href="../index.php">Grįžti</button>
        </div>
        </form>     
    </center>
</body>

</html>
