<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phploginproject";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

//error handling for dB connection
if (!$conn) {
// if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}