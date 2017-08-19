<?php
define('BASEPATH', 'SET!');

require 'config.php';
	if (!defined('DEBUG')) {
		define('DEBUG', 0);
		ini_set('display_errors', 1);
  		ini_set('display_startup_errors', 1);
  		error_reporting(-1);
		/* Setting Root */
		$root = dirname(dirname(__FILE__));
	} else {
		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
		/* Setting Root */
		$root = dirname(__FILE__);
	}
	define('ROOT', str_replace('\\', '/', $root));

	/*	GET FILE	*/
	require ROOT . '/system/autoload.php';
	require ROOT . '/system/database.php';
	require ROOT . '/system/view.php';
	require ROOT . '/system/controller.php';
	require ROOT . '/system/model.php';

	if (isset($_SERVER["PATH_INFO"])) {
		$array = explode('/', $_SERVER["PATH_INFO"]);
		if (isset($array[2])) {
			$index = str_replace('->', '/', $router);
			if (is_file(ROOT . '/app/controller/' . $index . ".php")) {
				include ROOT . '/app/controller/' . $index . ".php";
				$first = ucfirst($array[1]);
				$run = new $first();
				$run->$array[2]();
			} else {
				$error['Type'] = 'No File';
				$error['File'] = 'Your Controller';
				$error['Line'] = 'In File';
				$error['Detail'] = 'ไม่สามารถโหลดไฟล์จาก view ได้';
				include 'system/error.php';
			}
		} else {
			$index = str_replace('->', '/', $router);
			if (is_file(ROOT . '/app/controller/' . $index . ".php")) {
				include ROOT . '/app/controller/' . $index . ".php";
				$first = ucfirst($controller);
				$run = new $first();
				$run->$array[1]();
			} else {
				$error['Type'] = 'No file';
				$error['File'] = 'config.php';
				$error['Line'] = 10;
				$error['Detail'] = 'ไม่พบไฟล์ที่ท่านได้ตั้งค่าไว้';
				include ROOT . '/system/error.php';
			}
		}
	} else {
		$index = str_replace('->', '/', $router);
		if (is_file(ROOT . '/app/controller/' . $index . ".php")) {
			include ROOT . '/app/controller/' . $index . ".php";
			$first = ucfirst($controller);
			$run = new $first();
			$run->index();
		} else {
			$error['Type'] = 'No file';
			$error['File'] = 'config.php';
			$error['Line'] = 10;
			$error['Detail'] = 'ไม่พบไฟล์ที่ท่านได้ตั้งค่าไว้';
			include ROOT . '/system/error.php';
		}
	}

	function base_url($uri = null) {
		global $base_url;
		echo $base_url . $uri;
	}

?>