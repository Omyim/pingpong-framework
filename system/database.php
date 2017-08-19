<?php 
	class Database {
		public $host, $usr, $pwd, $db, $charset, $prefix;
		public $handle, $sql, $query, $fetch;

		public function __construct() { return true; }

		public function setInfo($host, $username, $password, $database, $prefix, $charset) {
			$this->host = $host;
			$this->usr = $username;
			$this->pwd = $password;
			$this->db = $database;
			$this->prefix = $prefix;
			$this->charset = $charset;
		}

		public function connect() {
			$this->handle = @mysqli_connect($this->host, $this->usr, $this->pwd);
			if (!$this->handle) {
				$error['Type'] = 'Database';
				$error['File'] = 'Your Controller';
				$error['Line'] = 'In File';
				$error['Detail'] = 'ไม่สามารถเชื่อมต่อฐานข้อมูลได้';
				include 'system/error.php';
				exit(0);
			} else {
				$this->handle->set_charset($this->charset);
				$select = $this->handle->select_db($this->db);
				if (!$select) {
					$error['Type'] = 'Database';
					$error['File'] = 'Your Controller';
					$error['Line'] = 'In File';
					$error['Detail'] = 'ไม่สามารถเลือกฐานข้อมูลได้';
					include 'system/error.php';
					exit(0);
				}
			}
		}

		public function close() {
			return $this->handle->close();
		}

		public function sql($text = null) {
			$sql = htmlspecialchars($text);
			$this->sql = $sql;
		}

		public function query($sql = null) {
			if ($sql == null || $sql == "") {
				$this->query = $this->handle->query($this->sql);
				if ($this->query) {
					return true;
				} else {
					return false;
				}
			} else {
				$this->query = $this->handle->query(htmlspecialchars($sql));
				if ($this->query) {
					return true;
				} else {
					return false;
				}
			}
		}

		public function num_rows($sql = null) {
			if ($sql == null || $sql == "") {
				$this->sql = $this->sql;
			} else {
				$this->sql = htmlspecialchars($sql);
			}
			$this->query = $this->handle->query($this->sql);
			return $this->query->num_rows;
		}

		public function insert($table, $field, $value = null) {
			$field_num = count($field);
			$value_num = count($field);

			$row_insert = false;
			$row_value = false;
			$this->sql = "INSERT INTO `" . $table . "` (";
			$end = end($field);
			for ($i=0; $i < $field_num; $i++) {
				$row_insert[$i] = $field[$i];
				if ($field[$i] == $end) {
					$this->sql .= "`" . $field[$i] . "`) ";
				} else {
					$this->sql .= "`" . $field[$i] . "`, ";
				}
			}
			$this->sql .= "VALUES (";
			$end = end($value);
			for ($i=0; $i < $value_num; $i++) { 
				$row_value[$i] = $value[$i];
				if ($value[$i] == $end) {
					$this->sql .= "'" . htmlspecialchars($value[$i]) . "');";
				} else {
					$this->sql .= "'" . htmlspecialchars($value[$i]) . "', ";
				}
			}
			$this->query = $this->handle->query($this->sql);
			if ($this->query) {
				$send = true;
			} else {
				$send = false;
			}

			return $send;
		}

		public function truncate($table) {
			$this->sql = "TRUNCATE TABLE " . htmlspecialchars($table);
			$this->query = $this->handle->query($this->sql);
			if ($this->query) {
				$this->sql = "ALTER TABLE ". $table ." AUTO_INCREMENT = '1'";
				$this->query = $this->handle->query($this->sql);
				return true;
			} else {
				return false;
			}
		}

		public function delete($table, $condition_name = null, $condition_value = null) {
			if ($condition_name == null) {
				$this->sql = "DELETE FROM " . $table;
			} else {
				$this->sql = "DELETE FROM " . $table . " WHERE " . $condition_name . " = " . $condition_value;
			}
			$this->query = $this->handle->query($this->sql);
			if ($this->query) {
				$send = true;
			} else {
				$send = false;
			}
			echo $this->sql;

			return $send;
		}

		public function fetch_array($sql = null) {
			if ($sql == null) {
				$this->query = $this->handle->query($this->sql);
			} else {
				$this->query = $this->handle->query(htmlspecialchars($sql));
			}
			return $this->query->fetch_array(MYSQLI_BOTH);
		}
	}
?>