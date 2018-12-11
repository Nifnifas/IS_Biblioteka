<?php

function head($title = "Bibliotekos informacinė sistema", $extra = ""){
echo <<<HEAD
<head>
	<title>$title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
$extra
</head>
HEAD;
}

function navbar_inside(){
	echo "<div class=\"container\">";
	echo "<a href=\"..\"><h2>Bibliotekos informacinė sistema</h2></a>";
	echo "<a href=\"../Knygu_modulis/knyguSarasas.php\">Knygų sąrašas</a> ";
	if (true)	echo "<a href=\"../Knygu_modulis/pazymetuKnyguSarasas.php\">Pasižymėtų knygų sąrašas</a> "; // tikrinti, ar klientas
	
	// cia prideti nuorodas i kitas sistemos dalis
	//echo "<a href=\"../??_modulis/puslapis.php\">Sąrašas</a> ";
	//echo "<a href=\"../??_modulis/puslapis.php\">Sąrašas</a> ";
	//echo "<a href=\"../??_modulis/puslapis.php\">Sąrašas</a> ";
	//if (false)	echo "<a href=\"../_modulis/puslapis.php\">Darbuotojams</a> "; // tikrinti prisijungima
	//if (true)	echo "<a href=\"../_modulis/puslapis.php\">Klientams</a> ";
	echo "</div>";
	echo "<hr/>";
}

?>