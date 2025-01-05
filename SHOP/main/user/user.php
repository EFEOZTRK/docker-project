<?php
session_start();
include('../../database.php');


if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: ../../login/login.php");
    exit();
}


if (isset($_POST["formsave"])) {
    header("Location: user-edit.php");
    exit();
}


$username = empty($_SESSION["username"]) ? "Guest" : $_SESSION["username"];


$first_name = $last_name = $addr = "blank";
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $fetched_data = mysqli_fetch_assoc($result);
    $first_name = $fetched_data["first_name"];
    $last_name = $fetched_data["last_name"];
    $addr = $fetched_data["addr"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/SHOP/main/navbar.css">
    <link rel="stylesheet" href="user.css?v=1.1">
</head>

<body>

    <?php include("../navbar.php"); ?>

    <div class="container-user-info">
        <div class="user-container">
            <div class="username">
                <div class="nickname">
                    <?php echo   $username   ?>
                </div>
                <form class="form-logout" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
                    <i class="fa-solid fa-door-open" style="color: #ff0000;"></i>
                    <input class="logout-btn" type="submit" name="logout" value="Log out">
                </form>
            </div>
            <div class="personal-info">
                <p>Personal Information</p>
                <a style="color: #ff0000;" id="person">Personal Information</a>
                <a id="like">Liked Items</a>
            </div>
            <p>Order Information</p>
            <div class="order-info">
                <a id="orders">My Orders</a>
            </div>
        </div>
        <div id="info-container" class="info-container"></div>
    </div>

    <script>
        const info_container = document.getElementById("info-container");
        const info = document.getElementById("person");

        info.addEventListener("click", () => {
            info_container.innerHTML = `
            <div class="info-container-inside">
                <form class="personal-info-edit-form" action="user.php" method="POST">
                    <div class="inputs">
                        <label class="form-labels">*First Name:</label>
                        <div class="form-inputs"><?= $first_name ?></div><br>
                    </div>

                    <div class="inputs">
                        <label class="form-labels">*Last Name:</label>
                        <div class="form-inputs"><?= $last_name ?></div><br>
                    </div>

                    <div class="inputs">
                        <label class="form-labels">*Address:</label>
                        <div class="form-inputs"><?= $addr ?></div><br>
                    </div>

                    <input class="form-button" name="formsave" type="submit" value="Edit">
                </form>
            </div>
            `;
        });
    </script>
</body>

</html>