<!-- if logged in redirect to home page -->
<?php
session_start();
if(isset($_SESSION["user"])){ //if not login then redirect to login page
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarMate Admin Login</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles3.css">
    <div class="container">
        <?php
        //checks if login is clicked
        if(isset($_POST["admin_login"])){
            //if button clicked then collect data
            $email = $_POST["email"];
            $password = $_POST["password"];
            //if data exists
            require_once "database.php";
            $sql = "SELECT * FROM admin_login WHERE email = '$email' "; //data matches from email from database to user entered email
            $result = mysqli_query($conn,$sql); //returns an object and to acess with $user
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            //if returns data then email exists and is true...else false
            if($user){
                //email matches but check if password associated with email is correct
                if(password_verify($password, $user['password'])){
                    //only if login can go to homepage
                    session_start();
                    $_SESSION["user"] = "yes"; 
                    header("Location: display.php"); //redirects to homepage
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Incorrect Password.</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not exist.</div>";
            }
        }
        ?>

        <h1>Car Mate Admin Login</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
    </div>
</head>
<body>
    
</body>
</html>