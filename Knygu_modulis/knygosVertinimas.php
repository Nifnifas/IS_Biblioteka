<?php
session_start();
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// tik klientams
$user_id = 1; // prisijungus, cia turetu buti user id (jeigu klientas)

$req_id = $_REQUEST["id"];
$req_ver = $_REQUEST["ver"];
if (!isset($req_id) || !isset($req_ver)){
	header("Location: knyguSarasas.php");
	die();
}
$p_id = mysqli_real_escape_string($db, $req_id);
$p_ver = mysqli_real_escape_string($db, $req_ver);

$query = "SELECT * FROM vertinimas WHERE fk_KurinysID = $p_id AND fk_KlientasID = $user_id LIMIT 1";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

//echo $query."\n";

if($row != false){
	echo "db: [".$row["Vertinimas"]."]; post: [".$p_ver."]\n";
	if ($row["Vertinimas"] == $p_ver){
		$query2 = "DELETE FROM vertinimas WHERE fk_KurinysID = $p_id AND fk_KlientasID = $user_id";
		$result2 = mysqli_query($db, $query2);
		die("ok - deleted");
	}else{
		$query2 = "UPDATE vertinimas SET Vertinimas = $p_ver WHERE fk_KurinysID = $p_id AND fk_KlientasID = $user_id";
		$result2 = mysqli_query($db, $query2);
		die("ok - updated");
	}
}else{
	$query2 = "INSERT INTO vertinimas VALUES (null, $p_ver, $p_id, $user_id)";
	$result2 = mysqli_query($db, $query2);
	die("ok - created");
}

//header("Location: knyguSarasas.php");
//die();
?>