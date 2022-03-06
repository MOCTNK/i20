<?php 

const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "db";


try {
	$link = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_LOGIN, DB_PASSWORD);
} catch (PDOException $e) {
	die('Подключение не удалось: ' . $e->getMessage());
}

?>