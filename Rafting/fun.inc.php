<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.justinaguilar.com/animations/css/animations.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
</html>
<?php
session_start ();
function topNavBarLogin($webName) {
$PermitRow = @mysql_query ( "SELECT `Permission` FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
$PerResult = @mysql_fetch_array($PermitRow);
$PermitLV = $PerResult['Permission'];
?>
<nav class="navbar navbar-inverse navbar-fixed-top slideDown">
	<div class="container slideDown">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="Rafting.php">泛舟網</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?php if($webName == 101){echo 'class=active';}?>><?php
						if (isset ( $_SESSION['userID'] )) {
							echo '<a href=pass.user.php><i class="fa fa-user-secret"> 泛舟師資料</i></a></li>';
						} else {
							echo '<a href=Rafting.php><i class="fa fa-home"> 首頁</i></a></li>';
						}
					?>
				<li <?php if($webName == 102){echo 'class=active';}?>><a
					href="pass.apply.php"><i class="fa fa-ship"> 線上泛舟</i></a></li>
				<li <?php if($webName == 103){echo 'class=active';}?>><a
					href="home.order.php"><i class="fa fa-bookmark"> 真der要報名</i></a></li>
				<li <?php if($webName == 104){echo 'class=active';}?>><a
					href="home.river.php"><i class="fa fa-anchor"><?php
					if (isset ( $_SESSION ['userID'] )) {
						echo '河流總表';
					} else {
						echo '自己泛的河自己挑';
					}?>
					</i></a></li>
				<li <?php if($webName == 105){echo 'class=active';}?>><?php
					if (isset ( $_SESSION ['userID'] )) {
						echo '<a href="pass.shop.php"><i class="fa fa-shopping-cart"> 商店</i></a></li>';
					} else {
						echo '<a href="home.aboutRafting.php">關於泛舟</a></li>';
					}
 				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li <?php if($webName == 201){echo 'class=active';}?>><?php
						if (isset ( $_SESSION ['userID'] )) {
							echo '
							<li class="dropdown">
								<a href="#" class="dropdown-toggle"
								  data-toggle="dropdown" role="button" aria-haspopup="true"
								  aria-expanded="false"> <i class="fa fa-user"></i>
								  <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="mag.userInfo.php"><i class="fa fa-user"></i> 個人資料</a></li>
									<li><a href="mag.changePW.php"><i class="fa fa-expeditedssl"></i> 密碼更改</a></li>
									<li role="separator" class="divider"></li>
									<li><a href=home.donate.php><i class="fa fa-credit-card"> Donate</i></a></li>';
							if($PermitLV == 5){
								echo '<li><a href="mag.alluser.php"><i class="fa fa-users"> 會員管理</i></a></li>
									  <li><a href="mag.race.php"><i class="fa fa-server"> 賽事管理</i></a></li>
									  <li><a href="mag.shop.php"><i class="fa fa-shirtsinbulk"> 商店管理</i></a></li> </ul></li>';
							} else {
								echo'</ul></li>';
							}
						} else {
							echo "<a href=log.weblogin.php>登入</a></li>";
						}
					?>
				<li <?php if($webName == 202){echo 'class=active';}?>>
				<?php
					if (isset ( $_SESSION ['userID'] )) {
						echo '<a href=log.logout.php><i class="fa fa-sign-out"> 登出</i></a></li>';
					} else {
						echo '<a href=log.signup.php>註冊</i></a></li>';
					}
				?>
			</ul>
		</div>
	</div>
</nav>
<?php
}
	function is_email($str) {
		if (ereg ( "^[A-Za-z0-9\.\-]+@[A-Za-z0-9]+\.[A-Za-z0-9\.]+$", $str )) {
			return 1;
		} else {
			return 0;
		}
	}
	function is_id($str) {
		if (ereg ( "^[0-9a-zA-Z]{5,}", $str )) {
			return 1;
		} else {
			return 0;
		}
	}
	function is_pw($str) {
		if (ereg ( "^[0-9a-zA-Z]{6,}", $str )) {
			return 1;
		} else {
				return 0;
			}
		} 
?>

