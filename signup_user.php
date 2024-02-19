<?php

include "./include/connection.php";

if (isset($_POST['sign_up'])) {
    $name = mysqli_real_escape_string($con, $_POST['user_name']);
    $pass = mysqli_real_escape_string($con, $_POST['user_pass']);
    $email = mysqli_real_escape_string($con, $_POST['user_email']);
    $country = mysqli_real_escape_string($con, $_POST['user_country']);
    $gender = mysqli_real_escape_string($con, $_POST['user_gender']);
    $rand = rand(1, 2);

    if ($name == '') {
        echo "<script>alert('We can not veryfi your name')</script>";
    }

    if (strlen($pass) < 6) {
        echo "<script>alert('password should contain 6 charecters!')</script>";
        exit();
    }


    $check_email = "SELECT * FROM users WHERE user_email='$email'";
    $run_email = mysqli_query($con, $check_email);

    $check = mysqli_num_rows($run_email);

    if ($check == 1) {
        echo "<script>alert('Email alredy exist, pleas try again!')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";
        exit();
    }
    if ($rand == 1) {
        $profile_pic = "./images/image1.png";
    } elseif ($rand == 2) {
        $profile_pic = "./images/image2.png";
    }

    $sql1 = "INSERT INTO users (user_name, user_pass, user_email, user_profile,  user_country, user_gender) VALUES ('$name', '$pass', '$email', '$profile_pic', '$country', '$gender')";
    $query = mysqli_query($con, $sql1);

    if ($query) {
        echo "<script>alert('congratulations $name, your account has been created successfully')</script>";
        echo "<script>window.open('signin.php', '_self')</script>";
    } else {
        echo "<script>alert('Regestration Failed')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";
    }
}
