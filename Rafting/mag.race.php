<!DOCTYPE HTML>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
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

?>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
</head>
<body style="background-image: url('images/apply-bg.jpg')">
		<?php topNavBarLogin(105);?>
		<div class="container" style="margin-top: 80px;">
		<h1>賽事管理</h1>
		<form action="mag.shop.php" method="post">
			<button type="button" class="btn btn-primary btn-lg"
				data-toggle="modal" data-target="#myModal">新增</button>
		</form>
	</div>
</body>
</html>