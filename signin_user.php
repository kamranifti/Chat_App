<?php
session_start();

include "./include/connection.php";

if (isset($_POST['sign_in'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_pass = '$pass'";
    $query = mysqli_query($con, $sql);
    $check_user = mysqli_num_rows($query);

    if ($check_user == 1) {

        $_SESSION['user_email'] = $email;

        $update_msg = mysqli_query($con, "UPDATE users SET log_in = 'Online' WHERE user_email = '$email'");
        
        $user = $_SESSION['user_email'];
        $get_user = "SELECT * FROM users WHERE user_email='$user'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);

        $user_name = $row['user_name'];

        header("location:home.php?user_name=$user_name");


    } else {
        echo "
            <div class='alert alert-danger mt-3'>
            <strong>Check Your Email And Password!</strong>
            </div>
            ";
    }
}
