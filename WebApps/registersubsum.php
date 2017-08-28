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
				$subSum = $_POST['subSum'];
				$studID = $_SESSION['ID'];
				$username = $_SESSION['login'];
				

				$sql = "INSERT INTO subject_sum (Student_ID, username, subSummary) VALUES ('$studID', '$username', '$subSum')";

				$result = mysqli_query($conn,$sql);
	

				if($result)
					{

						echo "
						<script type=\"text/javascript\">
						window.alert('Successfully added subject summary');
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