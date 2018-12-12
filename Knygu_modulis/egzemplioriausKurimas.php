<?php
session_start();
include("../nustatymai.php");

// tik darbuotojams
if ($_SESSION['userLevel'] != 2){
	header("Location: knyguSarasas.php");
	die();
}

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$req_id = $_REQUEST["id"];
$req_kodas = $_REQUEST["kodas"];
//echo $req_id." | ".$req_kodas;
if (!isset($req_id) || !isset($req_kodas)){
	//header("Location: knyguSarasas.php");
	die("-1");
}

$p_id = mysqli_real_escape_string($db, $req_id);
$p_kodas = mysqli_real_escape_string($db, $req_kodas);

$query = "INSERT INTO egzempliorius (`id`, `Kodas`, `fk_KurinysID`) VALUES (null, '$p_kodas', $p_id)";
$result = mysqli_query($db, $query);

//header("Location: knyguSarasas.php");
die("1");
?>