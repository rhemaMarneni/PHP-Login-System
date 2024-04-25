<?php
    include_once 'header.php';
?>

<div class="container">
  <h1>Please Sign Up</h1>
  <div class="login-msg">
    <?php 
  if (isset($_GET["error"])) {
    //emptyInputSignup()
    if($_GET["error"] == "emptyinput"){
      echo "<p>You are required to fill in all fields</p>";
    }
    //invalidUid()
    else if($_GET["error"] == "invaliduid") {
      echo "<p>Username is not valid</p>";
    }
    //invalidEmail()
    else if($_GET["error"] == "invalidemail"){
      echo "<p>Enter a valid email</p>";
    }
    //pwdMatch()
    else if($_GET["error"] == "passwordsdontmatch"){
      echo "<p>Passwords don't match</p>";
    }
    //uidExists()
    else if ($_GET["error"] == "usernametaken"){
      echo "<p>Username already taken</p>";
    }
    //query statement failed
    else if ($_GET["error"] == "stmtfailed"){
      echo "<p>Something went wrong, please try again</p>";
    }
    //succesfully created
    // else if ($_GET["error"] == "none") {
    //   echo "<p>Sign up sucessful</p>";
    // }
  }
?>
  </div>
  <form action="includes/signup.inc.php" method="post">
    <div class="form-control">
      <input type="text" name="name" required>
      <label>Full Name</label>
    </div>

    <div class="form-control">
      <input type="text" name="email" required>
      <label>Email</label>
    </div>

    <div class="form-control">
      <input type="text" name="uid" required>
      <label>Username</label>
    </div>

    <div class="form-control">
      <input type="password" name="pwd" required>
      <label>Password</label>
    </div>

    <div class="form-control">
      <input type="password" name="pwdrepeat" required>
      <label>Repeat Password</label>
    </div>

    <button class="btn" type="submit" name="submit">Sign Up</button>
    <p class="text">Already have an account? <a href="login.php">Login</a></p>
  </form>
  
</div>

<?php
    include_once 'footer.php';
?>