<?php 
	class Model Extends Database {
		public $database;

		public function __construct() {
			$this->database = new Database();
			return true;
		}

		public function __destruct() {}
	}
?>