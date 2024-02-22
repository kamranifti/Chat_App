<!DOCTYPE html>
<?php
session_start();
include "./include/connection.php";

if (!isset($_SESSION['user_email'])) {
    header("location:signin.php");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/home.css">
</head>

<body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group-searchbox">
                    <div class="input-group-btn">
                        <center> <a href="./include/find-friends.php"><button class="btn btn-default search-icon mt-3" name="search_user" type="submit">Add new user</button> </a></center>
                    </div>
                </div>
                <div class="left-chat mt-3">
                    <ul>
                        <?php include "./include/get_users_data.php"; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 right-sidebar">
                <div class="logout-box">
                    <form action="logout.php" method="post">
                        <button name="logout" class="btn btn-danger logout-btn">Logout</button>
                    </form>
                </div>
                <?php if (isset($_GET['user_name'])) { ?>

                    <div class="row">
                        <!-- logdin user information -->
                        <?php
                        $user = $_SESSION['user_email'];
                        $get_user = "SELECT * FROM users WHERE user_email = '$user'";
                        $run_user = mysqli_query($con, $get_user);
                        $row = mysqli_fetch_array($run_user);

                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];

                        $get_username = $_GET['user_name'];
                        $get_user = "SELECT * FROM users WHERE user_name = '$get_username'";
                        $run_users = mysqli_query($con, $get_user);
                        $row_user = mysqli_fetch_array($run_users);

                        $username = $row_user['user_name'];
                        $user_profile_image = $row_user['user_profile'];

                        $total_messages = "SELECT * FROM users_chat WHERE (sender_username = '$user_name' AND receiver_username = '$username') OR (receiver_username='$user_name' AND sender_username = '$username')";
                        $run_message = mysqli_query($con, $total_messages);
                        $total = mysqli_num_rows($run_message);

                        ?>
                        <div class="col-md-12 right-header">
                            <div class="right-header-img">
                                <img src="<?php echo "$user_profile_image"; ?>" alt="">
                            </div>
                            <div class="right-headers-detail">
                                <p class="name"><?php echo "$username"; ?></p>
                                <span class="messages"> <?php echo $total; ?> Messages</span> &nbsp; &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="scrolling-to-bottom" class="col-md-12 right-header-contentChat">
                            <?php

                            $update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username= '$user_name'");

                            $sel_msg = "SELECT * FROM users_chat WHERE (sender_username = '$user_name' AND receiver_username = '$username') OR (receiver_username = '$user_name' AND sender_username = '$username')";
                            $run_msg = mysqli_query($con, $sel_msg);

                            while ($row = mysqli_fetch_array($run_msg)) {
                                $sender_username = $row['sender_username'];
                                $receiver_username = $row['receiver_username'];
                                $msg_content  = $row['msg_content'];
                                $msg_date = $row['msg_date'];

                            ?>
                                <ul>
                                    <?php
                                    if ($user_name == $sender_username and $username == $receiver_username) {
                                        echo "
                                <li>
                                <div class='rightside-right-chat'>
                                
                                <span>$user_name<small> $msg_date</small></span>
                                <br><br>
                                <p>$msg_content</p>
                                </div>
                                </li>
                                ";
                                    } else if ($user_name == $receiver_username and $username == $sender_username) {
                                        echo "
                                <li>
                                <div class='rightside-left-chat'>
                                <span>$username<small class=''> $msg_date</small></span>
                                <br><br>
                                <p>$msg_content</p>
                                </div>
                                </li>
                                ";
                                    }
                                    ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 right-chat-textbox">
                            <?php
                            if (isset($_POST['submit'])) {

                                $msg = $_POST['msg_content'];

                                if ($msg == "") {
                                    echo "<div class='alert alert-danger'>
                                         <strong><center>Type Somthing to send</center></strong>
                                        </div>";
                                } else if (strlen($msg) > 100) {
                                    echo "<div class='alert alert-danger'>
                                            <strong><center>Message is too long! your message must be under 100 words</center></strong>
                                            </div>";
                                } else {
                                    $insert = "INSERT INTO users_chat(sender_username, receiver_username, msg_content, msg_status, msg_date)
                                    VALUES ('$user_name','$username','$msg','unread',NOW())";
                                    $run_insert = mysqli_query($con, $insert);
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <input autocomplete="off" type="text" name="msg_content" placeholder=" Write Your Message........" class="input-msg">

                                <button class="btn send-btn" name="submit"><i class="fa-solid fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>

                <?php   } else { ?>
                    <h1>Please select user </h1>
                <?php } ?>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var scrollingToBottom = document.getElementById("scrolling-to-bottom");
            scrollingToBottom.scrollTop = scrollingToBottom.scrollHeight;});
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var height = window.innerHeight;

            // Adjust the height of elements
            var leftChat = document.querySelector('.left-chat');
            leftChat.style.height = (height - 92) + 'px';

            var rightHeaderContentChat = document.querySelector('.right-header-contentChat');
            rightHeaderContentChat.style.height = (height - 159) + 'px';
        });
    </script>
</body>

</html>