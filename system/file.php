<?php 
	class File {
		private $handle, $target, $content;
		public function __construct() { }

		public function create_file($name, $content = null, $html = null) {
			$this->target = str_replace('->', '/', $name);
			$this->content = $content;
			$this->handle = fopen($this->target, 'w');
			if ($html == "visible") {
				fputs($this->handle, htmlspecialchars($this->content));
			} else if ($html == null || $html == "disable") {
				fputs($this->handle, $this->content);
			}
			fclose($this->handle);
		}

		public function read_file($name, $html = null) {
			$this->target = str_replace('->', '/', $name);
			if ($html == "enable") {
				$content = file_get_contents($this->target);
				echo htmlspecialchars($content);
			} else if ($html == null || $html == "disable") {
				file_get_contents($this->target);
			}
		}

		public function write_tends($name, $content = null, $html = null) {
			$this->target = str_replace('->', '/', $name);
			$this->content = $content;
			$this->handle = fopen($this->target, 'a');
			if ($html == "enable") {
				fputs($this->handle, htmlspecialchars($this->content));
			} else if ($html == null || $html == "disable") {
				fputs($this->handle, $this->content);
			}

			fclose($this->handle);
		}
	}
?>