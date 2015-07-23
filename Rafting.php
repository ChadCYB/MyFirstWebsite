<!DOCTYPE HTML>
<?php 
	include 'php/mysql_conn.php';
	include 'fun.inc.php';
	if(!empty($_SESSION['userID'])){
		echo '<meta http-equiv=REFRESH CONTENT=0;url=user.php>';
		exit();
	}
?>
<html>
<head>
	<meta charset='utf-8'>
	<title>亞洲泛舟網</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/rafting.css">
	<link rel="stylesheet" href="http://www.justinaguilar.com/animations/css/animations.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php topNavBarLogin(101);?>
	<div class="container-fluid slideDown">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>泛舟網</h1>
				<h4>當颱風來襲成為事實，<span style="font-weight: bold; color: red">泛舟</span>就是義務</h4>
				<br>
				<button type="button" class="btn btn-default btn-lg" onclick="location.href='apply.php'">
					我就是要<span style="font-weight: bold; color: red">報名</span>，不然要幹嘛!
				</button>
			</div>
		</div>	
	</div>
</body>
</html>