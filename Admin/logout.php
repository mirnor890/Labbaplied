<?php



if (isset($_POST['submit'])) {

	session_start(); //skapar den igen bara för att vi ska kunna komma in i sessionen igen
	session_unset(); //tömmer array
	session_destroy(); //tar bort den från "minnet"/systemet
	header("Location: ../index.php"); 
}

?>