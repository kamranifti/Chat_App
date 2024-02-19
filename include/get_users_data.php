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
        <li>
        <div class='chat-left-img'>
        <img width='50px' height='50px' src='$user_profile'>
        </div>
        <div class='chat-left-details'>
        <p> <a href='home.php?user_name=$user_name'>$user_name</a></p>";

    if ($login = "Online") {
        echo "<span><i class='fa fa-circle green-circle 'aira-hidden='true'></i>Online</span>
        ";
    } 
    else if ($login = "Offline") {
        echo "<span><i class='fa fa-circle grey-circle 'aira-hidden='true'></i>Offline</span>";
    }"
        </div>
        </li>
        ";
}
