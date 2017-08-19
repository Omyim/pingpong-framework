<?php 
	class View {
		public $render, $param;
		public $model, $inpath;

		public function __construct() { return true; }
		public function view($render, $param = null) {
			$this->render = str_replace('->', '/', $render) . ".php";
			if (is_file('app/view/' . $this->render)) {
				if ($param != null) {
					$array = explode(',', $param);
					$number = count($array);
					for($i=0;$i<$number;$i++) {
						$use[$i] = $array[$i];
					}
					include 'app/view/' . $this->render;
				} else {
					include 'app/view/' . $this->render;
				}
			} else {
				$error['Type'] = 'No File';
				$error['File'] = 'Your Controller';
				$error['Line'] = 'In File';
				$error['Detail'] = 'ไม่สามารถโหลดไฟล์จาก view ได้';
				include 'system/error.php';
			}
		}
	}
?>