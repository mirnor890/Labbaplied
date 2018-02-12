<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'Book club');
	if(!$connection){
		die("Database connection failed" . mysqli_error($connection));
	}
$select_db = mysqli_select_db($connection, 'Book club');
	if(!$select_db){
		die("Database selection failed" . mysqli_error($connection));
	}

?>