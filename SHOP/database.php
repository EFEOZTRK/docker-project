<?php
$db_server = "db";
$db_user = "root";
$db_pass = "root";
$db_name = "shopdb";
$conn = "";

$conn = mysqli_connect(
    $db_server,
    $db_user,
    $db_pass,
    $db_name
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
