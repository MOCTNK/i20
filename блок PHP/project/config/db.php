<?php
	const DB_HOST = "localhost";
	const DB_LOGIN = "root";
	const DB_PASSWORD = "";
	const DB_NAME = "store";

	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

	if(mysqli_connect_error()) {
		error_log('Ошибка при подключении: ' . mysqli_connect_error());
	}
?>