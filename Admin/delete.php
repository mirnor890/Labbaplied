<?php include '../config.php';?>
<?php include 'admin.header.php'; ?>



<?php
if (isset($_GET['submit'])) {
    // We know the borrower so go ahead and check the book out
    # Get data from form
    $bookid = trim($_GET['ISBN']);      // From the hidden field
    $bookid = addslashes($bookid);

    # Open the database using the "librarian" account
    @ $db = new mysqli('localhost', 'root', 'root', 'Book club');

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=deletebook.php>Return to delete-page, you craycray </a>");
        exit();
    }

    // Prepare an update statement and execute it
    
        $stmt = $db->prepare("DELETE FROM Book WHERE ISBN = ?");
        $stmt->bind_param('i', $bookid);
        $response = $stmt->execute();
        printf("<br>Book deleted!");
        printf("<br><a href=deletebook.php>Return to delete-page, you craycray </a>");
    
    
    exit;
}

// We don't have a borrower id yet so present a form to get one,
// then post back using a hidden field to pass through the bookid
// which came from the hand-crafted URL query string on the book
// search page
?>

<h3>Delete book</h3>
<hr>
<form action="delete.php" method="GET">
    Are you sure you want to delete book?
    <?php
    $bookid = trim($_GET['ISBN']);
    echo '<INPUT type="hidden" name="ISBN" value=' . $bookid . '>';
    ?>
    <INPUT type="submit" name="submit" value="Continue">
</form>





<?php include '../footer.php';?>