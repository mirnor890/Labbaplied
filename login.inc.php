<?php 

include 'config.php';



	if (isset($_POST['submit'])) {
		require_once('connect.php');


		// mysqli_escape_real_string Skydda mot SQL injections
		//Sha1 hashar psw
		$username = mysqli_real_escape_string($connection, $_POST['uname']); 
		$password = mysqli_real_escape_string($connection, $_POST['psw']);
		// Felhanterare
		//Kontroll om inputs är tomma
		if (empty($username) || empty($password)) {
				echo "Du måste fylla i username och pass...";
			}else{
				//Kontroll om användaren existerar
				$sql = "SELECT * FROM User WHERE username = '$username'"; // Query att skicka till databas
				//Skicka query
				$result = mysqli_query($connection, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck < 1) { //Om resultcheck är minre än 1 dvs 0, betyder det antt andvändaren inte existerar i databasen ocg då loggas man inte in och får ett felmeddelande
					echo "Fel användarnamn";
				} else {
					if($row = mysqli_fetch_assoc($result)){ // Skapar variabeln row som är en array innehållandes all information som finns i db om just den användaren som matchar användarnamnet
						

						if (sha1($password) != $row['password']) { //om password är INTE SANT (falskt) så echoar "fel lösen"
							echo "fel Lösen";
						}elseif(sha1($password) == $row['password']){ //om password är sant så skickas man till fileupload.php genom headerfunktionen
							header("Location: fileUpload.php");

						}
					}
				}

			}	
	}

	else{
		echo "Någonting gick fel...."; //om ngt går helt snett om kan inte utföra if-statementet
	}




  ?> 