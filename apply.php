<!DOCTYPE HTML>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
// print_r($row);
// print_r($_SESSION['userID']);
// !@mysql_fetch_array($row) !isset($_SESSION['userID']
if (! @mysql_fetch_array ( $row )) {
	echo "<script>
				alert('請先登入');
				window.location = 'weblogin.php';
			  </script>";
	exit ();
}
$rsl = mysql_query ( "SELECT * FROM river WHERE 1" );
$num = mysql_num_rows ( $rsl );
?>
<html>
<head>
<title>亞洲泛舟網</title>
<meta charset="UTF-8">
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet"
	href="http://www.justinaguilar.com/animations/css/animations.css">
<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('images/apply-bg.jpg')">
		<?php topNavBarLogin(102);?>
		<div class="container" style="margin-top: 50px;">
		<h1 style="font-weight: bold">線上泛舟報名</h1>
		<table class="table table-hover"
			style="font-size: 18px; font-weight: bold">
			<thead>
				<tr>
					<th>泛舟梯次</th>
					<th>泛舟河流</th>
					<th>泛舟難度</th>
					<th>泛舟人數</th>
					<th>報名人數</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$rnd = rand ( 1, 12 );
				for($i = 0; $i < $rnd; $i ++) {
					$rows = mysql_fetch_array ( $rsl );
					$no = $i + 1;
					$rnd1 = rand ( 0, 200 );
					$rnd2 = rand ( 0, $rnd1 );
					echo '<tr>
							<th scope="row">' . $no . '</th>
							<td>' . $rows [1] . '</td>
							<td>LV.' . rand ( 1, 50 ) . '</td>
							<td>' . $rnd1 . '</td>
							<td>' . $rnd2 . '</td>';
					if ($rnd1 == $rnd2) {
						echo '<td><button type="button" class="btn btn-danger" disabled="disabled"">額滿截止</button></td>	</tr>';
					} else {
						echo '<td><button type="button" class="btn btn-success">前往報名</button></td>	</tr>';
					}
				}
				?>
				<!-- 
				<tr>
					<th scope="row">1</th>
					<td>濁水溪</td>
					<td>LV 5</td>
					<td>120</td>
					<td>25</td>
					<th><button type="button" class="btn btn-success btn-lg">前往報名</button></th>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>秀姑巒溪</td>
					<td>LV 8</td>
					<td>80</td>
					<td>5</td>
					<th><button type="button" class="btn btn-success btn-lg">前往報名</button></th>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td>淡水河</td>
					<td>LV 1</td>
					<td>200</td>
					<td>200</td>
					<th><button type="button" class="btn btn-danger btn-lg" disabled="disabled"">額滿截止</button></th>
				</tr>
					 -->
			</tbody>
		</table>
		<form action="apply.php" method="post">
			<Input type="button" class="btn btn-primary btn-lg" value="登出"
				onclick="location.href='logout.php'">
		</form>
	</div>
</body>
</html>