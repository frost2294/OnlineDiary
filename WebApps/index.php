<?php
include('registerstudent.php');
include('login.php');
if(isset($_POST['register'])){
	echo "
	<script type=\"text/javascript\">
    window.alert('Succesfully Registered');
	</script>";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="login.css">
<title>Student Diary</title>
<style type="text/css">
.container{
	width: 500px;
	height: 400px;
	text-align: center;
	background-color: rgba(52, 73, 94, 0.7);
	border-radius: 4px;
	margin: auto;
	margin-top: 150px;
}

.container img{
	width: 120px;
	height: 120px;
	margin-top: -60px;
	margin-bottom: 30px;

}

input[type="text"], input[type="password"]{
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 20px;
}

form-input{
	position: absolute;
	font-size: 30px;
	color: #985986;
	padding-top: 5px;
	font-size: 35px;
}

.btn-login{
	padding: 15px 25px;
	color: #fff;
	background-color: #2ECC71;
	border: none;
	border-radius: 4px;
	border-bottom: 4px solid #27AE60;
}




</style>
</head>

<body>
	<div class="container">
		<img src="ninjaicon.png" />
		<form method="POST">
			<div class="form-input">
				<input type="text" name="username" placeholder="Username" autofocus="ON">
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Password">
			</div>
				<input type="submit" name="login" value="Login" class="btn-login">
		</form><br>
			<a href="SignUp.php">Sign up for an account now !</a>
	</div>
</body>
</html>
