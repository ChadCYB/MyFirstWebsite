<!DOCTYPE HTML>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
if (! @mysql_fetch_array ( $row )) {
	echo "<script>
				alert('請先登入');
				window.location = 'log.weblogin.php';
		</script>";
	exit ();
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
		<h1>商店</h1>
		<form action="pass.shop.php" method="post">
			<button type="button" class="btn btn-primary btn-lg"
				data-toggle="modal" data-target="#myModal">泛舟購買</button>
		</form>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">舟</h4>
				</div>
				<div class="modal-body">
					<p>自動排水舟 5W</p>
					<p>動力舟 5W</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>