<?php

if (isset($_POST['login-submit'])) {

	require('dbConnect.php');

	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM `is_vartotojas` WHERE vardas='$username'";
		$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		$passwordCheck = password_verify($password, $row['slaptazodis']);

		if ($count == 1) {
			if($passwordCheck == true) {
				session_start();
				$_SESSION['userId'] = $row['id'];
				$_SESSION['userName'] = $row['vardas'];
				$_SESSION['userLevel'] = $row['teises'];

				header("Location: ../index.php?login=success");
				exit();
			}
			else {
				header("Location: ../prisijungimas.php?error=wrongpwd");
				exit();
			}
		}
		else {
			header("Location: ../prisijungimas.php?error=nouser");
			exit();
		}
	}
	else {
		header("Location: ../prisijungimas.php?error=emptyfields");
		exit();
	}
}
else {
	header("Location: ../index.php");
	exit();
}