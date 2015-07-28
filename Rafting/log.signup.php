<!DOCTYPE HTML>
<?php 
	include 'php/mysql_conn.php';
	include 'fun.inc.php';
?>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
	<link rel="canonical" href="http://codepen.io/petertoth/pen/BtGkp">
	<style class="cp-pen-styles">
	@import	url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700);
	@import	url(https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css);
	@import	url(https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css);
	
	* {
		margin: 0;
		padding: 0;
	}
	
	html {
		background:
			url(images/login-bg.jpg)
			no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	
	body {
		background: transparent;
	}
	
	body, input, button {
		font-family: 'Source Sans Pro', sans-serif;
	}
	
	.login {
		padding: 15px;
		width: 400px;
		min-height: 400px;
		margin: 2% auto 0 auto;
	}
	
	.login .heading {
		text-align: center;
		margin-top: 1%;
	}
	
	.login .heading h2 {
		font-size: 3em;
		font-weight: 300;
		color: rgba(255, 255, 255, 0.7);
		display: inline-block;
		padding-bottom: 5px;
		text-shadow: 1px 1px 3px #23203b;
	}
	
	.login form .input-group {
		border-bottom: 1px solid rgba(255, 255, 255, 0.1);
		border-top: 1px solid rgba(255, 255, 255, 0.1);
	}
	
	.login form .input-group:last-of-type {
		border-top: none;
	}
	
	.login form .input-group span {
		background: transparent;
		min-width: 53px;
		border: none;
	}
	
	.login form .input-group span i {
		font-size: 1.5em;
		color: rgba(255, 255, 255, 0.2);
	}
	
	.login form input.form-control {
		display: block;
		width: auto;
		height: auto;
		border: none;
		outline: none;
		box-shadow: none;
		background: none;
		border-radius: 0px;
		padding: 10px;
		font-size: 1.6em;
		width: 100%;
		background: transparent;
		color: #c2b8b1;
	}
	
	.login form input.form-control:focus {
		border: none;
	}
	
	.login form button {
		margin-top: 20px;
		background: #27AE60;
		border: none;
		font-size: 1.6em;
		font-weight: 300;
		padding: 5px 0;
		width: 100%;
		border-radius: 3px;
		color: #b3eecc;
		border-bottom: 4px solid #1e8449;
	}
	
	.login form button:hover {
		background: #2fb166;
		-webkit-animation: hop 1s;
		animation: hop 1s;
	}
	
	.float {
		display: inline-block;
		-webkit-transition-duration: 0.3s;
		transition-duration: 0.3s;
		-webkit-transition-property: transform;
		transition-property: transform;
		-webkit-transform: translateZ(0);
		transform: translateZ(0);
		box-shadow: 0 0 1px transparent;
	}
	
	.float:hover, .float:focus, .float:active {
		-webkit-transform: translateY(-3px);
		transform: translateY(-3px);
	}
	
	/* Large Devices, Wide Screens */
	@media only screen and (max-width: 1200px) {
		.login {
			width: 600px;
			font-size: 2em;
		}
	}
	
	@media only screen and (max-width: 1100px) {
		.login {
			margin-top: 2%;
			width: 600px;
			font-size: 1.7em;
		}
	}
	/* Medium Devices, Desktops */
	@media only screen and (max-width: 992px) {
		.login {
			margin-top: 1%;
			width: 550px;
			font-size: 1.7em;
			min-height: 0;
		}
	}
	/* Small Devices, Tablets */
	@media only screen and (max-width: 768px) {
		.login {
			margin-top: 0;
			width: 500px;
			font-size: 1.3em;
			min-height: 0;
		}
	}
	/* Extra Small Devices, Phones */
	@media only screen and (max-width: 480px) {
		.login {
			margin-top: 0;
			width: 400px;
			font-size: 1em;
			min-height: 0;
		}
		.login h2 {
			margin-top: 0;
		}
	}
	/* Custom, iPhone Retina */
	@media only screen and (max-width: 320px) {
		.login {
			margin-top: 0;
			width: 200px;
			font-size: 0.7em;
			min-height: 0;
		}
	}
	</style>
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
					<input type="text" name="acc" class="form-control" placeholder="使用者ID" required>
				</div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" name="pwd1" class="form-control" placeholder="密碼" required>
				</div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-check-circle"></i></span>
					<input type="password" name="pwd2" class="form-control" placeholder="再次確認密碼" required>
				</div>
				<div class="input-group input-group-lg">
					<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
					<input type="text" name="mail" class="form-control" placeholder="E-mail" required>
				</div>
				<button type="submit" class="float">確認註冊</button>
				<button type="button" class="float" onclick="location.href='weblogin.php'">返回登入</button>
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
//	 		$name = $_POST['name'];
//	 		$id = $_POST['acc'];
//	 		$pw1 = $_POST['pwd1'];
//	 		$pw2 = $_POST['pwd2'];
//	 		$email = $_POST['mail'];
// 			print_r($_POST);
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