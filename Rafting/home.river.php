<!DOCTYPE HTML>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
$rsl = mysql_query ( "SELECT * FROM river WHERE 1" );
$num = mysql_num_rows ( $rsl );
?>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
</head>
<body style="background-image: url('images/river-bg.jpg')">
		<?php topNavBarLogin(104);?>
		<div class="container" style="margin-top: 40px;">
			<h1 class="bg-primary" style="font-weight: bold">自己泛的河自己挑</h1>
			<table class="table table-striped table-hover"
				style="background: white">
				<thead>
					<tr>
						<th>編號</th>
						<th>水系名</th>
						<th>幹流長度</th>
						<th>流域面積</th>
						<th>平均流量</th>
						<th>發源地</th>
						<th>出海地</th>
						<th>流經縣市</th>
						<th>累積人數</th>
						<th></th>
					</tr>
				</thead>
				<tbody><?php
					for($i = 0; $i < $num; $i ++) {
						$rows = mysql_fetch_row ( $rsl );
						$no = $i + 1;
						echo '<tr>
								<th scope="row">' . "#$no" . '</th>
								<td>' . $rows [1] . '</td>
								<td>' . $rows [2] . '</td>
								<td>' . $rows [3] . '</td>
								<td>' . $rows [4] . '</td>
								<td>' . $rows [5] . '</td>
								<td>' . $rows [6] . '</td>
								<td>' . $rows [7] . '</td>
								<td>' . (rand(0,600)) . '人</td>
								<td><a href="pass.apply.php" class="btn btn-success">前往報名</a></td>
							</tr>';
							/* <td>' . $rows ['Name'] . '</td>
							 * <td>' . $rows ['Length'] . '</td>
							 * <td>' . $rows ['Area'] . '</td>
							 * <td>' . $rows ['AvgFlow'] . '</td>
							 * <td>' . $rows ['Cradle'] . '</td>
							 * <td>' . $rows ['Sea'] . '</td>
							 * <td>' . $rows ['Flowing'] . '</td>
							 */
						}
				?></tbody>
			</table>
		</div>
	</body>
</html>