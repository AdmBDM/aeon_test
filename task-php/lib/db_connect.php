<?php
	try {
		$db_aeon = new mysqli('localhost', 'root', '', 'aeon');
		$db_aeon->query("SET NAMES 'utf8_general_ci'");

	} catch (PDOException $e) {
		exit("Ошибка подключения: " . $e->getMessage());
	}
?>