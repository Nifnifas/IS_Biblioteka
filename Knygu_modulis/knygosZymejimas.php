<?php
session_start();
include("../nustatymai.php");

// tik klientams
$user_id = 1; // prisijungus, cia turetu buti user id

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$req_id = $_REQUEST["id"];
if (!isset($req_id)){
	//header("Location: knyguSarasas.php");
	die("-7");
}
$p_id = mysqli_real_escape_string($db, $req_id);

$query = "SELECT * FROM lentynos_zyma WHERE fk_KurinysID = $p_id AND fk_KlientasID = $user_id";
$result = mysqli_query($db, $query);

//echo $query."\n";

if(mysqli_num_rows($result) > 0){
	$query2 = "DELETE FROM lentynos_zyma WHERE fk_KurinysID = $p_id AND fk_KlientasID = $user_id";
	$result2 = mysqli_query($db, $query2);
	die("0");
}else{
	$query2 = "INSERT INTO lentynos_zyma VALUES ($user_id, $p_id)";
	$result2 = mysqli_query($db, $query2);
	die("1");
}

?>