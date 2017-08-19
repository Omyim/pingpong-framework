<?php 
	class Cookie {
		public $name, $value;

		public function __construct() {
			ob_start();
		}

		public function close() {
			ob_end_flush();
		}

		public function add($name, $value, $time) {
			if (isset($_COOKIE[$name])) {
				$error['Type'] = 'Cookie';
				$error['File'] = 'Your Controller';
				$error['Line'] = 'In File';
				$error['Detail'] = 'Cookie ที่คุณจะสร้างนั้นมีอยู่แล้ว';
				include 'system/error.php';
			} else {
				setcookie($name, $value, $time);
			}
		}

		public function del($name) {
			if (isset($_COOKIE[$name])) {
				unset($name);
			} else {
				return false;
			}
		}

		public function checkset($name) {
			if (isset($_COOKIE[$name])) {
				return true;
			} else {
				return false;
			}
		}
	}
?>