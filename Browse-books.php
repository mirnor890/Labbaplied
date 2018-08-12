<?php include '../config.php'; 
include 'admin.header.php';?>

	<main>
		
		<?php
		$conn = connect_to_db();
		if(isset($_GET['q'])){
			$search = test_input($_GET['q']);
			
			$search = "%".str_replace(" ", "%", $search)."%";
			$sql = "SELECT Book.*, GROUP_CONCAT(author.first_name) as authors FROM `Book`, author, Book_Author WHERE Book.isbn = Book_Author.book AND Book_Author.author = author.id AND (`title` LIKE ? OR author.first_name LIKE ?) GROUP BY Book.isbn";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("ss", $search, $search);
			$stmt->execute();
			$result = $stmt->get_result();
		}else{
			$sql = "SELECT Book.*, GROUP_CONCAT(author.first_name) as authors FROM `Book`, author, Book_Author WHERE Book.isbn = Book_Author.book AND Book_Author.author = author.id GROUP BY Book.isbn";
			$result = $conn->query($sql);
		}
		//var_dump($sql);
		//Get users Book to remove reserv button
		if(isset($_SESSION['user_id'])){
			$user = $_SESSION['user_id'];
			$sql2= "SELECT loand.* FROM loand WHERE loand.user = ? AND in_date IS NULL ";
			$stmt2 = $conn->prepare($sql2);
			$stmt2->bind_param("s", $user);
			$stmt2->execute();
			$result2 = $stmt2->get_result();

			//$result2 = $conn->query($sql2);
			$usersBook = [];
			if ($result2->num_rows > 0) {
			    // output data of each row
			    while($row2 = $result2->fetch_assoc()) {
			    	$usersBook[] = $row2['book'];
			    }
			}
		}


		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
				<article class="book">
					<img class="book-cover" src="<?php echo $row['image'] ?>">
					<div class="aboute">
						<h2><a href="book.php?book=<?php echo $row['isbn'];?>"><?php echo $row['title'] ?></a></h2>
						<p><?php echo $row['authors'] ?></p>
						<p><?php echo $row['ingress'] ?></p>
					</div>
					<?php 
					if(isset($_SESSION['user_id'])){
						if(!in_array($row['isbn'], $usersBook)){
							?>
								<button class="reserve" value="<?php echo($row['isbn']) ?>">Reserve</button>
							<?php
						}
					} ?>
				</article>

		    	<?php
		    }
		} else {
			if (isset($_GET['q'])) {
				echo("No Book match \" ".test_input($_GET['q']) ."\"");
			}else{
		    	echo "Sorry no Book in the libary";
			}
		}
		$conn->close();
		?>
		
		<form action="" method="GET">
			<input type="text" name="q" placeholder="Search title or author">
			<input type="submit" name="Search" value="Search">
		</form>
	</main>
	<script type="text/javascript" src="js/reserv-book.js"></script>



<?php include("../footer.php"); ?>