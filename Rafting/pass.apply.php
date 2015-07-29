<!DOCTYPE HTML>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
if (! @mysql_fetch_array ( $row )) {
	echo "<script>
				alert('請先登入');
				window.location = 'log.weblogin.php';
		</script>";
	exit ();
}
/* SELECT
	competition.matchID,
	river.Name,
	competition.difficulty,
	competition.price,
	competition.maxPeople, 
	competition.matchDate
   FROM
	competition,
	river
   WHERE
	river.No = competition.riverID
	AND competition.status = 0
 */
$rsl = mysql_query ( "SELECT competition.matchID, river.Name, competition.difficulty, competition.price,  
		competition.maxPeople, competition.matchDate FROM competition, river WHERE river.No = competition.riverID
		AND competition.status = 0" );
$num = mysql_num_rows ( $rsl );
?>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
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
					<th>活動人數</th>
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
							<th scope="row">' . $rows['matchID'] . '</th>
							<td>' . $rows ['Name'] . '</td>
							<td>LV.' . $rows ['difficulty'] . '</td>
							<td>' . $rows ['price'] . '萬</td>
							<td>' . $rows ['maxPeople'] . '</td>
							<td>' . $count [0] . '</td>
							<td>' . $rows ['matchDate'] . '</td>';
					if ($rows ['maxPeople'] > $count [0]) {
						echo '<td><input type="submit" class="btn btn-success" data-toggle="modal" 
								data-target="#myModal'.$rows['matchID'].'" value="前往報名"></td></tr>';
					} else {
						echo '<td><button type="button" class="btn btn-danger" disabled="disabled">
								額滿截止</button></td></tr>';
					}
				echo'
					<div class="modal fade" id="myModal'.$rows['matchID'].'" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<button class="btn btn-primary fa fa-safari" type="button" style="font-size: 40px">
								泛舟梯次 <span class="badge" style="font-size: 30px">'.$rows['matchID'].'</span>
							</button>
						</div>
						<div class="modal-body bg-info">
							<div class="form-group has-success">
							  <div class="input-group">
							    <span class="input-group-addon"></span>
								<input class="form-control input-lg" style="font-weight:bold"
								type="text" value="等級限制' . $rows ['difficulty'] . '等" readonly>
							  </div>
							</div>
							<div class="form-group has-success">
							  <div class="input-group">
							    <span class="input-group-addon"></span>
								<input class="form-control input-lg" style="font-weight:bold"
								type="text" value="報名費用' . $rows ['price'] . '萬" readonly>
							  </div>
							</div>
							<div class="form-group has-success">
							  <div class="input-group">
							    <span class="input-group-addon"></span>
								<input class="form-control input-lg" style="font-weight:bold"
								type="text" value="泛舟日' . $rows ['matchDate'] . '" readonly>
							  </div>
							</div>
							<input class="form-control input-lg" style="font-weight:bold"
								type="text" value="" readonly>
						</div>
						<div class="modal-footer">
							<form action="pass.apply.php" method="post">
								<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
								<input type="submit" class="btn btn-primary" value="確認報名" onclick="Register(aa)">
							</form>
						</div>
					</div>
					</div>
				</div>';
				}
				?>
			</tbody>
		</table>
		<form action="pass.apply.php" method="post">
			<Input type="button" class="btn btn-primary btn-lg" value="登出"
				onclick="location.href='log.logout.php'">
		</form>
	</div>
	<?php 
	function Register($sql) {
		echo "<script>alert('$sql')</script>";
	}
	if(isset($_POST['matID'])){
		$fade_MatchID = $_POST['matID'];
	}
	?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">梯次<?php echo $fade_MatchID; ?></h4>
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