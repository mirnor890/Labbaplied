<?php 
error_reporting(0);

$dbname = 'Book club';
$dbuser = 'root';
$dbpass = 'root';
$dbserver = 'localhost';

$connection = mysqli_connect('localhost', 'root', 'root', 'Book club');
	if(!$connection){
		die("Database connection failed" . mysqli_error($connection));
	}
$select_db = mysqli_select_db($connection, 'Book club');
	if(!$select_db){
		die("Database selection failed" . mysqli_error($connection));
	}

//$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$current_page = end(explode('/', $_SERVER["REQUEST_URI"]));

//$current_page = end($strings); 

?>