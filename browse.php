<?php include 'config.php';?>
<?php include 'header.php';?>


	<main>
			 
    <h3>Search our Book Catalog</h3>
<hr>
You may search by title, or by author, or both<br>
<form action="browse.php" method="POST">
    <table bgcolor="#bdc0ff" cellpadding="6">
        <tbody>
            <tr>
                <td>Title:</td>
                <td><INPUT type="text" name="searchtitle"></td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><INPUT type="text" name="searchauthor"></td>
            </tr>
            <tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Submit"></td>
            </tr>
        </tbody>
    </table>
</form>

<h3>Book List</h3>
<hr>
<?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}


//  if (!$searchtitle && !$searchauthor) {
//    echo "You must specify either a title or an author";
//    exit();
//  }

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

$searchtitle = mysqli_real_escape_string($db, $searchtitle);
$searchauthor = mysqli_real_escape_string($db, $searchauthor);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

#%-tecken för och innan ett sökord gör att allt före och efter legitimeras i sökningen, tex om man bara skulle skriva "harry" så får man även med "harry potter" fast man inte skriver hela

#Det här är SQL-kod som säger vad som ska uträttas på webbsidan
$query = " SELECT ISBN, Title, Author, Reserved FROM Book";
if ($searchtitle && !$searchauthor) { // När man söker efter bara Titeln
    $query = $query . " where Title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // När man söker efter bara Författaren
    $query = $query . " where Author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Om man söker efter både författare och titel
    $query = $query . " where Title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Här är PHP-kod som connectar till databasen
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query); //Denn förbereder queryn där man söker efter författare eller titel eller båda
    $stmt->bind_result($ISBN, $Title, $Author, $Reserved);
    //Den här länkar allt från SELECT på rad 64 till databasen
    $stmt->execute(); //Den här är den som "bekräftar att allt är klart och funkar"

    echo '<table bgcolor="#dddddd" cellpadding="6">';
    echo '<tr> <td>ISBN</td> <b><td>Title</td> <td>Author</td> <td>Reserved?</td> <td>Reserve</td> </b> </tr>';
    while ($stmt->fetch()) {
        if($Reserved == 0)
          $Reserved = 'NO';
        else $Reserved = 'YES'; //Rad 99-101 talar om att det ska så yes eller no när en bok är utlånad 
        echo "<tr>";
        echo "<td> $ISBN </td><td> $Title </td><td> $Author </td> <td> $Reserved </td>";
        echo '<td><a href="reserveBook.php?ISBN=' . urlencode($ISBN) . '"> Reserved </a></td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>





<?php include 'footer.php';?>