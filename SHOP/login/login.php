<?php
session_start();
include("../database.php");

$username_empty = "";
$password_empty = "";
$login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["log"])) {

        if (empty($_POST["usr"])) {
            $username_empty = "Please enter a username";
        }
        if (empty($_POST["psw"])) {
            $password_empty = "Please enter a password";
        }


        if (empty($username_empty) && empty($password_empty)) {
            $username = $_POST["usr"];
            $password = $_POST["psw"];

            $sql = "SELECT * FROM users WHERE username = '$username' ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $fetched_data = mysqli_fetch_assoc($result);

                $username_check = $fetched_data["username"];
                $password_check = $fetched_data["password"];


                if ($username == $username_check && password_verify($password, $password_check)) {
                    $_SESSION["username"] = $username;
                    header("Location: ../main/index.php");
                    exit();
                } else {
                    $login_error = "Username or Password incorrect!";
                }
            } else {
                $login_error = "Username or Password incorrect!";
            }
        }
    }


    if (isset($_POST["reg"])) {
        header("Location: register.php");
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css?v=1.1">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        .usr_empty,
        .psw_empty {
            font-size: 12px;
            color: red;
            font-weight: 400;
            margin-left: 25px;
        }

        .login_error {
            font-size: 15px;
            letter-spacing: 0.5px;
            color: red;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="login-container-text">
        <h1 class="container-h">Welcome to my SHOP</h1>
        <p class="container-p">Discover the latest trends in fashion and elevate your wardrobe with our wide selection of stylish clothes. Whether you're looking for casual wear, elegant outfits, or something in between, we have something for every occasion. Shop now and find the perfect pieces to express your unique style!</p>
    </div>
    <div class="login-container-form">
        <p class="login-text">USER LOGIN</p>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="username">
                <i class="fa-regular fa-user fa-lg" style="color: #B197FC;"></i>
                <input type="text" name="usr" id="usr"> <br>
                <div class="usr_empty"><?= $username_empty; ?></div>
            </div>
            <div class="password">
                <i class="fa-solid fa-lock fa-lg" style="color: #B197FC;"></i>
                <input type="password" name="psw" id="psw"> <br>
                <div class="psw_empty"><?= $password_empty; ?></div>
            </div>
            <div class="no-account">
                <input type="submit" name="reg" value="Don't have an Account ?">
            </div>
            <div class="login-container" style="flex-direction: column;">
                <input class="login" type="submit" name="log" value="LOGIN"> <br>
                <div class="login_error"><?= $login_error; ?></div>
            </div>
        </form>
    </div>
</body>

</html>
<script src="https://kit.fontawesome.com/a3d028a738.js" crossorigin="anonymous"></script>