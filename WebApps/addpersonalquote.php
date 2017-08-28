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
				$quote = $_POST['Quote'];
				$studID = $_SESSION['ID'];
				$username = $_SESSION['login'];
				

				$sql = "INSERT INTO personal_quote (Student_ID, username, personalQuote) VALUES ('$studID', '$username', '$quote')";

				$result = mysqli_query($conn,$sql);
	

				if($result)
					{

						echo "
						<script type=\"text/javascript\">
						window.alert('Succesfully added quote');
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