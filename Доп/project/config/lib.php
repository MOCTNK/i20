<?php 
	function checkStr($str) {
		$result = trim($str);
		$result = htmlspecialchars($result);
		return $result;
	}

	function checkInt($int) {
		$minus = ($int < 0) ? -1 : 1;
		return  $minus * abs((int)$int);
	}

	function saveData($name, $email, $year, $gender) {
		$data = [
			'name' => $name,
			'email' => $email,
			'year' => $year,
			'gender' => $gender
		];
		$cookie_data = base64_encode(serialize($data));
		setcookie('data', $cookie_data, strtotime('+30 days'), '/');
	}

	function getData() {
		if(isset($_COOKIE['data'])) {
			$cookie_data = unserialize(base64_decode($_COOKIE['data']));
			return $cookie_data;
		}
	}
?>