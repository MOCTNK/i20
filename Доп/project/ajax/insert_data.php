<?php
require '../config/lib.php';
require '../config/query.php';

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['year']) && isset($_POST['gender']) && isset($_POST['topic']) && isset($_POST['essence'])) {

	$name = checkStr($_POST['name']);
	$email = checkStr($_POST['email']);
	$year = checkInt($_POST['year']);
	$gender = checkInt($_POST['gender']);
	$topic = checkStr($_POST['topic']);
	$essence = checkStr($_POST['essence']);
	$error = false;
	$errors = [0, 0, 0, 0, 0, 0];

	if(!preg_match("/\A\b[а-яa-z]{3,50}\b\z/ui", $name)) {
		$error = true;
		$errors[0] = 1;
	}

	if(!preg_match("/\A\b[0-9a-z_]+@[0-9a-z_\.]+\.[a-z]{2,3}\b\z/i", $email)) {
		$error = true;
		$errors[1] = 1;
	}

	if(!($year >= 1900 && $year <= 2022))  {
		$error = true;
		$errors[2] = 1;
	}

	if(!($gender == 1 || $gender == 2))  {
		$error = true;
		$errors[3] = 1;
	}

	if(!preg_match("/\A\b[0-9а-яa-z\.,! -_?]{1,255}\b\z/ui", $topic)) {
		$error = true;
		$errors[4] = 1;
	}

	if(!preg_match("/\A\b[0-9а-яa-z\.,! -_?]{1,1000}\b\z/ui", $essence)) {
		$error = true;
		$errors[5] = 1;
	}

	if(!$error) {
		insertData($name, $email, $year, $gender, $topic, $essence);
		if (isset($_COOKIE['data'])) {
			unset($_COOKIE['data']);
		}
		saveData($name, $email, $year, $gender);
		echo 0;
	} else {
		$str_error = "1";
		foreach ($errors as $e) {
			$str_error .= ".".$e;
		}
		echo $str_error;
	}
} else {
	echo 2;
}
?>