<?php
session_start();
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$req_id = $_REQUEST["id"];
if (!isset($req_id)){
	header("Location: knyguSarasas.php");
	die();
}
$p_id = mysqli_real_escape_string($db, $req_id);

$query = "SELECT * FROM sutartis_egzemplorius WHERE fk_egzemplioriusID = $p_id";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($db, $result) > 0){
	die("Negalima trinti, kol yra sutarčių");
}

$query2 = "DELETE FROM egzempliorius WHERE id = $p_id";
$result2 = mysqli_query($db, $query2);

header("Location: knyguSarasas.php");
die();
?>