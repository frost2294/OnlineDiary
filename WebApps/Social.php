<?php
	session_start();
?>
<DOCTYPE HTML>
<html>
<head>
<title>Social</title>
<script src="sidemenu.js"></script>
<link rel="stylesheet" type="text/css" href="contents.css">
<link rel="stylesheet" type="text/css" href="sidemenu.css">
<style>
.quote-container{
	position: relative;
	margin-top: 15%;
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
		$socNote = $_POST['socNote'];
		$hiddenSoc = $_POST['hiddenSoc'];
				

		$sql = "UPDATE social_event SET socNotes ='$socNote' WHERE socID ='$hiddenSoc'";
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
			window.alert('Oops something went wrong');
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
		$hiddenSoc = $_POST['hiddenSoc'];
				

		$sql = "DELETE FROM social_event WHERE socID ='$hiddenSoc'";
		$result = mysqli_query($conn,$sql);

		if($result){
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
<center>
	<div class="quote-container"><h3>
		<?php
		include('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$counter = 0;
		$query = "SELECT * from social_event WHERE Student_ID = '$studID' AND username = '$username'";
		$result = mysqli_query($conn,$query);
		$num_rows = mysqli_num_rows($result);
		echo "<span class='pin'></span>";
		echo "<div class='note'>";
		if($num_rows>0){
		echo "<table>
		<tr>
			<th> No. </th>
			<th> Social Note </th>
			<th colspan='3'> </th>

		</tr>";
				while($row = mysqli_fetch_assoc($result)){
					echo "<form method=POST>";
					$counter = $counter + 1;
					echo "<tr>";
					echo "<td>" . $counter . ".</td>";
					echo "<td width='50%'><input type=text name=socNote value='" . $row['socNotes'] . "'></td>";
					echo "<td><input type=hidden name=hiddenSoc value='" . $row['socID'] . "'</td>";
					echo "<td><input type=submit name=update value=update></td> ";
					echo " <td><input type=submit name=delete value=delete></td>";
					echo "</tr>";
					echo "</form>";
				}
			echo "</table>";
			echo "</div>";
			}
			?>
		</h3></div>
</center>
	<h2 align="center"><a href="NewSocNotes.php">Add a social note</a></h2>

</body>
</html>