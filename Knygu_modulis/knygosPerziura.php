<?php
session_start();
include("../nustatymai.php");

$user_id = 1; // prisijungus, cia turetu buti user id (jeigu klientas)

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

$vertinimas = 0;
if ($user_id > 0){
	$query3 = "SELECT * FROM vertinimas WHERE fk_KurinysID = $p_id AND fk_KlientasID = $user_id";
	$result3 = mysqli_query($db, $query3);
	$row3 = mysqli_fetch_assoc($result3);
	if ($row3){ // atrodo, kad veikia
		$vertinimas = intval($row3["Vertinimas"]);
	}
}

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Knyga: <?php echo $row["Pavadinimas"]; ?></title>
	<style>
img.star:hover{
	cursor: pointer;
}
	</style>
	<script>
var num = <?php echo $vertinimas; ?>;
function defaultStars(){
	$("img.star").attr("src","star_gray.png");
	
	if (num > 0){
		var star = $("img.star")[num-1];
		$(star).prevAll().addBack().attr("src","star.png");
	}
}
$(function(){
	defaultStars();
	$("img.star").hover(
		function(){ // mouseover
			$(this).siblings().addBack().attr("src","star_gray.png");
			if($(this).attr("value") != num){
				$(this).prevAll().addBack().attr("src","star.png");
			}
		}, function(){ // mouseout
			defaultStars();
		}
	);
	$("img.star").click(function(){
		var newval = $(this).attr("value");
		
		var jqxhr = $.post( "knygosVertinimas.php", { id: <?php echo $p_id; ?>, ver: newval }, function(data) {
			//alert( "success" );
			//alert( data );
			
			num = newval == num ? 0 : newval;
			defaultStars();
		})
		.fail(function() {
			alert( "Įvyko klaida" );
		})
		
	});
})
	</script>
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

//echo "Ver: [".$vertinimas."]";
?>
	</table>
</center>
<hr/>
Klientams:<br/>

Vertinti:
<div>
<img value="1" class="star" src="star_gray.png"/>
<img value="2" class="star" src="star_gray.png"/>
<img value="3" class="star" src="star_gray.png"/>
<img value="4" class="star" src="star_gray.png"/>
<img value="5" class="star" src="star_gray.png"/>
</div><br/>


<input type="button" value="Pažymėti"/><br/>

<input type="button" value="Rezervuoti">
<!-- sutarciu modulis: rezeravimas -->

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

<br/>
<div class="container" style="background-color:#f1f1f1">
	<button onclick="javascript:history.back()">Grįžti</button>
</div>

</body>
</html>