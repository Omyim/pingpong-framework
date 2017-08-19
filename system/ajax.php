<?php 
	class Ajax {
		private $url;

		public function __construct() {
			global $base_url;
			$this->url = $base_url;
		}

		public function addAjax() {
			?>
			<script type="text/javascript" src="<?php echo $this->url; ?>skins/omyim/js/prototype.js"></script>
			<?php
		}
	}
?>