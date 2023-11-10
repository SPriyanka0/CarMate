<?php
session_start();
if(!isset($_SESSION["user"])){ //if not login then redirect to login page
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Car Mate</title>
</head>
<body>
    <header>
        <img src="logo.png" alt="Car Mate Logo">
    </header>
    <nav>
        <ul>
            <!-- <li><a href="signup.html">Sign Up</a></li> -->
            <li><a href="home.html">Home</a></li>
            <!-- logout -->
            <li><a href=logout.php class="btn btn-warning">Logout</a></li>
        </ul>
    </nav>
    <section class="content">
        <h1>Welcome to Car Mate</h1>
        <h2>Local Events</h2>
        <div class="events">
            <div class="event">
                <h3>Car Show - Downtown</h3>
                <p>Date: September 15, 2023</p>
                <p>Location: Main Street, City</p>
                <p>Description: Join us for a car show featuring classic and exotic cars!</p>
            </div>
            <div class="event">
                <h3>Drag Racing Championship</h3>
                <p>Date: October 5, 2023</p>
                <p>Location: Local Dragstrip</p>
                <p>Description: Witness thrilling drag races and cheer for your favorite racers!</p>
            </div>
        </div>
        <h2>Local Racers</h2>
        <div class="racers">
            <div class="racer">
                <h3>John Doe</h3>
                <p>Car: Chevrolet Camaro</p>
                <p>Description: Looking for challengers for a drag race this weekend!</p>
            </div>
            <div class="racer">
                <h3>Jane Smith</h3>
                <p>Car: Ford Mustang</p>
                <p>Description: Ready for some friendly drag racing competitions. Let's race!</p>
            </div>
        </div>
    </section>
    <section class="icons">
        <a href="home.html"><img src="home-icon.png" alt="Home"></a>
        <a href="live.chat.html"><img src="chat-icon.png" alt="Live Chat"></a>
        <a href="map.html"><img src="map-icon.png" alt="Local Map"></a>
        <a href="form.html"><img src="profile-icon.png" alt="Profile"></a>
    </section>
    <footer>
        <p>&copy; 2023 Car Mate</p>
    </footer>
</body>
</html>
