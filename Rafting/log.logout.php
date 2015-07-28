<?php session_start();
	unset ( $_SESSION['userID'] );	// 將session清空
	echo '<meta http-equiv=REFRESH CONTENT=1.5;url=Rafting.php>';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGOUT...</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://www.justinaguilar.com/animations/css/animations.css">
	<link rel="stylesheet" href="css/404style.css">
  <style>
  	body{
  	  background: none;
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
	h4{
		margin: 8%;
		font-size: 80px;
		font-weight: bold;
		text-align: center;
	}
  </style>
</head>

<body class="element">
  <h4 class="h404 fadeIn">登出中...</h4>
  <img src="https://cdn4.iconfinder.com/data/icons/sample/512/logout-512.png" 
  alt="LOGOUT" style="position: absolute; left: 50%; top: 50%; margin-left: -285px; margin-top: -190px;">
</body>

</html>
