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
				$socNote = $_POST['socNote'];
				$studID = $_SESSION['ID'];
				$username = $_SESSION['login'];
				

				$sql = "INSERT INTO social_event (Student_ID, username, socNotes) VALUES ('$studID', '$username', '$socNote')";

				$result = mysqli_query($conn,$sql);
	

				if($result)
					{

						echo "
						<script type=\"text/javascript\">
						window.alert('Successfully added social notes');
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