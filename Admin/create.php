<?php include '../config.php';?>
<?php include 'admin.header.php';?>

<form method="POST">
	<H2>Add a new book</H2>
	<input type="number" placeholder="ISBN" name="isbn">
	<input type="text" placeholder="title" name="addtitle">
	<input type="submit" value="Done!" name="submit">
</form>

<?php 
	if (isset($_POST['addtitle'])){
		$title = security($_POST['addtitle']);
		//addera i databasen
		echo $title;
	}
function security($data){ //skapar en funtion som innehåller alla security funktioner.  
	$data = trim($data); //tar bort mellanslag
	$data = addslashes($data); //tar bort specialtecken
	global $connection; //global säger att detf inns kod skriven som man kan connecta till utan att behöva connecta till databaen en gång till

	$data = mysqli_real_escape_string($connection, $data); //skyddar mot SQL injection
	$data = htmlspecialchars($data);
	return $data;
}
?>




<?php include '../footer.php';?>