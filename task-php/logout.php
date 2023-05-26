<?php
	/* @var $param   */

	setcookie("login", "", time() - $param['cookie_ttl']);
	setcookie("pass", "", time() - $param['cookie_ttl']);
	setcookie("task_aeon", "", time() - $param['cookie_ttl']);
	session_unset();
	unset($_POST);
	unset($_SESSION);
	header('Location: index.php');
