<?php
	if(session_id() == ''){
		session_start();
	}
    if(!isset($_SESSION['login'])){
      header('location:index.php');
    }
    else{
	include('connection.php');
	include('addpersonalnote.php');
	}

?>


<!DOCTYPE html>
<html>
	<head>
	<title>New Personal Note</title>
		<meta charset= "utf 8">
		<link rel="stylesheet" type="text/css" href="adding.css">
		<style>
input[type="textarea"]{
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 20px;
}
</style>
	</head>
<body>
		<div class="container">
		<h1 align="center"><div>Personal note</div></h1>
		<form method="POST">
			<textarea name="Note" cols="50" rows="5" autofocus="ON" placeholder="Enter your note here..."></textarea>
			<p><input type="submit" name="submit" value="Submit" />			
			<input type="reset" value="Clear" /></p>
			<input type="submit" name="back" value="Go back" />
			
			<?php
				if(isset($_POST['back'])){
				header('location:Personal.php');
				exit;
			}
			?>
		</form>
		</div>
	</body>
</html>
