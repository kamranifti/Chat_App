<?php

$con =  new mysqli("localhost", "root", "", "chatapp");

$user = "SELECT * FROM users";
$run_user = mysqli_query($con, $user);

while ($row_user = mysqli_fetch_array($run_user)) {

    $user_id = $row_user['user_id'];
    $user_name = $row_user['user_name'];
    $user_profile = $row_user['user_profile'];
    $login = $row_user['log_in'];

    echo "
        <li class='left-user'>
        <div class='chat-left-img'>
        <img width='50px' height='50px' src='$user_profile'>
        </div>
        <div class='chat-left-details'>
        <p class='user-name'><a href='home.php?user_name=$user_name'>$user_name</a></p>";

    if ($login == 'Online') {
        echo "<span class='online-text'><i class='fa fa-circle green-circle'></i> $login</span>";
    } else {
        echo "<span class='online-text'> <i class='fa fa-circle grey-circle'></i> $login</span>";
    }
    "</div>
        </li>";
}















// <span class='online-text'><i class='fa fa-circle grey-circle ' aira-hidden='true'></i> Offline</span>

// <span class='online-text'> <i class='fa fa-circle green-circle ' aira-hidden='true'></i> Online</span>