<?php
if(session_id() == ''){
	session_start();
}
?>

<DOCTYPE HTML>
<html>
<head>
<title>View Quotes</title>
<link rel="stylesheet" type="text/css" href="contents.css">
<link rel="stylesheet" type="text/css" href="sidemenu.css">
<script src="sidemenu.js"></script>
<style>
.quote-container{
	position: relative;
	margin-top: 9%;
}
</style>

	<?php
	if (isset($_POST['update'])) {
		
		if(session_id() == ''){
				session_start();
			}
		include ('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$quote = $_POST['quote'];
		$hidden = $_POST['hidden'];
				

		$sql = "UPDATE personal_quote SET personalQuote ='$quote' , eventDate ='$date' WHERE quoteID ='$hidden'";
		$result = mysqli_query($conn,$sql);

		if($result)
			{
				echo "
				<script type=\"text/javascript\">
				window.alert('Successfully edited');
				</script>";
			}
		else
			{
				echo "
				<script type=\"text/javascript\">
				window.alert('Oops something went wrong);
				</script>";
			}
	}
	else if(isset($_POST['delete'])){
			if(session_id() == ''){
				session_start();
		}
		include ('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$hidden = $_POST['hidden'];
				

		$sql = "DELETE FROM personal_quote WHERE quoteID ='$hidden'";
		$result = mysqli_query($conn,$sql);
		if($result)
			{
				echo "
				<script type=\"text/javascript\">
				window.alert('Successfully deleted');
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
</head>

<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href='MainMenu.php'>Home</a>
  <a href='Personal.php'>Personal</a>
  <a href='Studies.php'>Studies</a>
  <a href='Social.php'>Social</a>
  <a href='logout.php'>Log Out</a>
</div>
<span style="font-size:30px;cursor:pointer;position:absolute;top:80px;" onclick="openNav()">&#9776; Menu</span>
<br>
	<div class="quote-container yellow"><p align="center">
		<?php
		include('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$counter = 0;
		$query = "SELECT * from personal_quote WHERE Student_ID = '$studID' AND username = '$username'";
		$result = mysqli_query($conn,$query);
		$num_rows = mysqli_num_rows($result);
		echo "<span class='pin'></span>";
		echo "<div class='note'>";
		if($num_rows > 0){
		echo "<table>
		<tr>
			<th> No. </th>
			<th align='center'> Quotes </th>
			<th colspan='3'> </th>
		</tr>";
			while($row = mysqli_fetch_assoc($result)){
					echo "<form method=POST>";
					$counter = $counter + 1;
					echo "<tr>";
					echo "<td>" . $counter . ".</td>";
					echo "<td><input type=text size='40' name=event value='" . $row['personalQuote'] . "'></td>";
					echo "<td><input type=hidden name=hidden value='" . $row['quoteID'] . "'></td>";
					echo "<td><input type=submit name=update value=update></td> ";
					echo " <td><input type=submit name=delete value=delete></td>";
					echo "</tr>";
					echo "</form>";
				}
			echo "</table>";
			echo "</div>";
			}
			?>
		</p></div>
		<h2 align="center"><a href="NewQuote.php">Please click here if you want to add a note</a></h2>
</body>
</html>