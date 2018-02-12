<!DOCTYPE html>
<html>
	<head> 
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
		<title>The bookclub</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>

<body>
	<header>
		<div class="header">
			<img id="logo" src="img/Book_club.png" >
		</div>

		<nav>
			<ul>
				<li><a 
				class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" 
				href="index.php"
				>HOME</a></li>
				<li><a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL ?>"  href="about.php">ABOUT US</a></li>
				<li><a class="<?php echo ($current_page == 'browse.php') ? 'active' : NULL ?>"   href="browse.php">BROWSE BOOKS</a></li>
				<li><a class="<?php echo ($current_page == 'books.php') ? 'active' : NULL ?>"   href="books.php">MY BOOKS</a></li>
				<li><a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>"   href="contact.php">CONTACT</a></li>
				<li><a class="<?php echo ($current_page == 'gallery2.php') ? 'active' : NULL ?>"   href="gallery2.php">GALLERY</a></li>



			</ul>
		</nav>
	</header>