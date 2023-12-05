<?php
// ban.php

$con = new mysqli('localhost', 'root', '', 'register');

if (!$con) {
    die(mysqli_error($con));
}

if (isset($_GET['userid'])) {
    // Ban user logic here
    $userIdToBan = $_GET['userid'];
    $banSql = "UPDATE admindash SET banned = 1 WHERE id = $userIdToBan";
    $banResult = mysqli_query($con, $banSql);

    if (!$banResult) {
        echo "Error banning user: " . mysqli_error($con);
    } else {
        header("Location: display.php"); // Redirect back to display.php after banning
        exit();
    }
}
?>