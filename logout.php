<?php

include "./include/connection.php";

session_start();
$email = $_SESSION['user_email'];


if (isset($_POST['logout'])) {
   mysqli_query($con, "UPDATE users SET log_in = 'Offline' WHERE user_email = '$email'");
}

session_start();

session_unset();

session_destroy();

header("location:signin.php");
