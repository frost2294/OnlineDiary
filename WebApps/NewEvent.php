<?php
	if(session_id() == ''){
		session_start();
	}
    if(!isset($_SESSION['login'])){
      header('location:index.php');
    }
    else{
	include('connection.php');
	include('registerevent.php');
	}

?>


<!DOCTYPE html>
<html>
	<head>
	<title>Add New Event</title>
		<meta charset= "utf 8">
		<link rel="stylesheet" type="text/css" href="adding.css">
		<style>
input[type="textarea"], input[type="date"]{
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
		<form method="POST">
		<div class="container">
		<h1><div align="center">Add Event</div></h1>
			<p><input type="date" name="date" />
				</label></p>
			<p><textarea name="Descp" cols="40" rows="4" placeholder="Enter event description...."></textarea>
				</label></p>
			<p><input type="submit" name="submit" value="Submit" />			
			<input type="reset" value="Clear" /></p>
			<input type="submit" name="back" value="Go back" />
			</div>			
			<?php
				if(isset($_POST['back'])){
				header('location:MainMenu.php');
				exit;
			}
			?>
		</form>
	</body>
</html>
