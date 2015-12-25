<?php
	include 'fun.inc.php';
	include 'php/mysql_conn.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
	<link rel="canonical" href="http://codepen.io/petertoth/pen/BtGkp">
		<link rel="stylesheet" type="text/css" href="css/logUI.css">
</head>
<body>
	<?php topNavBarLogin(5);?>
	<div class="login slideUp" style="margin: 13% auto 33% auto">
		<div class="heading">
			<h2>Sign Up</h2>
			<form action="log.signup.php" method="POST">
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-child"></i></span>
					<input type="text" name="name" class="form-control" placeholder="姓名" required>
				</div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" name="acc" class="form-control" placeholder="使用者ID(須至少6位數)" required>
				</div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" name="pwd1" class="form-control" placeholder="密碼(6位數之英數字元)" required>
				</div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-check-circle"></i></span>
					<input type="password" name="pwd2" class="form-control" placeholder="再次確認密碼" required>
				</div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
					<input type="email" name="mail" class="form-control" placeholder="E-mail" required>
				</div>
				<button type="submit" class="float">確認註冊</button>
				<button type="button" class="float" onclick="location.href='log.weblogin.php'">返回登入</button>
			</form>
		</div>
	</div>
	<?php
		if(isset($_POST['name']) && isset($_POST['acc']) && isset($_POST['pwd1']) && isset($_POST['pwd2']) && isset($_POST['mail'])){
			$name = preg_replace("/[\'\"]+/" , '' ,$_POST['name']);
			$id = preg_replace("/[\'\"]+/" , '' ,$_POST['acc']);
			$pw1 = preg_replace("/[\'\"]+/" , '' ,$_POST['pwd1']);
			$pw2 = preg_replace("/[\'\"]+/" , '' ,$_POST['pwd2']);
			$email = preg_replace("/[\'\"]+/" , '' ,$_POST['mail']);

			if($name == ' '){
				echo "<script>alert('姓名格式錯誤!');</script>";
				exit();
			}else if(!is_id($id)){
				echo "<script>alert('使用者ID格式不相符，須至少6位數，請重新輸入!');</script>";
				exit();
			}else if($pw1 != $pw2){
				echo "<script>alert('密碼不相符，請重新輸入!');</script>";
				exit();
			}else if(!is_pw($pw1)){
				echo "<script>alert('密碼格式不相符，須至少6位數之英數字元，請重新輸入!');</script>";
				exit();
			}else if(!is_email($email)){
				echo "<script>alert('E-mail格式不相符，請重新輸入!');</script>";
				exit();
			}else{
				$pw1 = md5($pw1);
				$rel = mysql_query("SELECT * FROM `info` WHERE `ID` = '".$id."' ");
				$numR = mysql_num_rows ($rel);
				if($numR>0){
					echo "<script>alert('此帳號ID已經註冊過了');window.location = 'log.signup.php';</script>";
					exit();
				}
				$sql2 = "INSERT INTO info (ID, Name, Mail, Password)
						VALUES ('$id','$name','$email','$pw1')";
				if(@mysql_query($sql2)){
					echo "<script>alert('註冊成功');window.location = 'log.weblogin.php';</script>";
				}else{
					echo "<script>alert('註冊失敗');</script>";
				}
			}
		}
	?>
</body>
</html>