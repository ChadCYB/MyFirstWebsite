<?php
	include 'fun.inc.php';
	include 'php/mysql_conn.php';
	if (isset($_SESSION ['userID'])) {
		echo "<script>
				window.location = 'pass.user.php';
		</script>";
		exit ();
	}
	if(isset($_POST['acc']) && isset($_POST['pwd'])){
		$id = preg_replace("/[\'\"]+/" , '' ,$_POST['acc']);
		$pw = preg_replace("/[\'\"]+/" , '' ,$_POST['pwd']);
		$pw = md5($_POST['pwd']);
		$sql = "SELECT * FROM `info` WHERE `ID` = '".$id."' ";
		$result = mysql_query($sql);
		$row = @mysql_fetch_array($result);
		if($id == $row['ID'] && $pw == $row['Password']){
			$_SESSION['userID'] = $id;
			$_SESSION['uID'] = $row['userID'];
			echo "<script>
					alert('歡迎.".$row['Name']."');
					window.location = 'Rafting.php';
				</script>";
			exit();
		}else{
			echo "<script>alert('登入失敗');</script>";
			//history.go(-1);
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/logUI.css">
</head>
<body>
	<?php topNavBarLogin(201);?>
	<div class="login slideDown" style="margin: 13% auto 90% auto">
		<div class="heading">
			<h2>Login</h2>
			<form action="log.weblogin.php" method="POST">
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-user"></i></span> <input
						type="text" name="acc" class="form-control" placeholder="使用者ID" required>
				</div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span> <input
						type="password" name="pwd" class="form-control" placeholder="密碼" required>
				</div>
				<button type="submit" class="float">登入</button>
				<button type="button" class="float" value="Sign up" onclick="location.href='log.signup.php'">註冊</button>
			</form>
		</div>
	</div>
	
</body>
</html>