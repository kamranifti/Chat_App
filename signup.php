<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/signup.css">
</head>

<body>
    <div class="signup-form">
        <form action="" method="post">
            <div class="form-header">
                <h2 class="text-center mt-2">Sign up</h2>
                <p class="text-center loginto">sign up and start to chat</p>
            </div>
            <div class="form-group mt-3">
                <label for="">Username</label>
                <br>
                <input type="text" name="user_name" placeholder="Your name" autocomplete="off">
            </div>
            <div class="form-group mt-3">
                <label for="">Password</label>
                <br>
                <input type="password" name="user_pass" placeholder="Password">
            </div>
            <div class="form-group mt-3">
                <label for="">Email Address</label>
                <br>
                <input type="email" name="user_email" placeholder="Your@mail.com" autocomplete="off">
            </div>
            <div class="form-group mt-3">
                <label for="">Country</label>
                <br>
                <select id="" name="user_country" required class="select">
                    <option value="">Select your country</option>
                    <option value="pak">Pakistan</option>
                    <option value="ind">India</option>
                    <option value="chi">China</option>
                    <option value="us">USA</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="">Gender</label>
                <br>
                <select id="" name="user_gender" required class="select">
                    <option value="">Select your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">others</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="" class="checkbox-inline check-lable"><input type="checkbox" class="check-box" required>&nbsp; &nbsp;I accept the <a href="#">&nbsp; Terms of Use</a>&nbsp; &amp; &nbsp;<a href="#">Privacy Policy</a></label>
            </div>

            <div class="submit-btn">
                <button type="submit" class="btn sub-btn mt-4" name="sign_up">Sign Up</button>
            </div>
            <?php include "signup_user.php"; ?>
        </form>
    </div>
    <div class="creat-new text-center mt-5 mb-5">
        Alredy have an Account ? <a href="signin.php"> sign in </a>
    </div>
</body>

</html>