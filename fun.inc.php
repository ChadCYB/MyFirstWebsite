
<?php 
session_start();
function topNavBarLogin($webName){
?>
	<nav class="navbar navbar-inverse navbar-fixed-top slideDown">
		<div class="container slideDown">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="Rafting.php">泛舟網</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li <?php if($webName == 101){echo 'class=active';}?>><?php if(isset($_SESSION['userID'])){
																			echo "<a href=user.php>首頁</a></li>";
																		}else{
																			echo "<a href=Rafting.php>首頁</a></li>";
																		}?>
					<li <?php if($webName == 102){echo 'class=active';}?>><a href="apply.php">線上泛舟</a></li>
					<li <?php if($webName == 103){echo 'class=active';}?>><a href="order.php">真der要報名</a></li>
					<li <?php if($webName == 104){echo 'class=active';}?>><a href="river.php">自己泛的河自己挑</a></li>
					<li <?php if($webName == 105){echo 'class=active';}?>><a href="aboutRafting.php">關於泛舟</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li <?php if($webName == 201){echo 'class=active';}?>><?php if(isset($_SESSION['userID'])){
																			echo "<a href=logout.php>登出</a></li>";
																		}else{
																			echo "<a href=weblogin.php>登入</a></li>";
																		}?>
					<li <?php if($webName == 202){echo 'class=active';}?>><?php if(isset($_SESSION['userID'])){
																			echo "<a href=donate.php>Donate</a></li>";
																		}else{
																			echo "<a href=SignUp.php>註冊</a></li>";
																		}?>
				</ul>
			</div>
		</div>
	</nav>
<?php }
	function is_email($str){
		if( ereg("^[A-Za-z0-9\.\-]+@[A-Za-z0-9]+\.[A-Za-z0-9\.]+$", $str)){
			return 1;
		}else{
			return 0;
		}
	}
	function is_id($str){
		if(ereg("^[0-9a-zA-Z]{5,}", $str)){
			return 1;
		}else{
			return 0;
		}
	}
	function is_pw($str){
		if(ereg("^[0-9a-zA-Z]{6,}", $str)){
			return 1;
		}else{
			return 0;
		}
	} 
?>

