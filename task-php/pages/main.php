<?php
/* @var $db_aeon   */
	$error = '';

	if (isset($_REQUEST['username']) & isset($_REQUEST['password'])) {
		$login = $_REQUEST['username'];
		$pass = $_REQUEST['password'];

		// Ищем в БД пользователя. Поля `username` и `email` уникальны.
		$result = mysqli_fetch_assoc($db_aeon->query("SELECT * FROM `user` WHERE `username`='" . $login . "'"));
		if ($result & password_verify($pass, $result['password_hash'])) {
			setcookie('user', $result['username'], time() + 3600, "/");

			session_start();
			header('Location: /pages/info.php');
		} else {
			// Выводит ошибку если не нашли такой пар логин/пароль
			$error = "Ведённая пара Логин/Пароль не зарегистрирована!";
			session_unset();
		}
	}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<title>Войти</title>
</head>
<body>

<form method="post" action="" name="signup-form" class="form-login">
	<div class="form-element head">Введите логин/пароль</div>
	<div class="form-element">
		<label>Имя пользователя</label>
		<input type="text" name="username" pattern="[a-zA-Z0-9]+" required placeholder="Jim7"/>
	</div>
	<div class="form-element">
		<label>Пароль</label>
		<input type="password" name="password" required placeholder="111"/>
	</div>
	<button type="submit" name="login" value="login">Вход</button>
</form>

<?php if (isset($error)): ?>
	<div class="error"><?= $error ?></div>
<?php endif; ?>

</body>
</html>
