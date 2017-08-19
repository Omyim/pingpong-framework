<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Error PHP</title>
	<style>
		::selection { background: #E20000; color: #fff; }

		::-moz-selection { background: #E20000; color: #fff; }

		body {
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}

		.container {
			display: block;
			position: relative;
			border: 1px solid #F44949;
			background: #FFB2B2;
			color: #333;
			max-width: 50%;
			margin: 35px auto;
		}

		.copyright {
			display: block;
			max-width: 50%;
			margin: 25px auto;
			color: #bbb;
		}

		.row {
			padding-top: 25px;
			padding-right: 15px;
			padding-left: 15px;
			padding-bottom: 25px;
		}

		hr.dotted,
		hr.solid {
			display: block;
			background: none;
			border: none;
			border-top: 1px dotted #770000;
		}

		hr.solid {
			border-top: 1px solid #770000;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Error PHP Framework</h1>
			<hr class="dotted">
			<strong>ประเภท : </strong> <?php echo $error['Type']; ?>
			<hr class="solid">
			<strong>ที่ไฟล์และบรรทัด : </strong> <?php echo $error['File'] . '&nbsp;บรรทัดที่&nbsp;' . $error['Line']; ?>
			<hr class="solid">
			<strong>ข้อความ : </strong> <?php echo $error['Detail']; ?>
		</div>
	</div>
	<div class="copyright">
		Copyright Error 2017 All Rights Reserved
	</div>
</body>
</html>