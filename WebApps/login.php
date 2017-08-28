<?php
if(isset($_POST['login']))
	{
    	
        session_start(); 
		$_SESSION['login'] = "false";
		include  ('connection.php');
		$username = $_POST['username'];
		$password = $_POST['password'];



		$checkdb = "SELECT * FROM student_info WHERE username= '$username' AND password= '$password'";
		$result = mysqli_query($conn,$checkdb);
		$count = mysqli_num_rows($result);


		while($row = mysqli_fetch_assoc($result))
			{
				$username = $row["username"];
				$password = $row["password"];
				$studentID = $row["Student_ID"];
			}


		if($count == 1)
		{
			session_start();
			$_SESSION['login'] = $username;
			$_SESSION['ID'] = $studentID;
			header('location:MainMenu.php');

		}
		else
		{
				
			$_SESSION['login'] = "false";
			echo "
			<script type=\"text/javascript\">
			window.alert('Incorrect Username or Password');
			</script>";
			
		}
			

	}

?>