<?php include 'config.php';?>
<?php include 'header.php';?>


<main>
		<div class="content-box">
			<h1>GALLERY</h1>
			<UL>
			<li><a href="login.php">KANPP SOM GÖR login here and then upload your pictures</a></li>
			</UL>	

		<ul id="bigblock">
				
				<li class="block">
					<div><img class="block-image" src="img/book3.png">
					<h3>The Leopard by Guiseppe di Lampedusa</h3>
					</div>
				</li>
				<li class="block">
					<div><img class="block-image" src="img/book5.png">
					<h3>To kill a mockingbird by Harper Lee</h3>
					</div>
				</li>
				<li class="block">
					<div><img class="block-image" src="img/book7.png">
					<h3>The lesser bohemians by Eimear Bride</h3>
					</div>
				</li>
				<li class="block">
					<div><img class="block-image" src="img/book6.png">
					<h3>Through the breaking by Cate Emond</h3>
					</div>
				</li>
			</ul>
		</div>


		<form method="POST" action="">
			<input type="text" name="username">
			<input type="password" name="userpass">
			<input type="submit" name="Go">
		</form>



<?php include 'footer.php';?>