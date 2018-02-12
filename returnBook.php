
<?php

include("config.php");

$ISBN = trim($_GET['ISBN']);
echo '<INPUT type="hidden" name="ISBN" value=' . $ISBN . '>';

$ISBN = trim($_GET['ISBN']);      // From the hidden field
$ISBN = addslashes($ISBN);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo $bookid;

    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE Book SET Reserved=0 WHERE ISBN = ?");
    $stmt->bind_param('i', $ISBN);
    $stmt->execute();
    printf("<br>Succesfully returned!");
    printf("<br><a href=browse.php>Search and Book more Books </a>");
    printf("<br><a href=books.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;

?>

    


