<?php 
	class Session {
		public $handle, $sessions;
		private $value;

		public function __construct($oid = null) { 
			session_start($oid);
		}

		public function close($oid = null) {
			session_destroy($oid);
		}

		public function add($name, $value = null) {
			if (isset($_SESSION[$name])) {
				$error['Type'] = 'Session';
				$error['File'] = 'Your Controller';
				$error['Line'] = 'In File';
				$error['Detail'] = 'Session ที่ท่านจะสร้างนี้มีอยู่แล้ว';
				include 'system/error.php';
			} else {
				$_SESSION[$name] = $value;
			}

			return true;
		}

		public function del($name) {
			if (isset($_SESSION[$name])) {
				session_unset($name);
			} else {
				return false;
			}

			return true;
		}

		public function checkset($name) {
			if (isset($_SESSION[$name])) {
				return true;
			} else {
				return false;
			}
		}

		public function encode($value = null) {
			$this->value = session_encode($value);
			return true;
		}
		public function decode($value = null) {
			$this->value = session_decode($value);
			return true;
		}
	}
?>