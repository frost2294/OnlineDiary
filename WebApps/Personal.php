<?php
	session_start();
?>
<DOCTYPE HTML>
<html>
<head>
<title>Personal</title>
<link rel="stylesheet" type="text/css" href="contents.css">
<link rel="stylesheet" type="text/css" href="sidemenu.css">
<script src="sidemenu.js"></script>
<style>
.quote-container{
	position: relative;
	margin-top: 190px;
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
		$Note = $_POST['Note'];
		$hidden = $_POST['hidden'];
				

		$sql = "UPDATE personal_notes SET personalNote ='$Note' WHERE noteID ='$hidden'";
		$result = mysqli_query($conn,$sql);

		if($result){
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
		$hidden = $_POST['hidden'];
				

		$sql = "DELETE FROM personal_notes WHERE noteID ='$hidden'";
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
		<div class="quote-container"><p>
		<?php
		include('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$counter = 0;
		$query = "SELECT * from personal_notes WHERE Student_ID = '$studID' AND username = '$username'";
		$result = mysqli_query($conn,$query);
		$num_rows = mysqli_num_rows($result);
		echo "<span class='pin'></span>";
		echo "<div class='note'>";
		if($num_rows > 0){
		echo "<table>
		<tr>
			<th> No. </th>
			<th> Description </th>
			<th colspan='3'> </th>

		</tr>";
			if($num_rows > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<form method=POST>";
					$counter = $counter + 1;
					echo "<tr>";
					echo "<td>" . $counter . ".</td>";
					echo "<td width='50%'><input type=text name=Note value='" . $row['personalNote'] . "'></td>";
					echo "<td><input type=hidden name=hidden value='" . $row['noteID'] . "'</td>";
					echo "<td><input type=submit name=update value=update></td> ";
					echo " <td><input type=submit name=delete value=delete></td>";
					echo "</tr>";
					echo "</form>";
					echo "</div>";
				}
			echo "</table>";
			echo "</div>";
			}
		}
			?>
		</p></div>
</center>
	<h2 align="center"><a href="NewNote.php">Please click here if you want to add a note</a></h2>
</body>
<script type="text/javascript"> function randomQuote() {
	<?php
		include('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$query = "SELECT personalQuote from personal_quote WHERE Student_ID = '$studID' AND username = '$username' ORDER BY rand() LIMIT 1";
		$result = mysqli_query($conn,$query);
		$num_rows = mysqli_num_rows($result);
		
			if($num_rows > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo $row["personalQuote"];
					//echo wordwrap($row["personalNote"],40,"<br>\n",TRUE);
				}
			}	
	?>
}
</script>
</html>