<?php
require '../config/lib.php';
require '../config/query.php';

$error = false;
$errors = [0, 0, 0, 0, 0, 0];
$name = Null;
$email= Null;
$year= Null;
$gender = Null;
$topic = Null;
$essence = Null;

if(!isset($_POST['name']) || empty($_POST['name'])) {
	$error = true;
	$errors[0] = 1;
} else {
	$name = checkStr($_POST['name']);
}

if(!isset($_POST['email']) || empty($_POST['email'])) {
	$error = true;
	$errors[1] = 1;
} else {
	$email = checkStr($_POST['email']);
}

if(!isset($_POST['year']) || empty($_POST['year']) || $_POST['year'] == 0) {
	$error = true;
	$errors[2] = 1;
} else {
	$year = checkInt($_POST['year']);
}

if(!isset($_POST['gender']) || empty($_POST['gender'])) {
	$error = true;
	$errors[3] = 1;
} else {
	$gender = checkInt($_POST['gender']);
}

if(!isset($_POST['topic']) || empty($_POST['topic'])) {
	$error = true;
	$errors[4] = 1;
} else {
	$topic = checkStr($_POST['topic']);
}

if(!isset($_POST['essence']) || empty($_POST['essence'])) {
	$error = true;
	$errors[5] = 1;
} else {
	$essence = checkStr($_POST['essence']);
}

if(!preg_match("/\A\b[а-яa-z]{3,50}\b\z/ui", $name) && $name != Null) {
	$error = true;
	$errors[0] = 1;
}

if(!preg_match("/\A\b[0-9a-z_]+@[0-9a-z_\.]+\.[a-z]{2,3}\b\z/i", $email) && $email != Null) {
	$error = true;
	$errors[1] = 1;
}

if(!($year >= 1900 && $year <= 2022) && $year != Null)  {
	$error = true;
	$errors[2] = 1;
}

if(!($gender == 1 || $gender == 2) && $gender != Null)  {
	$error = true;
	$errors[3] = 1;
}

if(!preg_match("/\A\b[0-9а-яa-z\.,! -_?]{1,255}\b\z/ui", $topic) && $topic != Null) {
	$error = true;
	$errors[4] = 1;
}

if(!preg_match("/\A\b[0-9а-яa-z\.,! -_?]{1,1000}\b\z/ui", $essence) && $essence != Null) {
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

?>