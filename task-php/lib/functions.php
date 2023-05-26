<?php
	function myDebug($arr, $die = false)
	{
		echo '<pre style="text-align: left; padding: 7px;">' . print_r($arr, true) . '</pre>';
		if ($die) die;
	}

