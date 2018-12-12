<?php
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Rezervuoti renginiai</title>
</head>

<body>
    <a href="/is_biblioteka/atsijungimas.php">Atsijungti</a><br/>
    <a href="/is_biblioteka/paskyrosRedagavimas.php">Redaguoti paskyrą</a><br/>
    <a href="/is_biblioteka/turimiTaskai.php">Turimi taškai</a><br/>
    <center>
	<h2>Rezervuoti renginiai</h2>
        <table border="1" cellpadding="10">
            <tr align="center">
                
<?php
$query = "SELECT * FROM renginiai ORDER BY Data_laikas asc";
$result = mysqli_query($db, $query);

echo "<tr><td>Renginys</td><td>Data, laikas</td></tr>";
while (($row = mysqli_fetch_assoc($result)) != null){
	echo "<tr>";
	echo "<td>";
		echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
                
                
                echo "<a href='renginioInformacija.php?id=".$row['id']."'>" . $row['Pavadinimas'] . "</a> ";
		echo "</form>";
	echo "</td>";
        $date = new DateTime($row["Data_laikas"]);
        echo "<td>".$date->format('Y-m-d').", ".$date->format('H:i')."</td>";

	
	echo "</tr>";
}
echo "</table>";
?>
            </tr>
        </table>
        <br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.go(-2)">Grįžti į pradžią</button>
        </div>
    </center>
</body>

</html>