<?php
	session_start()
?>

<DOCTYPE HTML>
<html>
<head>
<title>Studies</title>
<link rel="stylesheet" type="text/css" href="contents.css">
<link rel="stylesheet" type="text/css" href="sidemenu.css">
<script src="sidemenu.js"></script>
<style>
.quote-container{
	position: relative;
	margin-top: 15%;
}
</style>

	<?php
	if (isset($_POST['updateAssg'])) {
		
		if(session_id() == ''){
				session_start();
			}
		include ('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$assgNote = $_POST['assgNote'];
		$hiddenAssg = $_POST['hiddenAssg'];
				

		$sql = "UPDATE subject_assg SET assgNote ='$assgNote' WHERE assgID ='$hiddenAssg'";
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
	else if(isset($_POST['deleteAssg'])){
		if(session_id() == ''){
			session_start();
		}
		include ('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$hiddenAssg = $_POST['hiddenAssg'];
				

		$sql = "DELETE FROM subject_assg WHERE assgID ='$hiddenAssg'";
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
	
	if (isset($_POST['updateSum'])) {
		
		if(session_id() == ''){
				session_start();
			}
		include ('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$subNote = $_POST['subNote'];
		$hiddenSum = $_POST['hiddenSum'];
				

		$sql = "UPDATE subject_sum SET subSummary ='$subNote' WHERE sumID ='$hiddenSum'";
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
	else if(isset($_POST['deleteSum'])){
		if(session_id() == ''){
			session_start();
		}
		include ('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$hiddenSum = $_POST['hiddenSum'];
				

		$sql = "DELETE FROM subject_sum WHERE sumID ='$hiddenSum'";
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
<center>
	<div class="quote-container"><h3>
		<?php
		include('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$counter = 0;
		$query = "SELECT * from subject_assg WHERE Student_ID = '$studID' AND username = '$username'";
		$result = mysqli_query($conn,$query);
		$num_rows = mysqli_num_rows($result);
		echo "<span class='pin'></span>";
		echo "<div class='note'>";
		if($num_rows > 0){
		echo "<table>
		<tr>
			<th> No. </th>
			<th> Assignment Note </th>
			<th colspan='3'> </th>
		</tr>";
				while($row = mysqli_fetch_assoc($result)){
					echo "<form method=POST>";
					$counter = $counter + 1;
					echo "<tr>";
					echo "<td>" . $counter . ".</td>";
					echo "<td width='50%'><input type=text name=assgNote value='" . $row['assgNote'] . "'></td>";
					echo "<td><input type=hidden name=hiddenAssg value='" . $row['assgID'] . "'</td>";
					echo "<td><input type=submit name=updateAssg value=update></td> ";
					echo " <td><input type=submit name=deleteAssg value=delete></td>";
					echo "</tr>";
					echo "</form>";
				}
			echo "</table>";
			echo "</div>";
			}
			?>
		</h3></div>
	<h2 align="center" class><a href="NewAssg.php">Add an assignement note</a></h2>

	<div class="quote-container yellow"><h3>
		<?php
		include('connection.php');
		$studID = $_SESSION['ID'];
		$username = $_SESSION['login'];
		$counter = 0;
		$query = "SELECT * from subject_sum WHERE Student_ID = '$studID' AND username = '$username'";
		$result = mysqli_query($conn,$query);
		$num_rows = mysqli_num_rows($result);
		echo "<div class='pin'></div>";
		echo "<div class='note'>";
		if($num_rows>0){
		echo "<table>
		<tr>
			<th> No. </th>
			<th> Subject Summary </th>
			<th colspan='3'> </th>

		</tr>";
				while($row = mysqli_fetch_assoc($result)){
					echo "<form method=POST>";
					$counter = $counter + 1;
					echo "<tr>";
					echo "<td>" . $counter . ".</td>";
					echo "<td width='50%'><input type=text name=subNote value='" . $row['subSummary'] . "'></td>";
					echo "<td><input type=hidden name=hiddenSum value='" . $row['sumID'] . "'</td>";
					echo "<td><input type=submit name=updateSum value=update></td> ";
					echo " <td><input type=submit name=deleteSum value=delete></td>";
					echo "</tr>";
					echo "</form>";
				}
			echo "</table>";
			echo "</div>";
			}
		
			?>
		</h3></div>
	<h2 align="center"><a href="NewSubSum.php">Add a subject summary</a></h2>
</center>
</body>
</html>