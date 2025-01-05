<?php
include("../database.php");

$username_empty = "";
$password_empty = "";
$username_istaken = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["reg"])) {

        if (empty($_POST["usr"])) {
            $username_empty = "Please enter a username";
        }
        if (empty($_POST["psw"])) {
            $password_empty = "Please enter a password";
        }


        if (empty($username_empty) && empty($password_empty)) {
            $username_input = $_POST["usr"];
            $password_input = password_hash($_POST["psw"], PASSWORD_DEFAULT);


            $sql_check = "SELECT * FROM users WHERE username = '$username_input'";
            $result_check = mysqli_query($conn, $sql_check);

            if (mysqli_num_rows($result_check) > 0) {
                $username_istaken = "This username is already in use";
            } else {

                $sql = "INSERT INTO users (username, password) VALUES ('$username_input', '$password_input')";
                try {
                    sleep(1);
                    mysqli_query($conn, $sql);
                    header("Location: login.php");
                    exit();
                } catch (mysqli_sql_exception $e) {
                    $username_istaken = "Error occurred while registering: " . $e->getMessage();
                }
            }
        }
    }


    if (isset($_POST["log"])) {
        header("Location: login.php");
        exit();
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
        }

        .login {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="login-container-text">
        <h1 class="container-h">Welcome to my SHOP</h1>
        <p class="container-p">
            Discover the latest trends in fashion and elevate your wardrobe with our wide selection of stylish clothes.
            Whether you're looking for casual wear, elegant outfits, or something in between, we have something for every occasion.
            Shop now and find the perfect pieces to express your unique style!
        </p>
    </div>
    <div class="login-container-form">
        <p class="login-text">USER REGISTER</p>
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
                <input type="submit" name="log" value="Already have an account ?">
            </div>
            <div class="login-container">
                <input class="login" type="submit" name="reg" value="REGISTER">
                <div class="login_error"><?= $username_istaken; ?></div>
            </div>
        </form>
    </div>
</body>

</html>

<script src="https://kit.fontawesome.com/a3d028a738.js" crossorigin="anonymous"></script>