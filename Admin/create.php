<?php include '../config.php'; 
include 'admin.header.php';?>



<?php
if (isset($_POST['newbooktitle'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newbooktitle = trim($_POST['newbooktitle']);
    $newbookauthor = trim($_POST['newbookauthor']);
    $newISBN = trim($_POST['newISBN']);


    //Denna kollar om både title och Author är angett annars ger den ut ett meddelande som säger att man måste det
    if (!$newbooktitle || !$newbookauthor || !$newISBN ) {
        printf("You must fill in all the fields to add a book");
        printf("<br><a href=create.php>Return to create-page to try again!</a>");
        exit();
    }

    //tar bort om man lägger till slash eller mellanrum innan osv
    $newbooktitle = addslashes($newbooktitle);
    $newbookauthor = addslashes($newbookauthor);
    $newISBN = addslashes($newISBN);

    # Open the database using the "librarian" account
@ $db = new mysqli('localhost', 'root', 'root', 'Book club');

	//för att kolla att de finns connection till databasen
    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Talar om vilka saker som ska läggas in i databasen och vad som ska göras när man adderat allt. 
    $stmt = $db->prepare("INSERT INTO Book(ISBN, Title, Author ) values (?, ?, ?)"); //vilka väern man vill adera och till vilka "tables" man vill addera dem
    $stmt->bind_param('ssi', $newISBN, $newbooktitle, $newbookauthor);
    $stmt->execute();
    printf("<br>Book Added!");
    printf("<br><a href=login.php>Return to admin-panel hiyaaaah!</a>");
    exit;
}

// Not a postback, so present the book entry form
?>




<H2>Add a new book</H2>
<p>You must enter all information to add a book</p>
<form action="create.php" method="POST">
	<table bgcolor="#bdc0ff" cellpadding="5">
		<tbody>
			<tr>
				<td>ISBN</td>
				<td><input type="text" name="newISBN"></td>
			</tr>

			<tr>
				<td>Book</td>
				<td><input type="text" name="newbooktitle"></td>
			</tr>

			<tr>
				<td>Author</td>
				<td><input type="text" name="newbookauthor"></td>
			</tr>

			<tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Add Book"></td>
            </tr>
		</tbody>
	</table>
</form>


<a href="login.php">Back to home</a>


<?php include '../footer.php';?>