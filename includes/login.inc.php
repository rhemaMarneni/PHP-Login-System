<?php

if(isset($_POST["submit"])){
    error_log("login credentials submitted");
    $username = $_POST["name"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php'; 

    if(emptyInputLogin($username, $pwd)){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $username, $pwd);
}
else{
    header("location: ../login.php");
    exit();
}