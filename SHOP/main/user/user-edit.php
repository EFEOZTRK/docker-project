<?php
ob_start();

session_start();


include("../navbar.php");
include('../../database.php');

if (isset($_POST["logout"])) {
    session_destroy();
    sleep(2);
    header("Location: ../../login/login.php");
};

if (isset($_POST["formsave"])) {

    $usernameSession = $_SESSION["username"];

    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, 'addr', FILTER_SANITIZE_SPECIAL_CHARS);


    $sql = "UPDATE users SET 
    first_name = '$first_name',
    last_name = '$last_name',
    addr = '$address' WHERE username = '$usernameSession' ";


    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location: user.php");
    exit();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/SHOP/main/navbar.css?v=1.1">
    <link rel="stylesheet" href="user.css?v=1.1">
</head>

<body>
    <div class="container-user-info">
        <div class="user-container">
            <div class="username">
                <div class="nickname">
                    <?php
                    if (!empty($_SESSION["username"])) {
                        echo $_SESSION['username'];
                    } else {
                        echo "Guest";
                    };
                    ?>
                </div>
                <form class="form-logout" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
                    <i class="fa-solid fa-door-open" style="color: #ff0000;"></i>
                    <input class="logout-btn" type="submit" name="logout" value="Log out">
                </form>
            </div>
            <div class="personal-info">
                <p>Personal Informations</p>
                <a style="color: #ff0000;" id="person">Personal Information</a>
                <a id="like">Liked Items</a>
            </div>
            <p>Order Informations</p>
            <div class="order-info">
                <a id="orders">My Orders</a>
            </div>
        </div>
        <div id="info-container" class="info-container">
            <div class="info-container-inside">
                <h2 class="edit-text">You can edit your information below !</h2>
                <h3 class="edit-text-below">You can delete your information from the system by submitting an empty form</h3>

                <form class="personal-info-edit-form" action="user-edit.php" method="POST">
                    <div class="inputs">
                        <label class="form-labels">*First Name:</label>
                        <input class="form-inputs" type="text" name="first_name" id="personal-name"> <br>
                    </div>

                    <div class="inputs">
                        <label class="form-labels">*Last Name:</label>
                        <input class="form-inputs" type="text" name="last_name" id="personal-lastname"> <br>
                    </div>

                    <div class="inputs">
                        <label class="form-labels">*Address:</label>
                        <input class="form-inputs" type="text" name="addr" id="personal-addr"> <br>
                    </div>

                    <input class="form-button" name="formsave" type="submit" value="Save">

                </form>

            </div>
        </div>
    </div>
</body>

</html>