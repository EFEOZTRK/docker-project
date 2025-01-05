<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Oxanium:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        .main {
            position: absolute;
            top: 70px;
            left: 40px;
            height: 30%;
            width: 30%;
            background-image: url("./img/back.png");
            z-index: -1;
        }

        a {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-inside">
            <div class="navbar-links">
                <a href="/main/navbar.php">Home</a>
                <a>He</a>
                <a>She</a>
                <a>About us</a>
            </div>
            <div class="navbar-logo">
                <div class="logo-text">
                    SHOP
                </div>
            </div>
            <div class="navbar-user">
                <a><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i></a>
                <a href="/main/user/user.php"><i class="fa-regular fa-user fa-lg" style="color:rgb(255, 0, 0);"></i></a>
                <a><i class="fa-solid fa-bag-shopping fa-lg" style="color: #ffffff;"></i></a>
            </div>
        </div>
    </nav>
    <div class="main">
        <img class="back-img" src="./img/back.png">
    </div>
</body>

</html>
<script src="https://kit.fontawesome.com/a3d028a738.js" crossorigin="anonymous"></script>