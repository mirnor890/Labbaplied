<?php include 'config.php';?>
<?php include 'header.php';?>

	<main>
		<p>Name: <input type="text" name="name">
		E-mail: <input type="text" name="email">
		Website: <input type="text" name="website">
		Comment: <textarea name="comment" rows="5" cols="40"></textarea></p>
		<p>Gender:
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male</p>
		<input type="submit" value="Send">
	</main>

<?php include 'footer.php';?>