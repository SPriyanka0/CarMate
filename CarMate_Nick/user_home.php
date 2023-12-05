<?php
session_start();
include 'database.php';
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    
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
        <?php 

        $query = "SELECT * from drag_events";
        $result = mysqli_query($conn, $query);

         ?>

    <div class="event">
        <div class="container">
            <div class="row">
                <tr>
                <?php 
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class = "display-6 text-center">
                    <td><?php echo $row['event_name']; ?></td>
                </div>
                <div>
                    <td>Date:<?php echo $row['event_date']; ?></td>
                </div>
                <div>
                    <td>Location:<?php echo $row['event_location']; ?></td>
                </div>
                <div>
                    <td>Description:<?php echo $row['event_info']; ?></td>
                </div>
                
                
            </tr>
                <?php 
            }


                ?>
        <div class="events">
        
    </section>
   
</html>

<?php 

    if(isset($_GET['message'])){
        echo "<h6>".$_GET['message']."</h6>";
    }
 ?>
 <<?php 

    if(isset($_GET['insert_message'])){
        echo "<h6>".$_GET['insert_message']."</h6>";
    }
 ?>
 <section class="icons">
        <a href="home.html"><img src="home-icon.png" alt="Home"></a>
        <a href="live.chat.html"><img src="chat-icon.png" alt="Live Chat"></a>
        <a href="map.html"><img src="map-icon.png" alt="Local Map"></a>
        <a href="form.html"><img src="profile-icon.png" alt="Profile"></a>
    </section>
    <footer>
        <p>&copy; 2023 Car Mate</p>
    </footer>