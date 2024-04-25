<?php

//just destroy the session
error_log("trying to destroy session");
session_start();
session_unset();
session_destroy();

error_log("Session destroyed");
header("location: ../index.php");
exit();