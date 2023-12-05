<?php
include 'database.php';
// Check if admin is not logged in
if(isset($_SESSION["admin"])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    die();
}

$con = new mysqli('localhost','root', '', 'register');

if(!$con){
    die(mysqli_error($con));
}

if(isset($_POST['submit'])){
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    $sql = "INSERT INTO admindash (name, email, password) VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

   //if($result){
        header('location: display.php');
     // echo "Data entered successfully";
    //} else {
   //     die(mysqli_error($con));
   // }//
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" 
                placeholder="Enter your name" name="name" autocomplete = off>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" 
                placeholder="Enter your email" name="email"  autocomplete = off>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" 
                placeholder="Enter your password" name="password"  autocomplete = off>
            </div>

            <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
        </form>
    </div>
</body>
</html>
