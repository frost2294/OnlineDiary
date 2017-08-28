<?php
	if(session_id() == ''){
		session_start();
	}
    if(!isset($_SESSION['login'])){
      header('location:index.php');
    }
    else{
	include('connection.php');
	include('registersocial.php');
	}

?>

<!DOCTYPE html>
<html>
	<head>
	<title>Social Note</title>
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
		<h1><div align="center">Social Notes</div></h1>
		<form method="POST">
			<p><textarea name="socNote" cols="50" rows="5" placeholder="Enter social note here...."></textarea>
				</label></p>
			<p><input type="submit" name="submit" value="Submit" />			
			<input type="reset" value="Clear" /></p>
			<input type="submit" name="back" value="Go back" />
			</div>
			<?php
				if(isset($_POST['back'])){
				header('location:Social.php');
				exit;
			}
			?>
		</form>
	</body>
</html>
