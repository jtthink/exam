<?php

$static_filePath = "static/";
// echo $_SERVER["REQUEST_URI"];die;
$get_path = str_replace("/", "", $_SERVER["REQUEST_URI"]);

if (file_exists($static_filePath . $get_path)) {
	include ($static_filePath . $get_path);
	//进入静态资源
} else {
	if (file_exists("api/" . $get_path . ".service"))// 加载 controller
	{
		require ("functions");
		require ("api/" . $get_path . ".service");
		$class_name = $get_path . "Service";
		$loadClass = new $class_name();
		$loadClass -> run();
	}
}
