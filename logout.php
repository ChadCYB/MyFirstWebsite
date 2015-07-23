<?php session_start();
	// 將session清空
	unset ( $_SESSION['userID'] );
	echo '<meta http-equiv=REFRESH CONTENT=1.5;url=Rafting.php>';
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>LOGOUT...</title>
  <link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://www.justinaguilar.com/animations/css/animations.css">
  <style>
  	body{
  	  background : none;
  	}
  	.element {
	  animation: pulse 5s infinite;
	}
	
	@keyframes pulse {
	  0% {
	    background-color: #001F3F;
	  }
	  100% {
	    background-color: #FF4136;
	  }
	}
  </style>
</head>

<body class="element">
  <h4 class="h404 fadeIn" style="margin: 8%; font-size: 80px; font-weight: bold;">登出中...</h4>
  <img src="https://cdn4.iconfinder.com/data/icons/sample/512/logout-512.png" alt="LOGOUT" style="position: absolute; left: 50%; top: 50%; margin-left: -285px; margin-top: -190px;">
</body>

</html>
