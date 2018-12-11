<?php
session_start();
include("../nustatymai.php");

// tik darbuotojams

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$req_id = $_REQUEST["id"];
if (!isset($req_id)){
	header("Location: knyguSarasas.php");
	die();
}
$p_id = mysqli_real_escape_string($db, $req_id);

$query = "SELECT * FROM egzempliorius WHERE fk_kurinysID = $p_id";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0){
	//die("Negalima trinti, kol yra egzempliorių");
	die("-1");
}

$query2 = "DELETE FROM kurinys WHERE id = $p_id";
$result2 = mysqli_query($db, $query2);
die("1");

//header("Location: knyguSarasas.php");
//die();
?>