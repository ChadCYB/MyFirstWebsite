
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
					<li <?php if($webName == 1){echo 'class=active';}?>><a href="Rafting.php">首頁</a></li>
					<li <?php if($webName == 2){echo 'class=active';}?>><a href="apply.php">報名</a></li>
					<li <?php if($webName == 3){echo 'class=active';}?>><a href="aboutRafting.php">關於泛舟</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li <?php if($webName == 4){echo 'class=active';}?>><?php if(isset($_SESSION['userID'])){
																			echo "<a href=logout.php>登出</a></li>";
																		}else{
																			echo "<a href=weblogin.php>登入</a></li>";
																		}?>
					<li <?php if($webName == 5){echo 'class=active';}?>><?php if(isset($_SESSION['userID'])){
																			echo "<a href=Donate.php>Donate</a></li>";
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
		if(ereg("^[0-9a-zA-Z]{6,}", $str)){
			return 1;
		}else{
			return 0;
		}
	}
?>

