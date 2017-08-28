<?php

	$dbhost = 'localhost' ;
	$username = 'root' ;
	$password = '' ;
	$db = 'sdms';


	$conn = mysqli_connect("$dbhost" , "$username" , "$password", "$db");

	if (!$conn)
	{
		echo 'Fail to connect';
	}

	else
	{

		mysqli_select_db($conn , $db);

	}
?>