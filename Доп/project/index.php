<?php 
	require './config/lib.php';
	$data = [
		'name' => "",
		'email' => "",
		'year' => 0,
		'gender' => 0
	];
	if(isset($_COOKIE['data'])) {
		$data = getData();
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Форма обратной связи</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form id="form" class="login-form">
			<h1>
				<div class="login-form__head">Форма обратной связи</div>
			</h1>
			<p>
				<div class="login-form__input-name">Имя</div>
				<div id="error-1" class="login-form__error"></div>
				<input id="input-1" class="login-form__input" type="text" maxlength="50" name="name" value="<?= $data['name']?>">
			</p>
			<p>
				<div class="login-form__input-name">E-mail</div>
				<div id="error-2" class="login-form__error"></div>
				<input id="input-2" class="login-form__input" type="text" name="email" value="<?= $data['email']?>">
			</p>
			<p>
				<div class="login-form__input-name">Год рождения</div>
				<div id="error-3" class="login-form__error"></div>
				<select class="login-form__input" name="year">
					<option>Выберите год рождения</option>
					<?php 
						for($i = 1900; $i <= 2022; $i++) {
					?>
						<option <?php echo ($i != $data['year']) ?: "selected"; ?>><?= $i?></option>
					<?php 
						}
					?>
				</select>
			</p>
			<p>
				<div class="login-form__input-name">Пол</div>
				<div id="error-4" class="login-form__error"></div>
				<input id="radio-1" type="radio" name="gender" value="1" <?php echo (1 != $data['gender']) ?: "checked"; ?>>
				<label for="radio-1">Мужской</label>
				<input id="radio-2" type="radio" name="gender" value="2" <?php echo (2 != $data['gender']) ?: "checked"; ?>>
				<label for="radio-2">Женский</label>
			</p>
			<p>
				<div class="login-form__input-name">Тема обращения</div>
				<div id="error-5" class="login-form__error"></div>
				<input id="input-3" class="login-form__input" type="text" maxlength="255" name="topic" style="width: 100%;" value="">
			</p>
			<p>
				<div class="login-form__input-name">Суть вопроса</div>
				<div id="error-6" class="login-form__error"></div>
				<textarea id="input-4" class="login-form__input" maxlength="1000" name="essence" style="width: 100%; height: 300px; resize: none;"></textarea>
			</p>
			<p>
				<input id="input-5" type="checkbox">
				<label id="inputc-5" for="input-5">с контрактом ознакомлен</label>
			</p>
			<button id="send" class="login-form__button">Отправить</button>
		</form>
	</div>
</body>
<script src="/jquery/jquery.js"></script>
<script src="/jquery/main.js"></script>
</html>