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
}
$Permit = $result['Permission'];
?>
<html>
<head>
	<title>亞洲泛舟網</title>
	<meta charset="UTF-8">
</head>
<body style="background-image: url('images/mag-bg.jpg'); color:lightgray">
		<?php topNavBarLogin(201);?>
		<div class="container slideUp" style="margin-top: 80px;">
		<div class="page-header">
			<h1 style="text-align: center;">
				<i class="fa fa-list-alt"></i>
				<span  style="font-weight: bold"> 個人資料 </span>
			</h1>
		</div>
		<form class="form-horizontal" action="mag.userInfo.php" method="post">
			<div class="form-group form-group-lg">
				<label for="inputPassword1" class="col-sm-3 control-label">ID</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="input_uID" placeholder=<?php echo $_SESSION ['userID'];?>
					<?php if($Permit != 5){
							echo " readonly";
						}else{
							echo " value=".$_SESSION ['userID'];
						}
					?>>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<label for="inputPassword1" class="col-sm-3 control-label">Name</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="input_Name" 
					placeholder="姓名" value="<?php echo $result['Name'] ?>" required>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<label for="inputPassword1" class="col-sm-3 control-label">Gender</label>
				<div class="col-sm-7">
					<select name="gender" class="form-control">
						<option value=""><i class="fa fa-genderless"></i>請選擇性別</option>
						<option value="1"><i class="fa fa-mars"></i>男</option>
						<option value="0"><i class="fa fa-venus"></i>女</option>
						<option value="3"><i class="fa fa-mercury"></i>第三性</option>
					</select>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<label for="inputPassword1" class="col-sm-3 control-label">E-Mail</label>
				<div class="col-sm-7">
					<input type="email" class="form-control" name="input_Mail"
					 placeholder="e-mail" value="<?php echo $result['Mail'] ?>" required>
				</div>
			</div>
			<div class="form-group form-group-lg">
				<label for="inputPassword1" class="col-sm-3 control-label">Phone</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="input_Phone" 
					placeholder="電話" value="<?php echo $result['Phone'] ?>">
				</div>
			</div>
			<div class="form-group form-group-lg">
				<label for="inputPassword1" class="col-sm-3 control-label">Address</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="input_Address" 
					placeholder="住址" value="<?php echo $result['Address'] ?>">
				</div>
			</div>
			<div class="form-group form-group-lg">
				<label for="inputPassword1" class="col-sm-3 control-label">Dept.</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="input_Dept" 
					placeholder="科系" value="<?php echo $result['Dept'] ?>">
				</div>
			</div>
			<div class="form-group form-group-lg">
				<div class="col-sm-offset-3 col-sm-3">
					<button type="reset" class="btn btn-danger btn-lg btn-block"><i class="fa fa-times"></i> 清除重填</button>
				</div>
				<div class="col-sm-4">
					<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-check-circle"></i> 確認修改</button>
				</div>
			</div>
		</form>
	</div>
	<?php
	if(isset($_POST['input_Name']) && isset($_POST['input_Mail'])){
		$name = preg_replace("/[\'\"]+/" , '' ,$_POST['input_Name']);
		$mail = preg_replace("/[\'\"]+/" , '' ,$_POST['input_Mail']);
		$phone = preg_replace("/[\'\"]+/" , '' ,$_POST['input_Phone']);
		$address = preg_replace("/[\'\"]+/" , '' ,$_POST['input_Address']);
		$dept = preg_replace("/[\'\"]+/" , '' ,$_POST['input_Dept']);
		if($Permit == 5){
			$thisID = $_POST['input_uID'];
		}else{
			$thisID = $_SESSION['userID'];
		}
		//UPDATE `info` SET `Name`='XX', `Gender`='X', `Mail`='XX',
		//  `Phone`='XX', `Address`='XX', `Dept`='XX' WHERE `userID` = 'XX'
		$sql2 = ("UPDATE info SET Name='".$name."', `Gender`='0', `Mail`='".$mail."',`Phone`='".$phone."',
				`Address`='".$address."', `Dept`='".$dept."' WHERE `ID` = '". $thisID ."'");
		if(@mysql_query($sql2)){
			echo "<script>alert('更改成功');</script>";
		}else{
			echo "<script>alert('更改失敗');</script>";
		}
	}
	?>
</body>
</html>