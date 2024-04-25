<?php

//all signup functions
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $isEmpty = false;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $isEmpty = true;
    }
    return $isEmpty;
}

function invalidUid($username){
    $isInvalid = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ //string match or else throw error
        $isInvalid = true;
    }

    return $isInvalid;
}

function invalidEmail($email){
    $isInvalid = true;
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //built-in function for checking emails
        $isInvalid = false;
    }
    return $isInvalid;
}

function pwdMatch($pwd,$pwdRepeat){
    $isMatch = false;
    if($pwd !== $pwdRepeat){
        $isMatch = true;
    }
    return $isMatch;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM USERS WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); //initializing a prepared statement
    if(!mysqli_stmt_prepare($stmt, $sql)){ //if prep stmt did not succeed - query syntax error
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss", $username, $email); //'s' -> we are submitting string, ss-> 2 strings
    mysqli_stmt_execute($stmt); //execute stmt

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){ //associative array - if data returned (assign to row at the same time)
        mysqli_stmt_close($stmt); //close the prep stmt
        return $row;
    }
    else{
        mysqli_stmt_close($stmt);
        return false;
    }
}

function createUser($conn, $name, $email, $username, $pwd){
    error_log("Attempt create user");
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){ 
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    //hash the password to protect pwd when db hacked
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //builtin hash function - default algo
    error_log("Password hashed");
    mysqli_stmt_bind_param($stmt,"ssss", $name, $email, $username, $hashedPwd); 
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    error_log("user created");
    header("location: ../login.php?profile=created"); //no errors when signed up
    exit();
}

//all login functions
function emptyInputLogin($username, $pwd){
    $isEmpty = false;
    if(empty($username) || empty($pwd)){
        $isEmpty = true;
    }
    return $isEmpty;
}

function loginUser($conn, $username, $pwd){
    //check username or email
    error_log("checking user credentials");
    $uidexists = uidExists($conn, $username, $username); 
    // returns false or associative array
    if ($uidexists === false){
        error_log("wrong login credentials");
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    error_log("user exists");
    //check hashed password
    $pwdHashed = $uidexists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        error_log("password verified");
        //create session
        session_start();
        error_log("session started");
        $_SESSION["userid"] = $uidexists["usersId"];
        $_SESSION["username"] = $uidexists["usersUid"];
        error_log("redirecting to homepage");
        header("location: ../index.php"); 
        exit();
    }
}