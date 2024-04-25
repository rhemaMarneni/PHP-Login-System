<?php
    include_once 'header.php';
?>

<div class="container">
  <h1>Please Login</h1>
  <div class="login-msg">
    <?php
    if (isset($_GET["error"])) {
      //emptyInputLogin()
      if($_GET["error"] == "emptyinput"){
        echo "<p>You are required to fill in all fields</p>";
      }
      //invalidUid()
      else if($_GET["error"] == "wronglogin") {
        echo "<p>Invalid login credentials</p>";
      }
    }
    else if (isset($_GET["profile"])){
      if($_GET["profile"] == "created") {
        echo "<p>Signed up successfully, enter credentials to login</p>";
      }
    }
  ?>
  </div>
  <form action="includes/login.inc.php" method="post">
    <div class="form-control">
      <input type="text" name="name" required>
      <label>Email/Username</label>
    </div>

    <div class="form-control">
      <input type="password" name="pwd" required>
      <label>Password</label>
    </div>

    <button class="btn" type="submit" name="submit">Log In</button>
    <p class="text">Don't have an account? <a href="signup.php">Register</a></p>
  </form>
  
</div>

<?php
    include_once 'footer.php';
?>