<?php
include 'fun.inc.php';
include 'php/mysql_conn.php';

$row = @mysql_query ( "SELECT * FROM `info` WHERE `ID` = '" . $_SESSION ['userID'] . "' " );
if (! @mysql_fetch_array ( $row )) {
	echo "<script>
				alert('請先登入');
				window.location = 'log.weblogin.php';
		</script>";
	exit ();
}
?>
<!DOCTYPE HTML>
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
		<div class="row">
		  <div class="col-sm-4 col-md-3">
		    <div class="thumbnail" style="background-color: rgba(255, 255, 255, 0.5);">
		      <img src="images/shop-boat1.png" alt="...">
		      <div class="caption">
		        <h3>自動排水舟</h3>
		        <p>Main tube fabric : 2000 denier 1.2mm PVC</p>
		        <p><a href="#" class="btn btn-success" role="button">購買</a> <a href="#" class="btn btn-primary" role="button">查看</a></p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4 col-md-3">
		    <div class="thumbnail" style="background-color: rgba(255, 255, 255, 0.5);">
		      <img src="images/shop-boat2.png" alt="...">
		      <div class="caption">
		        <h3>向上之星</h3>
		        <p>Bottom floor fabric: 2000 denier 1.2mm PVC</p>
		        <p><a href="#" class="btn btn-success" role="button">購買</a> <a href="#" class="btn btn-primary" role="button">查看</a></p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4 col-md-3">
		    <div class="thumbnail" style="background-color: rgba(255, 255, 255, 0.5);">
		      <img src="images/shop-boat3.png" alt="...">
		      <div class="caption">
		        <h3>急流之星</h3>
		        <p>Floor type : 5'' thick I-Beam inflatable floor</p>
		        <p><a href="#" class="btn btn-success" role="button">購買</a> <a href="#" class="btn btn-primary" role="button">查看</a></p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4 col-md-3">
		    <div class="thumbnail" style="background-color: rgba(255, 255, 255, 0.5);">
		      <img src="images/shop-boat4.png" alt="...">
		      <div class="caption">
		        <h3>貴賓艇</h3>
		        <p>Floor with self-bailing system design all around life line</p>
		        <p><a href="#" class="btn btn-success" role="button">購買</a> <a href="#" class="btn btn-primary" role="button">查看</a></p>
		      </div>
		    </div>
		  </div>
		</div>
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">結帳</button>
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
					<h4 class="modal-title" id="myModalLabel">購物明細</h4>
				</div>
				<div class="modal-body">
					<p>自動排水舟 5W</p>
					<p>急流之星 5W</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
					<button type="button" class="btn btn-primary">確定購買</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>