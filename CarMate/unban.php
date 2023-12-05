<?php
$con = new mysqli('localhost', 'root', '', 'register');

if (!$con) {
    die(mysqli_error($con));
}

if (isset($_GET['userid'])) {
    $userIdToUnban = $_GET['userid'];

    // Check if the user exists and is banned
    $checkSql = "SELECT * FROM admindash WHERE id = $userIdToUnban AND banned = 1";
    $checkResult = mysqli_query($con, $checkSql);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // User exists and is banned, proceed to unban
        $unbanSql = "UPDATE admindash SET banned = 0 WHERE id = $userIdToUnban";
        $unbanResult = mysqli_query($con, $unbanSql);

        if (!$unbanResult) {
            echo "Error unbanning user: " . mysqli_error($con);
        } else {
            header("Location: display.php"); // Redirect back to display.php after unbanning
            exit();
        }
    } else {
        echo "User not found or not banned.";
    }
} else {
    echo "Invalid request.";
}
?>
