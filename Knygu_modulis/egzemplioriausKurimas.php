<?php
session_start();
include("../nustatymai.php");

// tik darbuotojams

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$req_id = $_REQUEST["id"];
$req_kodas = $_REQUEST["kodas"];
if (!isset($req_id) || !isset($req_kodas)){
	header("Location: knyguSarasas.php");
	die();
}

$p_id = mysqli_real_escape_string($db, $req_id);
$p_kodas = mysqli_real_escape_string($db, $req_kodas);

$query = "INSERT INTO egzempliorius VALUES (null, '$p_kodas', $p_id)";
$result = mysqli_query($db, $query);

header("Location: knyguSarasas.php");
die();
?>