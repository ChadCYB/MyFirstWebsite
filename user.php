<!DOCTYPE HTML>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
if (! $result = @mysql_fetch_array ( $row )) {
	echo "<script>
				alert('請先登入');
				window.location = 'weblogin.php';
			  </script>";
	exit ();
}
?>
<html>
<head>
<title>亞洲泛舟網</title>
<meta charset="UTF-8">
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://www.justinaguilar.com/animations/css/animations.css">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet"
	href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php
function get_exp($exp) {
	$lv = 1;
	$lvExp = 100;
	while ( $exp >= $lvExp ) {
		$lv ++;
		$exp -= $lvExp;
		$lvExp = floor ( $lvExp * 1.2 );
	}
	return $exp;
}
function get_LvExp($exp) {
	$lv = 1;
	$lvExp = 100;
	while ( $exp >= $lvExp ) {
		$lv ++;
		$exp -= $lvExp;
		$lvExp = floor ( $lvExp * 1.2 );
	}
	return $lvExp;
}
function get_LvPa($ex1, $ex2) {
	return floor(($ex1 / $ex2) * 100);
}
function get_Lv($exp) {
	$lv = 1;
	$lvExp = 100;
	while ( $exp >= $lvExp ) {
		$lv ++;
		$exp -= $lvExp;
		$lvExp = floor ( $lvExp * 1.2 );
	}
	return $lv;
}
?>
</head>
<body style="background-image: url('images/apply-bg.jpg')">
		<?php topNavBarLogin(1);?>
		<div class="container" style="margin-top: 50px;">
		<div class="page-header">
			<h1>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<?php echo $result['Name'];?>
				</h1>
		</div>
		<div class="row">
			<div class="col-md-3">
				<button class="btn btn-primary fa fa-tachometer" type="button"
					style="font-size: 40px">
					泛舟等級 <span class="badge" style="font-size: 40px"><?php echo get_Lv($result['Exp']);?></span>
				</button>
			</div>
			<div class="col-md-8 col-md-offset-1">
				<div class="alert alert-success" role="alert">
					<h4>經驗值(<?php echo get_exp($result['Exp']);?>/<?php echo get_lvExp($result['Exp']);?>)</h4>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="0"
									aria-valuemin="0" aria-valuemax="100"
									style="min-width: 1em; width: <?php echo get_LvPa(get_exp($result['Exp']),get_lvExp($result['Exp']));?>%;">
									<?php echo get_LvPa(get_exp($result['Exp']),get_lvExp($result['Exp']));?>%
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="alert alert-info" role="alert">
			<h4>國賠金額</h4>
			<div class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar"
					aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
					style="width: 40%">
					<span class="sr-only">40% Complete (success)</span>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-info" role="progressbar"
					aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
					style="width: 20%">
					<span class="sr-only">20% Complete</span>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-warning" role="progressbar"
					aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
					style="width: 60%">
					<span class="sr-only">60% Complete (warning)</span>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-danger" role="progressbar"
					aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
					style="width: 80%">
					<span class="sr-only">80% Complete (danger)</span>
				</div>
			</div>
			<form action="apply.php" method="post">
				<Input type="button" value="登出" onclick="location.href='logout.php'">
			</form>
		</div>
	</div>
</body>
</html>