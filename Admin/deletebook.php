<?php include '../config.php'; 
include 'admin.header.php';?>


<main>
			 
    <h3>Search our Book Catalog</h3>
<hr>
You may search by title, or by author, or both<br>
<form action="deletebook.php" method="POST">
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
$query = "SELECT ISBN, Title, Author FROM Book";
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
# Here's the query using bound result parameters
                        // echo "we are now using bound result parameters <br/>";
                       # Here's the query using bound result parameters
                        // echo "we are now using bound result parameters <br/>";
                        $stmt = $db->prepare($query);
                        $stmt->bind_result($ISBN, $title, $author);
                        $stmt->execute();

                        echo '<table bgcolor="" cellpadding="6" width="100%">';
                        echo '<tr><b> <td>ISBN</td> <td>Title</td> <td>Author</td> <td>Delete</td> </b> </tr>';
                        while ($stmt->fetch()) {
                            

                            echo "<tr>";
                            echo "<td> $ISBN </td><td> $title </td><td> $author </td>";
                            echo '<td><a href="delete.php?ISBN=' . urlencode($ISBN) . '"> <input type="button" value="delete"> </a></td>';

                            echo "</tr>";
                        }
                        echo "</table>";
                        ?>





        <footer>
                <?php include("../footer.php"); ?>
        </footer>
    </body>

</html>