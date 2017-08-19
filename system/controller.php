<?php
	class Controller Extends View {
		public $load, $database;
		public $session, $cookie, $file, $css, $ajax;
		public $model;

		public function __construct() {
			return true;
		}

		public function view($render, $param = null) {
			$this->load = new View();
			$this->load->view($render, $param);
		}

		public function model($name, $param = null) {
			$this->model = str_replace('->', '/', $name);
			if (is_file('app/model/' . $this->model . ".php")) {
				include 'app/model/' . $this->model . ".php";
				$model = ucfirst($this->model);
				$this->model = new $model($param);
			} else {
				$error['Type'] = 'Model';
				$error['File'] = 'Your Model';
				$error['Line'] = 'In File';
				$error['Detail'] = 'ไม่สามารถโหลดไฟล์จาก Model ได้';
				include 'system/error.php';
			}
		}

		public function addClass($name) {
			switch ($name) {
				case 'Database':
					$this->database = new Database();
					break;
				
				case 'File':
					$this->file = new File();
					break;

				case 'Cookie':
					$this->cookie = new Cookie();
					break;

				case 'CSS':
					$this->css = new CSS();
					break;

				case 'AJAX':
					$this->ajax = new Ajax();
					break;

				case 'Session':
					$this->session = new Session();
					break;
			}
		}
	}
?>