<?php
session_start();
include("../nustatymai.php");

// tik darbuotojams

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$req_id = $_REQUEST["id"];
if (!isset($req_id)){
	//header("Location: knyguSarasas.php");
	die("-2");
}
$p_id = mysqli_real_escape_string($db, $req_id);

$query = "SELECT * FROM sutartis_egzempliorius WHERE fk_egzemplioriusID = $p_id";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0){
	die("-1");
}

$query2 = "DELETE FROM egzempliorius WHERE id = $p_id";
$result2 = mysqli_query($db, $query2);
die("1");

//header("Location: knyguSarasas.php");
//die();
?>