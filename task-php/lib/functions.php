<?php
	function myDebug($arr, $die = false)
	{
		echo '<pre style="text-align: left; padding: 15px;">' . print_r($arr, true) . '</pre>';
		if ($die) die;
	}

	function buildDbTree(array $objects, $parentId = 0)
	{
		$arr = array();

		foreach ($objects as $object) {
			if ($object['parent_id'] == $parentId) {
				$sub_obj = buildDbTree($objects, $object['id']);
				if ($sub_obj) {
					$object['sub_obj'] = $sub_obj;
				}
				$arr[] = $object;
			}
		}
		return $arr;
	}

