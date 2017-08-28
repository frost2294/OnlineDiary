<?php
if(isset($_POST['register']))
{
		require 'connection.php';
		$name = $_POST['name'];
		$ID = $_POST['ID'];
		if(isset($_POST['faculty'])){
		$faculty = $_POST['faculty'];
		}
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$handphone = $_POST['handphone'];

		$query = "SELECT Student_ID, username FROM student_info WHERE Student_ID = '$ID' OR username = '$username'";
		$result = mysqli_query($conn,$query);
		$num_rows = mysqli_num_rows($result);
		if($num_rows > 0){
			echo "
			<script type=\"text/javascript\">
			window.alert('Oops username or ID already taken');
			</script>";
		}
		else{
		$sql = "INSERT INTO student_info (Student_ID, FullName, Faculty, username, password, email, contact_number) VALUES ('$ID','$name','$faculty','$username','$password','$email','$handphone')";

		$result2 = mysqli_query($conn,$sql);

			if($result2)
			{
				echo "
				<script type='text/javascript'>
				window.alert('Succesfully Register');
				</script>";
				header('location:index.php');
			}
			else
			{
				echo "
				<script type='text/javascript'>
				window.alert('Oops something went wrong !');
				</script>";
				
			}
		}
}

?>