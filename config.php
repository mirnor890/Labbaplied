<?php 
session_start();

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
$gbb = explode('/', $_SERVER["REQUEST_URI"]);
$current_page = end($gbb);

function security($data){ //skapar en funtion som innehåller alla security funktioner.  
	$data = trim($data); //tar bort mellanslag
	$data = addslashes($data); //tar bort specialtecken
	global $connection; //global säger att detf inns kod skriven som man kan connecta till utan att behöva connecta till databaen en gång till

	$data = mysqli_real_escape_string($connection, $data); //skyddar mot SQL injection
	$data = htmlspecialchars($data);
	$data = htmlentities($data); 
	return $data;
}


?>