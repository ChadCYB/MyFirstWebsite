<?php
	include 'php/mysql_conn.php';
	include 'fun.inc.php';
	include 'fun.dataTable.php';

$row = @mysql_query ( "SELECT `userID`, `Money`, `Exp` FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
if (! $rsl = @mysql_fetch_array ( $row )) {
	echo "<script>
				alert('請先登入');
				window.location = 'log.weblogin.php';
		</script>";
	exit ();
}
$riveID = isset($_GET['river']) ? $_GET['river'] : -1;
// echo "<script>console.log(\"RID:".$riveID."\");</script>";

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
$userID = $rsl['userID'];
$userLV = get_Lv($rsl['Exp']);
$userMoney = $rsl['Money'];

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
  AND competition.matchDate >= NOW()
 */
if($riveID == -1){
	$rsl = @mysql_query ( "SELECT competition.matchID, river.Name, competition.difficulty, competition.price,  
		competition.maxPeople, competition.matchDate FROM competition, river WHERE river.No = competition.riverID
		AND competition.status = 0 AND competition.matchDate >= NOW()" );
}else{
	$rsl = @mysql_query ( "SELECT competition.matchID, river.Name, competition.difficulty, competition.price,  
		competition.maxPeople, competition.matchDate FROM competition, river WHERE river.No = competition.riverID
		AND competition.status = 0 AND competition.matchDate >= NOW() AND competition.riverID = ". $riveID);
}
$num = mysql_num_rows ( $rsl );

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
</head>
<body style="background-image: url('images/apply-bg.jpg'); height:100%">
		<?php topNavBarLogin(102);?>
		<div class="container" style="margin-top: 50px">
		<h1 style="font-weight: bold">線上泛舟報名</h1>
		<table id="myTable" class="table table-hover" style="font-size: 18px; font-weight: bold">
			<thead>
				<tr>
					<th>泛舟梯次</th>
					<th>泛舟河流</th>
					<th>泛舟難度</th>
					<th>報名費用</th>
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
					$count = @mysql_fetch_row ( $rsCount ); 			// <<<報名人數
					$sqlCheck = @mysql_query("SELECT * FROM game WHERE matchID='" . $rows['matchID']. "' AND userID='" . $userID. "'");
					$numCheck = @mysql_num_rows ( $sqlCheck );		// <<<有沒有報名過
					$gameMoney = $rows ['price'];
					echo '<tr>
							<th scope="row">' . $rows['matchID'] .'</th>
							<td>' . $rows ['Name'] . '</td>
							<td>LV.' . $rows ['difficulty'] . '</td>
							<td>' . $gameMoney . '萬</td>
							<td>' . $count [0] . ' / ' . $rows ['maxPeople'] . '</td>
							<td>' . $rows ['matchDate'] . '</td>';
					if ($rows ['maxPeople'] > $count [0]) {		//是否額滿
						if($numCheck != 0){											//是否報名
							echo '<td><button type="button" class="btn btn-danger" 
								disabled="disabled">已報名</td></tr>';
						}else{
							if($userLV < $rows ['difficulty']){								//等級
								echo '<td><button type="button" class="btn btn-warning" 
								disabled="disabled">等級不足</td></tr>';
							}else if($userMoney < $gameMoney){
								echo '<td><button type="button" class="btn btn-warning" 
								disabled="disabled">金額不足</td></tr>';
							}else{
								echo '<td><input type="submit" class="btn btn-success" data-toggle="modal"
								data-target="#myModal'.$rows['matchID'].'" value="前往報名"></td></tr>';	
							}
						}
					} else {
						echo '<td><button type="button" class="btn btn-danger" disabled="disabled">
								額滿截止</button></td></tr>';
					}
					if($numCheck == 0){
						echo'
						<form action="pass.apply.php" method="post">
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
							    <span class="input-group-addon">等級限制</span>
								<input class="form-control input-lg" style="font-weight:bold"
								type="text" value="'. $rows ['difficulty'] .'" readonly>
								<span class="input-group-addon">等</span>
							  </div>
							</div>
							<div class="form-group has-success">
							  <div class="input-group">
							    <span class="input-group-addon">報名費用</span>
								<input class="form-control input-lg" style="font-weight:bold"
								type="text" name=gamePrice value="'.$gameMoney.'" readonly>
								<span class="input-group-addon">萬</span>
							  </div>
							</div>
							<div class="form-group has-success">
							  <div class="input-group">
							    <span class="input-group-addon">泛舟日期</span>
								<input class="form-control input-lg" style="font-weight:bold"
								type="text" value="'. $rows ['matchDate'] .'" readonly>
							  </div>
							</div>
							<input class="form-control input-lg" style="font-weight:bold"
								type="text" value="" readonly>
						</div>
						<div class="modal-footer">
								<input type="hidden" name=hiddenID value='.$rows['matchID'].'>
								<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
								<input type="submit" class="btn btn-primary" value="確認報名">
						</div>
						</div>
						</div>
					</div></form>';
					}
				}
				?>
			</tbody>
		</table>
		<Input type="button" class="btn btn-primary btn-lg" 
			value="登出" onclick="location.href='log.logout.php'">
	</div>
	<?php 
		//INSERT INTO `game` (`userID`, `matchID`) VALUES ('10', '11')
	if (isset($_POST['hiddenID'])){
		$uID =  preg_replace("/[\'\"]+/" , '' ,$_SESSION['uID']);
		$mID =  preg_replace("/[\'\"]+/" , '' ,$_POST['hiddenID']);
		$sqlApply = "INSERT INTO `game` (`userID`, `matchID`) VALUES ('$uID', '$mID')";

		$userMoney -= $_POST['gamePrice'];	//報名費用扣款
		//UPDATE `info` SET `Money` = 50 WHERE `userID` = 1;
		$sqlMoney = "UPDATE `info` SET `Money` = ". $userMoney ." WHERE `userID` = ".$userID;
		if(@mysql_query($sqlApply)){
			if(@mysql_query($sqlMoney)){
				echo "<script>alert('報名成功');window.location = 'pass.apply.php';</script>";
			}else{
				echo "<script>alert('扣款失敗');</script>";
			}
		}else{
			echo "<script>alert('報名失敗');</script>";
		}
	}
	?>
</body>
</html>