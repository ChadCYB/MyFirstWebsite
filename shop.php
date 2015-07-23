<!DOCTYPE HTML>
<?php
include 'php/mysql_conn.php';
include 'fun.inc.php';
?>
<html>
<head>
<title>亞洲泛舟網</title>
<meta charset="UTF-8">
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet"
	href="http://www.justinaguilar.com/animations/css/animations.css">
<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('images/apply-bg.jpg')">
		<?php topNavBarLogin(105);?>
		<div class="container" style="margin-top: 80px;">
		<h1>商店</h1>
		<form action="aboutRafting.php" method="post">
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
					<p>自動排水舟</p>
					<p>動力舟</p>
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