<?php
session_start();
include("../nustatymai.php");
include("../sablonai.php");

// nebutinai klientams, bet klientams reikia id
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

// darbuotojams //
$query2 = "SELECT * FROM egzempliorius WHERE fk_KurinysID = $p_id";
$result2 = mysqli_query($db, $query2);
// - //


// klientams //
$vertinimas = 0;
$marked = false;
if ($user_id > 0){
	$query3 = "SELECT * FROM vertinimas WHERE fk_KurinysID = $p_id AND fk_KlientasID = $user_id";
	$result3 = mysqli_query($db, $query3);
	$row3 = mysqli_fetch_assoc($result3);
	if ($row3){ // atrodo, kad veikia
		$vertinimas = intval($row3["Vertinimas"]);
	}
	
	$query4 = "SELECT * FROM lentynos_zyma WHERE lentynos_zyma.fk_KlientasID = $user_id AND lentynos_zyma.fk_KurinysID = $p_id";
	$result4 = mysqli_query($db, $query4);
	if (mysqli_num_rows($result4) > 0){
		$marked = true;
	}
}
// - //


echo "<html>";
$marker = $marked ? "true" : "false";

$extra = <<<HERE
<style>
img.star:hover{
	cursor: pointer;
}
</style>
<script>
var num = {$vertinimas};
var mark = {$marker};
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
		var newVert = $(this).attr("value");
		
		$.post( "knygosVertinimas.php", { id: {$p_id}, ver: newVert }, function(data) {
			if (data == 0 || data == 1 || data == 2){
				num = newVert == num ? 0 : newVert;
			}else{
				alert( "Įvyko klaida" );
			}
			
			defaultStars();
		})
		.fail(function() {
			alert( "Įvyko klaida" );
		})
	});
	
	$("#mark").click(function(){
		$.post( "knygosZymejimas.php", { id: {$p_id} }, function(data) {
			if (data == 0){
				mark = false;
				$("#mark").attr("value", "Įdėti į lentyną");
			}else if (data == 1){
				mark = true;
				$("#mark").attr("value", "Išimti iš lentynos");
			}else{
				alert( "Įvyko klaida" );
			}
		})
		.fail(function() {
			alert( "Įvyko klaida" );
		})
	});
	
	$("#del").click(function(){
		$.post( "knygosSalinimas.php", { id: {$p_id} }, function(data) {
			if (data == 1){
				alert( "Knyga pašalinta" );
				$(location).attr('href', 'knyguSarasas.php');
			}else if (data == -1){
				alert( "Negalima šalinti, kol yra egzempliorių" );
			}else{
				alert( "Įvyko klaida" );
			}
		})
		.fail(function() {
			alert( "Įvyko klaida" );
		})
	});
	/*
	$("#add-copy").click(function(){
		$.post( "egzemplioriausKurimas.php", { id: {$p_id} }, function(data) {
			alert(data);
			if (data == 0){
				alert( "Knyga pašalinta" );
				// redirect
			}else if (data == -1){
				alert( "Negalima šalinti, kol yra egzempliorių" );
			}else{
				alert( "Įvyko klaida" );
			}
		})
		.fail(function() {
			alert( "Įvyko klaida" );
		})
	});
	
	$("#del-copy").click(function(){
		$.post( "egzemplioriausSalinimas.php", { id: {$p_id} }, function(data) {
			alert(data);
			if (data == 0){
				alert( "Knyga pašalinta" );
				// redirect
			}else if (data == -1){
				alert( "Negalima šalinti, kol yra egzempliorių" );
			}else{
				alert( "Įvyko klaida" );
			}
		})
		.fail(function() {
			alert( "Įvyko klaida" );
		})
	});//*/
})
</script>
HERE;

head("Knyga: ".$row["Pavadinimas"], $extra);
echo "<body>";

navbar_inside();

echo "<div class='container'>";

echo "<center>";
echo "<table width='50%'>";

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

<input id="mark" type="button" class="btn btn-sm" value="<?php echo $marked ? "Išimti iš lentynos" : "Įdėti į lentyną"; ?>"/>
<br/>


<input type="button" class="btn btn-sm" value="Rezervuoti">
<!-- 
sutarciu modulis:
	rezeravimas 
-->


<hr/>
Darbuotojams:<br/>
<form action="knygosRedagavimas.php" method='post'>
<?php echo "<input type='hidden' name='id' value='".$p_id."'/>"; ?>
	<input type="submit" class="btn btn-sm" value="Redaguoti kūrinį"/>
</form>
<input id="del" type="button" class="btn btn-sm" value="Šalinti kūrinį"/>

<br/><br/>
<div class="container">
	<div class="row my-2">
		<span>Egzemplioriai:</span>
	</div>
	<div class="row">
		<form action="egzemplioriausKurimas.php" method='post' style='width: 100%;'>
			<div class="input-group mb-2">
				<input type="text" name="kodas" class="form-control"/>
				<?php echo "<input type='hidden' name='id' value='".$p_id."'/>"; ?>
				<div class="input-group-append">
					<button class="btn btn-success" type="submit">Pridėti</button>
				</div>
			</div>
		</form>
	</div>
<?php
while (($row = mysqli_fetch_assoc($result2)) != null){
	echo "<div class='row'>";
		echo "<form action='egzemplioriausSalinimas.php' method='post' style='width: 100%;'>";
			echo "<div class='input-group mb-2'>";
				echo "<input type='text' class='form-control' value=".$row["Kodas"]." disabled />";
				echo "<input type='hidden' name='id' value='".$row["id"]."'/>";
				echo "<div class='input-group-append'>";
					echo "<input class='btn btn-danger' type='submit' value='Šalinti' />";
				echo "</div>";
			echo "</div>";
		echo "</form>";
	echo "</div>";
}
?>
</div>

</div>

</body>
</html>