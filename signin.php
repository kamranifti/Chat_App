<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/signin.css">
</head>

<body>
    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
                <h2 class="text-center mt-2">Sign in</h2>
                <p class="text-center loginto">Login To Chatroom</p>
            </div>
            <div class="form-group mt-3">
                <label for="">Email</label>
                <br>
                <input type="email" name="email" placeholder="Your@mail.com" autocomplete="off">
            </div>
            <div class="form-group mt-3">
                <label for="">Password</label>
                <br>
                <input type="password" name="pass" placeholder="Password">
            </div>
            <div class="small mt-2 mt-3">Forgot Password? <a href="forgot-pass.php">Click Here</a></div>
            <div class="submit-btn">
                <button type="submit" class="btn sub-btn mt-4" name="sign_in">Sign In</button>
            </div>
            <?php include "signin_user.php"; ?>
        </form>
    </div>
    <div class="creat-new text-center mt-5">
        Don't have an Account ? <a href="signup.php"> Create One</a>
    </div>
</body>

</html>