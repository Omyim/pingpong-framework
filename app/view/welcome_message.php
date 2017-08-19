<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to PINGPONG PHP Framework</title>
	<style>
		body {
			color: #333;
			font-family: sans-serif;
			background: #fff;
			padding: 0;
			margin: 0;
		}

		.container {
			display: block;
			position: relative;
			background: #fff;
			-webkit-box-shadow: 0 0 8px -1px rgba(0,0,0,0.4);
			box-shadow: 0 0 8px -1px rgba(0,0,0,0.4);
			max-width: 65%;
			margin: 35px auto;
		}

		.row {
			min-height: 1px;
		}

		.header,
		.footer {
			display: block;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-left: 18px;
			padding-right: 18px;
			border-bottom: 1px solid #ccc;
		}

		.body {
			display: block;
			padding-top: 5px;
			padding-right: 12px;
			padding-left: 12px;
			padding-bottom: 5px;
			line-height: 1.65em;
		}

		.footer {
			border-bottom: none;
			border-top: 1px solid #ccc;
		}
	</style>
</head>
<body>
	<?php 
		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$starttime = $mtime;	
	?>
	<div class="container">
		<div class="row">
			<div class="header">
				<h2>
					Welcome PINGPONG PHP Framework <small>v. 2.0</small>
				</h2>
			</div>
			<div class="body">
				<p>
					ยินดีต้อนรับทุกท่านเข้าสู่เฟรมเวิร์คพีเอชพี เฟรมเวิร์คตัวนี้ชื่อว่า <strong>ปิ๋งป่อง เฟรมเวิร์ค</strong> พัฒนาโดยคนไทย รวดเร็วใช้งานง่าย เบาทำได้หลายระบบเช่น <strong>สมาชิก, เว็บบอร์ด, บทความ และอื่นๆอีกมากมาย</strong> ทั้งนี้เราจะยกตัวอย่างการแก้ไขไฟล์ต่างๆที่มีส่วนเกี่ยวข้องกับเฟรมเวิร์คเช่น <strong>config.php และไฟล์ใน Controller, View, Model</strong> เพื่อการใช้งานอย่างถูกวิธี
				</p>
				<p>
					การแก้ไขไฟล์ <strong>config.php</strong> ควรแก้ไขที่ <strong>$base_url = "";</strong> และ <strong>$router = "";</strong> และ <strong>$controller = "";</strong>
				</p>
				<p>
					อธิบาย ? <br>
					base_url คือ URIที่อยู่ของเว็บคุณเช่น http://mywebsite.com <br>
					router คือ ที่อยู่ของหน้าหลักของ Controller หากต้องการใส่โฟลเดอรืด้วยกรุณาใส่ <strong>folder->file</strong> และไม่ต้องใส่นามสกุลไฟล์ <br>
					controller คือไฟล์ใส่ชื่อไฟล์ของ Controller หลักไม่ต้องใส่โฟลเดอร์ใส่เพียงชื่อไฟล์ ไม่ต้องใส่นามสกุลไฟล์
				</p>
			</div>
			<div class="footer">
				<?php
					$mtime = microtime();
					$mtime = explode(" ",$mtime);
					$mtime = $mtime[1] + $mtime[0];
					$endtime = $mtime;
					$totaltime = ($endtime - $starttime);
					echo "Processer Page ".$totaltime." Second";
				?>
			</div>
		</div>
	</div>
</body>
</html>