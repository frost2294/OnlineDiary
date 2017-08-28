<?php
 if(session_id() == ''){
 session_start();
 } 
 
if(isset($_POST['submit']))
{
		include('connection.php');
			if(session_id() == ''){
				session_start();
			}
				$Note = $_POST['Note'];
				$studID = $_SESSION['ID'];
				$username = $_SESSION['login'];
				

				$sql = "INSERT INTO personal_notes (Student_ID, username, personalNote) VALUES ('$studID', '$username', '$Note')";

				$result = mysqli_query($conn,$sql);
	

				if($result)
					{

						echo "
						<script type=\"text/javascript\">
						window.alert('Succesfully added note');
						</script>";	

					}
				else
					{
						echo "
						<script type=\"text/javascript\">
						window.alert('Oops something went wrong');
						</script>";
					}
					
}	
?>