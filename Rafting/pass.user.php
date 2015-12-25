<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';

$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
if (! $result = @mysql_fetch_array ( $row )) {
	echo "<script> alert('請先登入'); window.location = 'log.weblogin.php'; </script>";
	exit ();
} else {
	/*
	 * SELECT
	 *  game.ID, game.matchID, river.Name,
	 *  competition.difficulty, competition.price,
	 *  competition.matchDate, game.status
	 * FROM
	 *  game, river, competition ,info
	 * WHERE
	 *  game.matchID = competition.matchID AND competition.riverID = river.No
	 *  AND game.userID = info.userID AND info.ID = 103001
	 */
	$rowGame = @mysql_query ( "SELECT game.ID, game.matchID, river.Name, competition.difficulty, competition.price, competition.matchDate, game.status 
			FROM game, river, competition ,info WHERE game.matchID = competition.matchID AND competition.riverID = river.No 
			AND game.userID = info.userID AND info.ID = '" . $_SESSION ['userID'] . "' " );
	$numGame = mysql_num_rows ( $rowGame );
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
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
		// --------------------------------------------------
		function get_LvPa($ex1, $ex2) {
			return floor ( ($ex1 / $ex2) * 100 );
		}
		function get_LvMoney($LV) {
			return (100 + 10 * ($LV - 1));
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
				<button class="btn btn-success fa fa-money" type="button" style="font-size: 40px">
					金庫等級 <span class="badge" style="font-size: 40px"><?php echo $result['bankLV'];?></span>
				</button>
			</div>
			<div class="col-md-8 col-md-offset-1">
				<div class="alert alert-warning" role="alert">
					<h4>餘額 (<?php echo $result['Money'].'/'.get_LvMoney($result['bankLV']); ?>)萬</h4>
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0"
							aria-valuemin="0" aria-valuemax="100"
							style="width: <?php echo get_LvPa($result['Money'],get_LvMoney($result['bankLV'])); ?>%;">
							<?php echo get_LvPa($result['Money'],get_LvMoney($result['bankLV'])); ?>%
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="alert alert-info" role="alert">
			<h3 style="text-align: center; font-weight: bold;">哥的泛舟史</h3>
			<table class="table table-hover" style="font-size: 18px; color: black">
				<thead>
					<tr>
						<th>泛舟梯次</th>
						<th>泛舟河流</th>
						<th>泛舟難度</th>
						<th>泛舟日期</th>
						<th>金額</th>
						<th>進度</th>
						<th>狀況</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
<?php
				$today = date('Y-m-j');

				for($i = 0; $i < $numGame; $i ++) {
					$rows = mysql_fetch_array ( $rowGame );
					$gameDay = $rows ['matchDate'];		//泛舟日
					$gameStat = $rows ['status'];			//玩家比賽狀態

					if($today == $gameDay){
						$calTime = date("H")*60+date("i");
						$perCal = floor(($calTime*100)/(24*60));	
					}else if($today > $gameDay){
						$perCal = 100;
					}else{
						$perCal = 0;
					}
					
					echo '<tr>
							<th scope="row">' . $rows ['matchID'] . '</th>
							<td>' . $rows ['Name'] . '</td>
							<td>LV.' . $rows ['difficulty'] . '</td>
							<td>' . $gameDay .'</td>
							<td>' . $rows ['price'] . '萬</td>
							<td><div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="0"
									aria-valuemin="0" aria-valuemax="100"
									style="width: ' . $perCal . '%">
									' . $perCal . '%
								</div>
							</div></td>';
					if ($gameStat == 1) {
						echo '<td><button type="button" class="btn btn-success">
									泛舟完成</button></td>	</tr>';
					}else{
						 if ($today == $gameDay) {
							echo '<td><button type="button" class="btn btn-warning">
									泛舟中...</button></td>	</tr>';
						} else if ($today < $gameDay){
							echo '<td><button type="button" class="btn btn-danger">
									尚未開始...</button></td>	</tr>';
						}else{
							$reward = 'getReward.php?gameID='. $rows['ID'];
							echo '<td><button type="button" class="btn btn-primary" 
									onclick="location.href=\''.$reward.'\'">
									領取獎勵</button></td></tr>';
						}
					}
				}
?>
			</tbody>
			</table>
		</div>
		<form action="apply.php" method="post">
			<Input type="button" class="btn btn-primary btn-lg" value="登出"
				onclick="location.href='log.logout.php'">
		</form>
	</div>
</body>
</html>