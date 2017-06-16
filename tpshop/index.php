<?php 
	
	//define('APP_PATH', './APP/');

	// 开启调试模式
 	define('APP_DEBUG', true);
	define('ROOT','http://web.tpshop.com');
	//设置CSS默认路径
	define('ADMIN_CSS_URL', ROOT . '/Admin/view');
	//设置IMG默认路径
	define('ADMIN_IMG_URL', ROOT . '/Admin/view');

	//设置CSS默认路径 //默认模块
	define('HOME_CSS_URL', ROOT . '/Home/view');
	//设置IMG默认路径
	define('HOME_IMG_URL', ROOT . '/Home/view');

	include "../ThinkPHP/ThinkPHP.php";

	function showBug($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
 ?>