<?php
	if(session_id() == ''){
		session_start();
	}
    if(!isset($_SESSION['login'])){
      header('location:index.php');
    }
    else{
	include('connection.php');
	include('registersubsum.php');
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset= "utf 8">
		<title>New Subject Summary</title>
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
		<h1><div align="center">Subject Summary</div></h1>
		<form method="POST">
			<p><textarea name="subSum" cols="50" rows="5" autofocus="ON" placeholder="Enter subject summary...."></textarea>
				</label></p>
			<p><input type="submit" name="submit" value="Submit" />			
			<input type="reset" value="Clear" /></p>
			<input type="submit" name="back" value="Go back" />
			</div>
			<?php
				if(isset($_POST['back'])){
				header('location:Studies.php');
				exit;
			}
			?>
		</form>
	</body>
</html>
