<?php
	defined('BASEPATH') or exit('No Permission to open');
	
	class Welcome Extends Controller {
		public function __construct() {  }

		public function index() {
			$this->view('welcome_message');
		}
	}
?>