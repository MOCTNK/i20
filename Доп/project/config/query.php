<?php 
	require '../config/db.php';

	function insertData($name, $email, $year, $gender, $topic, $essence) {
		global $link;
		
		$sql = "INSERT INTO applications (name, email, year, gender, topic, essence)
				VALUES (:name, :email, :year, :gender, :topic, :essence)";
		$query = $link->prepare($sql);

		$params = [
			'name' => $name,
			'email' => $email,
			'year' => $year,
			'gender' => $gender,
			'topic' => $topic,
			'essence' => $essence
		];

		$query->execute($params);
	}
?>