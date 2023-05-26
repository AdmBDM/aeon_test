<?php
	/* @var $db_aeon   */

	$param = require 'lib/config.php';
	require_once 'lib/db_connect.php';
	require_once 'lib/functions.php';

	session_start();
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<title>Т/З</title>
</head>
<body>

<?php
	if ($_COOKIE['ok']) {
		get_user($_COOKIE['ok']);
		include "info.php";
	}
	else include "login.php";
?>

</body>
</html>
