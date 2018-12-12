<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title>Bibliotekos informacinė sistema</title>
</head>
<body>
	<body>
    <?php if (isset($_SESSION['userId'])) { ?>
    <a href="../Procesai/atsijungti.php">Atsijungti</a><br/>
    <a href="../paskyrosRedagavimas.php">Redaguoti paskyrą</a><br/>
    <?php  if ($_SESSION['userLevel'] == 1) { ?>
    <a href="../turimiTaskai.php">Turimi taškai</a><br/>
<?php }} else {?>
    <a href="../prisijungimas.php">Prisijungti</a><br/>
    <a href="../registracija.php">Registruotis</a><br/>
<?php } ?>
    <center>
        <h1>Bibliotekos informacinė sistema</h1>
    </center>
</head>
<body>
