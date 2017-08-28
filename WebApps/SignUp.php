<?php
include('registerstudent.php');
include('login.php');
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Diary</title>
<style type="text/css">
	html{
	background: url(background.jpg) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

body{
	margin: 0;

}
.container2{
	width: 40%;
	height: 60%;
	text-align: center;
	background-color: rgba(52, 73, 94, 0.7);
	border-radius: 4px;
	margin: auto;
	margin-top:  1%;
}

input[type="text"], input[type="password"], input[type="tel"], input[type="email"], input[type="integer"]{
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 20px;
}
input[type="radio"]{
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 20px;
	vertical-align:left;

}
.btn-reg{
	padding: 15px 25px;
	color: #fff;
	background-color: #2ECC71;
	border: none;
	border-radius: 4px;
	border-bottom: 4px solid #27AE60;
}
.btn-clear{
	padding: 15px 25px;
	color: #fff;
	background-color: #2ECC71;
	border: none;
	border-radius: 4px;
	border-bottom: 4px solid #27AE60;
}

a{
	text-decoration: none;
	color: white;
	font-family: sans-serif;
	margin-bottom: 20px;
}

a:hover{
	color: coral;
	font-weight: bold;
	margin-top: 20px;
}
</style>
</head>

<body>
	<div class="container2">
		<form method="POST">
			<h1>Register Form</h1>
			<div class="form-input">
				<input  type="text" name="name"  autofocus="ON" required="required" placeholder=" Enter full name here "/>
			</div>
			<div class="form-input">
				<input  type="integer" name="ID"  pattern="\d{10}" required="required" placeholder=" Enter ID here (1122702591) "/><br>
			</div>
			<div class="form-input">
				<input type="radio" name="faculty"  required="required" value="fci" > Faculty of Computing Informatics<br>
				<input type="radio" name="faculty"  required="required" value="foe" >Faculty of Engineering<br>
				<input type="radio" name="faculty"  required="required" value="fom" >Faculty of Management<br>
				<input type="radio" name="faculty"  required="required" value="fcm" >Faculty of Creative Multimedia
			</div>
			<div class="form-input">
				<input type="text" name="username" required="required" placeholder=" Enter username here "/>
			</div>
			<div class="form-input">
				<input type="password" name="password" required="required" placeholder=" Enter password here "/>
			</div>
			<div class="form-input">
				<input type="email" name="email" required="required" placeholder=" Enter email here "/>
			</div>
			<div class="form-input">
				<input type="tel" name="handphone" pattern="\d{3}-\d{7}" required="required" placeholder=" Enter hp num here (017-2470830)"/>
			</div>
				<input type="submit" name="register" value="Register" class="btn-reg">
				<input type="reset" value="Clear" class="btn-clear"/>
		</form><br>
			<a href="index.php">Go back</a>
	</div>
</body>
</html>
