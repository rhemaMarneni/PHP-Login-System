<?php
//since we are including this in every single page, user is logged in those pages
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tacky Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="index.php">About</a>
        <a href="index.php">Blog</a>
        <?php
            if(isset($_SESSION["userid"])){
                echo "<a href='index.php'>Profile Page</a>
                <a href='includes/logout.inc.php'>Log Out</a>
                ";
            }
            else{
                echo "<a href='signup.php'>Sign Up</a>
                <a href='login.php'>Log In</a>
                ";
            }
        ?>
    </nav>

    <div class="wrapper">