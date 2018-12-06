<?php
session_start();
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($db, "utf8");

$req_id = $_REQUEST["id"];
if (!isset($req_id)){
	header("Location: knyguSarasas.php");
	die();
}
$p_id = mysqli_real_escape_string($db, $req_id);

$query = "SELECT * FROM kurinys WHERE id = $p_id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);


$query2 = "SELECT * FROM egzempliorius WHERE fk_KurinysID = $p_id";
$result2 = mysqli_query($db, $query2);

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Knyga: Hamletas</title>
</head>
<body>

<a href="knyguSarasas.php">Knygų sąrašas</a><br/>

<center>
	<table width="50%">
<?php


echo "<tr><td align='center'><h2>".$row["Pavadinimas"]."</h2></td></tr>";
echo "<tr><td>Autorius: ".$row["Autorius"]."</td></tr>";
echo "<tr><td>Išleidimo metai: ".$row["Isleidimo_metai"]."</td></tr>";
echo "<tr><td>".$row["Aprasymas"]."</td></tr>";

?>
	</table>
</center>
<hr/>
Klientams: <input type="button" value="Pažymėti"/>
<input type="button" value="Rezervuoti">
<hr/>
Darbuotojams:<br/>
<form action="knygosRedagavimas.php" method='post'>
<?php echo "<input type='hidden' name='id' value='".$p_id."'/>"; ?>
	<input type="submit" value="Redaguoti kūrinį"/>
</form>
<form action="knygosSalinimas.php" method='post'>
<?php echo "<input type='hidden' name='id' value='".$p_id."'/>"; ?>
	<input type="submit" value="Šalinti kūrinį"/>
</form>

<br/><br/>
Egzemplioriai:<br/>
<form action="egzemplioriausKurimas.php" method='post'>
<?php echo "<input type='hidden' name='id' value='".$p_id."'/>"; ?>
Kodas: <input type="text" name="kodas"/><input type="submit" value="Pridėti"/>
</form>
<?php
while (($row = mysqli_fetch_assoc($result2)) != null){
	echo "<form action='egzemplioriausSalinimas.php' method='post'>";
	echo $row["Kodas"];
	echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
	echo "<input type='submit' value='Šalinti'/>";
	echo "</form>";
}
?>

<br>
        <div class="container" style="background-color:#f1f1f1">
            <button onclick="javascript:history.back()">Grįžti</button>
        </div>
</body>
</html>