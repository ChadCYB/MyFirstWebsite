<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
include 'fun.dataTable.php';

$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
if (! $result = @mysql_fetch_array ( $row )) {
	echo "<script>
			alert('請先登入'); window.location = 'log.weblogin.php';
		</script>";
	exit ();
}else{
	$Permit = $result['Permission'];
	if( $Permit != 5){
		echo "<script>
			alert('權限不符'); history.go(-1);
		</script>";
		exit ();
	}
}

$rslRiv = @mysql_query ( "SELECT No,Name FROM river WHERE 1" );
$num = mysql_num_rows ( $rslRiv );
$rslMatch = @mysql_query ( "SELECT * FROM `competition` WHERE 1" );
$numMatchAll = mysql_num_rows ( $rslMatch );
$rslMatch = @mysql_query ( "SELECT * FROM `competition` WHERE matchDate < now()" );
$numMatch = mysql_num_rows ( $rslMatch );

$rslAll = mysql_query ( "SELECT competition.matchID, river.Name, competition.difficulty, competition.price,	
	competition.maxPeople, competition.status, competition.matchDate FROM competition, river WHERE river.No = competition.riverID");
$numAll = mysql_num_rows ( $rslAll );
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
</head>
<body style="background-image: url('images/apply-bg.jpg')">
	<?php topNavBarLogin(201);?>
	<div class="container" style="margin-top: 40px;">
	<div class="page-header" style="background-color: rgba(0, 0, 0, 0.2); padding: 10px 10px;">
		<h1 style="text-align: center;">
			<i class="fa fa-server"></i>
			<span  style="font-weight: bold"> 賽事管理 </span>
		</h1>
		<br>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">總賽事</span>
		  <input type="text" class="form-control" placeholder="Total Race" 
		  aria-describedby="basic-addon1" value="<?php echo $numMatchAll;?>">
		  <span class="input-group-addon" id="basic-addon1">已完成賽事</span>
		  <input type="text" class="form-control" placeholder="Complete Race" 
		  aria-describedby="basic-addon1" value="<?php echo $numMatch;?>">
		</div>
		<br>
		<form action="mag.race.php" method="post">
			<table class="table table-striped table-hover" style="background: white">
				<thead>	<tr>
					<th>河流</th>
					<th>難度</th>
					<th>費用</th>
					<th>最大人數</th>
					<th>活動日期</th>
					<th></th>
				</tr> </thead>
				<tbody> <tr>
					<th scope="row"><select name="riverID" class="form-control">
						<option value="">River</option>
						<?php for($i = 0; $i < $num; $i ++) {
							$rowRiv = mysql_fetch_row ( $rslRiv );
							echo "<option value=". $rowRiv[0] .">".$rowRiv[0].".".$rowRiv[1]."</option>";
						}?>
					</select></th>
					<td><input type="number" class="form-control" placeholder="Difficulty" name="diff" min="1" required></td>
					<td><input type="number" class="form-control" placeholder="Price" name="price" min="0" required></td>
					<td><input type="number" class="form-control" placeholder="Max people" name="maxP" min="1" required></td>
					<td><input type="number" class="form-control" placeholder="After N day" name="afterDate" min="0" required></td>
					<td><input type="submit" class="btn btn-success" name="sure" value="新增"></td>
				</tr> </tbody>
			</table>
		</form>
	</div>
<!-- 	<form class="navbar-form navbar-left ">
	  <div class="form-group">
	    <input type="text" class="form-control" placeholder="Search">
	  </div>
	  <button type="submit" class="btn btn-default">Search</button>
	</form>
	 -->
	<?php 
	if(isset($_POST['sure'])){
		$riverID = preg_replace("/[\'\"]+/" , '' ,$_POST['riverID']);
		$diff = preg_replace("/[\'\"]+/" , '' ,$_POST['diff']);
		$price = preg_replace("/[\'\"]+/" , '' ,$_POST['price']);
		$maxP = preg_replace("/[\'\"]+/" , '' ,$_POST['maxP']);
		$aDay =  preg_replace("/[\'\"]+/" , '' ,$_POST['afterDate']);
		// INSERT INTO `competition` ( `riverID`, `difficulty`, `price`, `maxPeople`, `matchDate` ) 
		// VALUES ( '8', '6', '5', '20', ADDDATE( CURRENT_DATE(), INTERVAL 4 DAY ) )
		$sqlAddRiver = "INSERT INTO `competition` (`riverID`, `difficulty`, `price`, `maxPeople`, `matchDate`)
		VALUES ('$riverID','$diff','$price','$maxP',ADDDATE( CURRENT_DATE(),INTERVAL '$aDay' DAY ))";
		if(@mysql_query($sqlAddRiver)){
			echo "<script>alert('新增成功');window.location = 'mag.race.php';</script>";
		}else{
			echo "<script>alert('新增失敗');</script>";
		}
	}
	?>
	<table id="myTable" class="table table-striped table-hover" style="font-size: 14px; background-color:white;">
		<thead>
			<tr>
				<th>MatchID</th>
				<th>River</th>
				<th>Diff.</th>
				<th>Price</th>
				<th>MaxP</th>
				<th>Cur.P</th>
				<th>Date</th>
				<th>Status</th>
				<!-- <th></th> -->
			</tr>
		</thead>
		<tbody>
			<?php
			for($i = 0; $i < $numAll ; $i ++) {
				$rows = @mysql_fetch_array ( $rslAll );
				$rsCount = @mysql_query ( "SELECT COUNT(*) FROM `game` WHERE game.matchID = '" . $rows ['matchID'] . "' " );
				$count = @mysql_fetch_row ( $rsCount ); // <<<報名人數
				echo '<tr>
					<th scope="row">' . $rows ['matchID'] . '</th>
					<td>' . $rows ['Name'] . '</td>
					<td>LV.' . $rows ['difficulty'] . '</td>
					<td>' . $rows ['price'] . '萬</td>
					<td>' . $rows ['maxPeople'] . '</td>
					<td>' . $count [0] . '</td>
					<td>' . $rows ['matchDate'] . '</td>
					<td>' . $rows ['status'] . '</td>
					
				</tr>';
				//<td><button type="button" class="btn btn-success">修改</button></td>
			}
			?>
		</tbody>
	</table>
	</div>
</body>
</html>