<!DOCTYPE HTML>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
if (! @mysql_fetch_array ( $row )) {
	echo "<script>
				alert('請先登入');
				window.location = 'weblogin.php';
		</script>";
	exit ();
}
/* SELECT
	competition.matchID,
	river.Name,
	competition.difficulty,
	competition.price,
	competition.maxPeople
   FROM
	competition,
	river,
	game
   WHERE
	competition.matchID = game.matchID
	AND river.No = competition.riverID
 */
$rsl = mysql_query ( "SELECT competition.matchID, river.Name, competition.difficulty, competition.price,  
		competition.maxPeople FROM competition, river, game WHERE competition.matchID = game.matchID 
		AND river.No = competition.riverID AND competition.status = 0" );
$num = mysql_num_rows ( $rsl );
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
<script	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('images/apply-bg.jpg'); height:100%">
		<?php topNavBarLogin(102);?>
		<div class="container" style="margin-top: 50px">
		<h1 style="font-weight: bold">線上泛舟報名</h1>
		<table class="table table-hover" style="font-size: 18px; font-weight: bold">
			<thead>
				<tr>
					<th>泛舟梯次</th>
					<th>泛舟河流</th>
					<th>泛舟難度</th>
					<th>報名費用</th>
					<th>泛舟人數</th>
					<th>報名人數</th>
					<th>泛舟日期</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				for($i = 0; $i < $num ; $i ++) {
					$rows = @mysql_fetch_array ( $rsl );
					$rsCount = @mysql_query ( "SELECT COUNT(*) FROM `game` WHERE game.matchID = '" . $rows ['matchID'] . "' " );
					$count = @mysql_fetch_row ( $rsCount ); // <<<報名人數
					echo '<tr>
							<th scope="row">' . $rows ['matchID'] . '</th>
							<td>' . $rows ['Name'] . '</td>
							<td>LV.' . $rows ['difficulty'] . '</td>
							<td>' . $rows ['price'] . '萬</td>
							<td>' . $rows ['maxPeople'] . '</td>
							<td>' . $count [0] . '</td>';
					if ($rows ['maxPeople'] > $count [0]) {
						echo '<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"
								onclick="catchClick(' . $rows [1] . ')">前往報名</button></td></tr>';
					} else {
						echo '<td><button type="button" class="btn btn-danger" disabled="disabled"">額滿截止</button></td></tr>';
					}
				}
				?>
			</tbody>
		</table>
		<form action="apply.php" method="post">
			<Input type="button" class="btn btn-primary btn-lg" value="登出"
				onclick="location.href='logout.php'">
		</form>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">梯次</h4>
				</div>
				<div class="modal-body">
					<p>自動排水舟</p>
					<p>動力舟</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>