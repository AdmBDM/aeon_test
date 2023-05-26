<?php
	/* @var $db_aeon   */
	/* @var $param   */

	$param = require 'lib/config.php';
	require_once 'lib/db_connect.php';
	require_once 'lib/functions.php';

	function check_auth($login, $pass, $fl_session = false): bool
	{
		global $db_aeon, $param;

		// Ищем в БД пользователя. Поля `username` и `email` уникальны.
		$result = mysqli_fetch_assoc($db_aeon->query("SELECT * FROM `user` WHERE `username`='" . $login . "'"));
		if ($result & password_verify($pass, $result['password_hash'])) {
			setcookie('task_aeon', $param['delim_str'] . $result['username']
					. $param['delim_str'] . $result['auth_key']
					. $param['delim_str'] . $result['is_admin']
					. $param['delim_str'] . $_SERVER['REMOTE_ADDR']
					. $param['delim_str'] . time()
					. $param['delim_str'],
					time() + $param['cookie_ttl'], "/");
			$_SESSION['user_data'] = $result;
			setcookie('ok', $result['id'], time()+5, "/");
			return true;
		}
		return false;
	}

		$login = $_POST['username'];
		$pass = $_POST['password'];

//		$param['check_user'] = check_auth($login, $pass);
//		$result = '0';
//		if ($param['check_user']) {
//		echo $result;
		echo check_auth($login, $pass) ? '1' : '0';


