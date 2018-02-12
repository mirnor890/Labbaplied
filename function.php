<?php
function test_input($data) {

	$data = trim($data);

	$data = stripslashes($data);

	$data = htmlspecialchars($data);

	$conn = connect_to_db();

	$data = mysqli_real_escape_string ( $conn , $data );

	return $data;
	$conn->close();

}

function connect_to_db(){
	include_once("config.php");
	$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_error());

	if ($conn->connect_error) {

		die("Connection failed: " . $conn->connect_error);

	} 

	$sql_main = "SET NAMES 'utf8'";
	$result = $conn->query($sql_main);
	//mysqli::set_charset('utf8'); // when using mysqli

	/*$sql_second ="CHARSET 'utf8'";
	$result = $conn->query($sql_second);
	//sets utf-8 as CHARSET in mySQL§
	/* change character set to utf8 */
	if (!mysqli_set_charset($conn, "utf8")) {
	    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
	}
	
	return $conn;
}





?>