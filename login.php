<?php include 'config.php';?>



<h2>Enter Username and password</h2> 
      <div class = "loginform">

        <form  method="POST" action="login.inc.php">

          <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter password" name="psw" required>

            <button name="submit" type="submit">Login</button>
        </form>

<?php include 'footer.php';?>
