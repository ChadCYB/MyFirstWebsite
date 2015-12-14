<?php
	include 'fun.inc.php';
	include 'php/mysql_conn.php';
	
	$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
	if (! $result = @mysql_fetch_array ( $row )) {
		echo "<script>
				alert('請先登入'); window.location = 'log.weblogin.php';
			</script>";
		exit ();
	}
	$Permit = $result['Permission'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>亞洲泛舟網</title>
<meta charset="UTF-8">
</head>
<body style="background-image: url('images/mag-bg.jpg'); color:lightgray">
	<?php topNavBarLogin(201);?>
	<div class="container slideUp" style="margin-top: 80px;">
		<div class="page-header">
			<h1 style="text-align: center;">
				<i class="fa fa-asterisk"></i>
				<span  style="font-weight: bold">密碼更改</span>
				<i class="fa fa-asterisk"></i>
			</h1>
		</div>
		<form class="form-horizontal" action="mag.changePW.php" method="post">
			<div class="form-group form-group-lg">
				<label for="inputPassword1" class="col-sm-3 control-label">Current Password</label>
				<div class="col-sm-7">
					<input type="password" class="form-control" name="PW_current" placeholder="目前密碼" required>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<label for="inputPassword2" class="col-sm-3 control-label">New Password</label>
				<div class="col-sm-7">
					<input type="password" class="form-control" name="PW_new1" placeholder="新密碼" required>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<label for="inputPassword3" class="col-sm-3 control-label">Re-type Password</label>
				<div class="col-sm-7">
					<input type="password" class="form-control" name="PW_new2" placeholder="再次確認新密碼" required>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<div class="col-sm-offset-3 col-sm-3">
					<button type="reset" class="btn btn-danger btn-lg btn-block"><i class="fa fa-times"></i> 清除重填</button>
				</div>
				<div class="col-sm-4">
					<input type="submit" class="btn btn-primary btn-lg btn-block" value='確認修改'></button>
				</div>
			</div>
		</form>
	</div>
	<?php
	if(isset($_POST['PW_current']) && isset($_POST['PW_new1']) && isset($_POST['PW_new2'])){
		$pw0 = preg_replace("/[\'\"]+/" , '' ,$_POST['PW_current']);
		$pw1 = preg_replace("/[\'\"]+/" , '' ,$_POST['PW_new1']);
		$pw2 = preg_replace("/[\'\"]+/" , '' ,$_POST['PW_new2']);
		$pw0 = md5($pw0);
		if($pw0 != $result['Password']){
			echo "<script>alert('密碼錯誤，請重新輸入!');</script>";
			exit();
		}else if($pw1 != $pw2){
			echo "<script>alert('密碼不相符，請重新輸入!');</script>";
			exit();
		}else if(!is_pw($pw1)){
			echo "<script>alert('密碼格式不相符，須至少6位數之英數字元，請重新輸入!');</script>";
			exit();
		}else{
			$pw1 = md5($pw1);
			//UPDATE `cyb_DB`.`info` SET `Password` = MD5('a103015') WHERE `info`.`ID` = 103001
			$sql2 = "UPDATE `info` SET `Password` = '" .$pw1 . "'WHERE `userID` = '" .$_SESSION ['uID']. "'";
			if(@mysql_query($sql2)){
				echo "<script>alert('更改成功');</script>";
			}else{
				echo "<script>alert('更改失敗');</script>";
			}
		}
	}
	?>
</body>
</html>