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
				$date = $_POST['date'];
				$Descp = $_POST['Descp'];
				$studID = $_SESSION['ID'];
				$username = $_SESSION['login'];
				

				$sql = "INSERT INTO personal_event (Student_ID, username, eventDate, eventDescrp) VALUES ('$studID', '$username', '$date','$Descp')";

				$result = mysqli_query($conn,$sql);
	

				if($result)
					{

						echo "
						<script type=\"text/javascript\">
						window.alert('Successfully added event');
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