<?php
session_start();
include("../nustatymai.php");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME1);
mysqli_set_charset($db, "utf8");


if (isset($_POST['update-submit'])) {
	
	require 'dbConnect.php';

	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['psw'];
	$password_repeat = $_POST['psw1'];


	if (empty($email) || empty($password) || empty($password_repeat)) {
		header("Location: ../paskyrosRedagavimas.php?error=emptyfields&mail=".$email);
                //exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../paskyrosRedagavimas.php?error=invalidmailuid");
		//exit();
	}
	else if ($password !== $password_repeat) {
		header("Location: ../paskyrosRedagavimas.php?error=passwordcheck&uid=".$username."&mail=".$email);
		//exit();
	}
	else {
            echo "yoooooooooooooooooooooooooooooo";
                $user_id = $_SESSION['userId'];
                $klientoID = "SELECT * FROM is_vartotojas WHERE id=$user_id";
                $result = mysqli_query($db, $klientoID);
                $row = $result->fetch_assoc();
                $id = $row["kliento_id"];
		$query = "UPDATE klientas SET Vardas='$name', Pavarde='$surname', El_pastas='$email' WHERE id=$id";
                $result = mysqli_query($db, $query);
            
            
            
		$sql = "SELECT vardas FROM is_vartotojas WHERE vardas=?";
		$stmt = mysqli_stmt_init($connect);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../paskyrosRedagavimas.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../paskyrosRedagavimas.php?error=usertaken&mail=".$email);
				exit();
			}
			else {
                                $user_id = $_SESSION['userId'];
                                $klientoID = "SELECT * FROM is_vartotojas WHERE id=$user_id";
                                $result = mysqli_query($db, $klientoID);
                                $row = $result->fetch_assoc();
                                $id = $row["kliento_id"];
				$sqlQuery = "UPDATE klientas SET Vardas='$name', Pavarde='$surname', El_pastas='$email' WHERE id=$id";
				$stmt2 = mysqli_stmt_init($connect);
				mysqli_stmt_prepare($stmt2, $sqlQuery);
				mysqli_stmt_execute($stmt2);


				$id = mysqli_insert_id($connect);
				$sql = "INSERT INTO is_vartotojas (vardas, slaptazodis, teises, kliento_id) VALUES (?, ?, '1', ?)";
				$stmt = mysqli_stmt_init($connect);
				if(!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../registracija.php?error=sqlerror");
					exit();
				}
				else {

					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPwd, $id);
					mysqli_stmt_execute($stmt);
					header("Location: ../index.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($connect);

}
else {
	header("Location: ../registracija.php");
	exit();
}