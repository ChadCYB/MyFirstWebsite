<!DOCTYPE HTML>
<?php
	include 'php/mysql_conn.php';
	include 'fun.inc.php';
	$row = @mysql_query("SELECT * FROM `info` WHERE `ID` = '".$_SESSION['userID']."' ");
// 	print_r($row);
// 	print_r($_SESSION['userID']);
// 	!@mysql_fetch_array($row) !isset($_SESSION['userID']
	if(!@mysql_fetch_array($row)){
		echo "<script>
				alert('請先登入');
				window.location = 'weblogin.php';
			  </script>";
		exit();
	}
?>
<html>
	<head>
		<title>亞洲泛舟網</title>
		<meta charset="UTF-8">
		<meta name="robots" content="noindex">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://www.justinaguilar.com/animations/css/animations.css">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body style="background-image: url('images/apply-bg.jpg')">
		<?php topNavBarLogin(2);?>
		<div class="container"  style="margin-top: 50px;">
			<h1>報名頁</h1>
			<form action="apply.php" method="post">
				<Input type = "button" value="登出" onclick="location.href='logout.php'">		
			</form>
		</div>
	</body>
</html>