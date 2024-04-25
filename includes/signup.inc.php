<?php

if(isset($_POST["submit"])){
    error_log("Submit successful");
    $name = $_POST["name"]; //name etc., from form are all superglobal variables
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php'; 
    require_once 'functions.inc.php'; 

    //if user left any fields empty
    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)!== false){
        //send him straight back to signup page with error message
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username)!== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email)!== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd,$pwdRepeat)!== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    //user already exists -- we need to connect to the db for this
    if(uidExists($conn, $username, $email)!== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    error_log("All clear creating user");
    createUser($conn, $name, $email, $username, $pwd);
} 
else{ 
    header("location: ../signup.php");
    exit();
}