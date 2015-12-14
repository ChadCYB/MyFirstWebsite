<?php 
	include 'php/mysql_conn.php';

	// if(empty($_SESSION['userID'])){
	// 	echo '<meta http-equiv=REFRESH CONTENT=0;url=pass.user.php>';
	// 	exit();
	// }

	$id = $_GET['gameID'];
	$sql = @mysql_query('SELECT `status` FROM `game` WHERE `ID`='. $id);
	$rs = mysql_fetch_array ( $sql );
	if($rs['status'] == 1){
		echo "<script> alert('已領取獎勵!!');window.location = 'pass.user.php'</script>";
		exit();
	}
	$sql = 'UPDATE `game` SET `status`=1 WHERE `ID`='. $id;
	// echo $sql.'<br>';
	$out = "未知錯誤";
	if(@mysql_query( $sql )){
		/*SELECT 
				competition.matchID, 
				competition.price, 
				competition.difficulty, 
				info.Exp, 
				info.Money 
			FROM 
				game, 
				competition, 
				info 
			WHERE 
				game.matchID = competition.matchID 
				AND info.userID = game.userID 
				AND game.ID = 2
		*/	
		$sql1 = mysql_query(
		"SELECT `competition`.`matchID`, `competition`.`price`, `competition`.`difficulty`,
					`info`.`Exp`, `info`.`Money`, `info`.`userID`
		 FROM `game`, `competition`, `info`
		 WHERE `game`.`matchID` = `competition`.`matchID` 
				AND `info`.`userID` = `game`.`userID` 
				AND `game`.`ID` =".$id );
		$rows = mysql_fetch_array ( $sql1 );
		$newMoney = $rows ['Money'] + $rows['price'] + rand(0, $rows['difficulty']*1.5);
		$newExp = $rows['Exp'] + rand(1, $rows['difficulty']*2+10);
		// echo 'Money:'.$money.'->'.$newMoney.'<br>';
		// echo 'Exp:'.$rows['Exp'].'->'.$newExp.'<br>';
		// echo 'ID:'.$id.'<br>';

		/*UPDATE 
				`info` 
			SET 
				`Exp` = 10, 
				`Money` = 20, 
			WHERE 
				`userID` = 1
		*/
		$sql2 = "UPDATE `info` SET `Exp` = ".$newExp.", `Money` = ".$newMoney." WHERE `userID` = '".$rows['userID']."'";
		// echo $sql2.'<br>';
		if(@mysql_query( $sql2 )){
			$rewardMoney = $newMoney-$rows['Money'];
			$rewardExp = $newExp-$rows['Exp'];
			$out = "領取獎勵成功! 獎金:".$rewardMoney."萬，經驗值:".$rewardExp."Exp";
		}else{
			$out = "領取獎勵失敗";
		}

	}else{
		$out = "領取獎勵失敗";
	}
	// echo $out;
	echo "<script> alert('".$out ."');window.location = 'pass.user.php'</script>";
?>
