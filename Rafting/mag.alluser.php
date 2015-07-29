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

$rsl = mysql_query ( "SELECT * FROM `info` WHERE 1" );
$num = mysql_num_rows ( $rsl );
?>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
</head>
<body style="background-image: url('images/apply-bg.jpg')">
	<?php topNavBarLogin(201);?>
	<div style="margin: 70px 10px; background-color: rgba(255, 0, 0, 0.5);">
		<h1 style="font-weight: bold; text-align:center; color:white">會員總表</h1>
		<table class="table table-striped table-hover" style="font-size: 16px; background: white">
			<thead><tr>
				<th>uID</th>
				<th>ID</th>
				<th>Name</th>
				<th>Sex</th>
				<th>Mail</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Dept.</th>
				<th>Exp.</th>
				<th>Money</th>
				<th>Bank</th>
				<th>Permit</th>
			</tr></thead>
			<tbody>
				<?php
				for($i = 0; $i < $num ; $i ++) {
					$rows = @mysql_fetch_array ( $rsl );
					echo '<tr>
						<th scope="row">' . $rows ['userID'] . '</th>
						<td>' . $rows ['ID'] . '</td>
						<td>' . $rows ['Name'] . '</td>
						<td>' . $rows ['Gender'] . '</td>
						<td>' . $rows ['Mail'] . '</td>
						<td>' . $rows ['Phone'] . '</td>
						<td>' . $rows ['Address'] . '</td>
						<td>' . $rows ['Dept'] . '</td>
						<td>' . $rows ['Exp'] . '</td>
						<td>' . $rows ['Money'] . '</td>
						<td>' . $rows ['bankLV'] . '</td>
						<td>' . $rows ['Permission'] . '</td>
						</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>