<?php

if (isset($_POST['signup-submit'])) {
	
	require 'dbConnect.php';

	$username = $_POST['slapyvardis'];
	$name = $_POST['vardas'];
	$surname = $_POST['pavarde'];
	$email = $_POST['pastas'];
	$password = $_POST['slaptazodis'];
	$password_repeat = $_POST['slaptazodis-antras'];
	$number = $_POST['telefonas'];
	$address = $_POST['adreesas'];

	if (empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
		header("Location: ../registracija.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../registracija.php?error=invalidmailuid");
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../registracija.php?error=invalidemail&uid=".$username);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../registracija.php?error=invaliduid&mail=".$email);
		exit();
	}
	else if ($password !== $password_repeat) {
		header("Location: ../registracija.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();
	}
	else {
		$sql = "SELECT vardas FROM is_vartotojas WHERE vardas=?";
		$stmt = mysqli_stmt_init($connect);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../registracija.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../registracija.php?error=usertaken&mail=".$email);
				exit();
			}
			else {
				$sqlQuery = "INSERT INTO klientas (Vardas, Pavarde, Tel_nr, El_pastas, Adresas) VALUES ('$name', '$surname', '$number', '$email', 'address')";
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