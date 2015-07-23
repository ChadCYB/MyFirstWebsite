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
	return floor ( ($ex1 / $ex2) * 100 );
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
		<?php topNavBarLogin(101);?>
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
					<h4>經驗值 (<?php echo get_exp($result['Exp']);?>/<?php echo get_lvExp($result['Exp']);?>)</h4>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="0"
									aria-valuemin="0" aria-valuemax="100"
									style="width: <?php echo get_LvPa(get_exp($result['Exp']),get_lvExp($result['Exp']));?>%;">
									<?php echo get_LvPa(get_exp($result['Exp']),get_lvExp($result['Exp']));?>%
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<button class="btn btn-success fa fa-money" type="button"
					style="font-size: 40px">
					金庫等級 <span class="badge" style="font-size: 40px"><?php echo '1';?></span>
				</button>
			</div>
			<div class="col-md-8 col-md-offset-1">
				<div class="alert alert-warning" role="alert">
					<h4>餘額 (<?php echo '50/100'; ?>)萬</h4>
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0"
									aria-valuemin="0" aria-valuemax="100"
									style="width: <?php echo '50'; ?>%;">
									<?php echo '50'; ?>%
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="alert alert-info" role="alert">
			<h3 style="text-align: center; font-weight: bold;">哥的泛舟史</h3>
			<table class="table table-hover"
				style="font-size: 18px; color: black">
				<thead>
					<tr>
						<th>泛舟梯次</th>
						<th>泛舟河流</th>
						<th>泛舟難度</th>
						<th>金額</th>
						<th>進度</th>
						<th>狀況</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
				$rnd = rand ( 1, 12 );
				for($i = 0; $i < 150; $i ++) {
					$no = $i + 1;
					$rnd1 = rand ( 0, 200 );
					$rnd2=	rand ( 0, 100 );
					$money1=	rand ( 0, 100 );
					echo '<tr>
							<th scope="row">' . $no . '</th>
							<td>LV.' . rand ( 1, 50 ) . '</td>
							<td>' . $rnd1 . '</td>
			  				<td>' . $money1 . '萬</td>
							<td><div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="0"
									aria-valuemin="0" aria-valuemax="100"
									style="width: ' . $rnd2 . '%">
									' . $rnd2 . '%
								</div>
							</div></td>';
					if (100 == $rnd2) {
						echo '<td><button type="button" class="btn btn-success">泛舟完成</button></td>	</tr>';
					} else if(0 == $rnd2) {
						echo '<td><button type="button" class="btn btn-danger" disabled="disabled">
								尚未開始...</button></td>	</tr>';
					} else {
						echo '<td><button type="button" class="btn btn-warning" disabled="disabled">
								泛舟中...</button></td>	</tr>';
					}
					
				}
				?>
			</tbody>
			</table>
		</div>
		<form action="apply.php" method="post">
			<Input type="button" class="btn btn-primary btn-lg" value="登出"
				onclick="location.href='logout.php'">
		</form>
	</div>
</body>
</html>