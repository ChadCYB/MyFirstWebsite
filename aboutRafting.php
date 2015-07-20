<!DOCTYPE HTML>
<?php 
	include 'php/mysql_conn.php';
	include 'fun.inc.php';
?>
<html>
	<head>
		<title>亞洲泛舟網</title>
		<meta charset="UTF-8">
		<meta name="robots" content="noindex">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body style="background-image: url('images/apply-bg.jpg')">
		<?php topNavBarLogin(3);?>
		<div class="container"  style="margin-top: 5%;">
			<h1>報名頁</h1>
			<form action="apply.php" method="post">
				<Input type = "button" name="logout" value="登出">		
			</form>
		</div>
		
	</body>
</html>