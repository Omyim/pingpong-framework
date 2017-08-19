<?php 
	class CSS {
		private $url;

		public function __construct() {
			global $base_url;
			$this->url = $base_url;
		}

		public function addCSS($name = null) {
			switch ($name) {
				case 'MaGo':
					?>
						<link rel="stylesheet" href="<?php echo $this->url; ?>skins/omyim/css/mago.min.css">
					<?php
					break;
				
				case 'Slimer':
					?>	
						<link rel="stylesheet" href="<?php echo $this->url; ?>skins/omyim/css/slimer.css">
					<?php
					break;
			}
		}
	}
?>