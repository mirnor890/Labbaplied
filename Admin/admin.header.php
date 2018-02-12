<!DOCTYPE html>
<html>
	<head> 
		<title>The bookclub</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../main.css">
	</head>

<body>
	<header>
		<div class="header">
			<img id="logo" src="../img/Book_club.png" >
		</div>

		<nav>
			<ul>
				<li><a 
				class="<?php echo ($current_page == 'login.php' || $current_page == '') ? 'active' : NULL ?>" 
				href="login.php"
				>Admin panel</a></li>
				<li><a class="<?php echo ($current_page == 'upload.php') ? 'active' : NULL ?>"  href="upload.php">Upload</a></li>
				<li><a class="<?php echo ($current_page == 'create.php') ? 'active' : NULL ?>"  href="create.php">Create</a></li>
				<li><a class="<?php echo ($current_page == 'delete.php') ? 'active' : NULL ?>"   href="delete.php">Delete</a></li>
				<li><form  method="POST" action="logout.php"><button name="submit" type="submit">logout</button>
        		</form></li>
			</ul>
		</nav>
	</header>

<?php if (!isset($_SESSION['username'])): ?>
	<h1>Du e inte inloggad mannen</h1><?php die(); //dödar sidan om man inte är inloggad?>  
<?php endif ?>