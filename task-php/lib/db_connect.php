<?php
	/* @var $db_aeon   */

	function get_user($id)
	{
		global $db_aeon;

		// Ищем в БД пользователя по id.
		$result = mysqli_fetch_assoc($db_aeon->query("SELECT * FROM `user` WHERE `id`=" . $id));
		$_SESSION['user_data'] = $result;
	}

	try {
		$db_aeon = new mysqli('localhost', 'root', '', 'aeon');
		$db_aeon->query("SET NAMES 'utf8_general_ci'");

	} catch (PDOException $e) {
		exit("Ошибка подключения: " . $e->getMessage());
	}
?>

