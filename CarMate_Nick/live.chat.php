<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Box</title>
    <link rel="stylesheet" href="css/chatstyles.css">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
    <div class="wrapper">
        <!-- header - user stuff -->
        <section class="users">
           <header>
            <?php
            require_once "database.php";
           
            
            if (isset($_SESSION["user"])) {
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE name = '{$_SESSION["user"]}'");
                if (!$conn) {
                    die("database connection failed " . mysqli_connect_error());
                }
                
                if (!$sql) {
                    die("query failed " . mysqli_error($conn));
                }
                if (mysqli_num_rows($sql) > 0) {
                    $row = array();
                    $row = mysqli_fetch_assoc($sql);
                }
            } else{
                die("no connection");
            }
            ?>
            <div class="content">
                <div class="details">
                <span><?php 
                require_once "database.php";
                echo isset($row['name']); ?><span>

                    <!-- <p>Active Now</p> -->
                </div>
            </div>
             <!-- logout -->
             <ul>
    <li><a href="logout.php" class="btn btn-warning">Logout</a></li>
</ul>

           </header>

           <div class="search">
            <span class="text">Select a user to start chat!</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="bi bi-search"></i></button>  
           </div>
           <div class="user-list">
            <a href="#">
                <div class="content">
                    <div class="details">
                        <span>Name Name</span>
                        <p>This is test message</p> 
                    </div>
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <div class="details">
                        <span>Name Name</span>
                        <p>This is test message</p> 
                    </div>
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <div class="details">
                        <span>Name Name</span>
                        <p>This is test message</p> 
                    </div>
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <div class="details">
                        <span>Name Name</span>
                        <p>This is test message</p> 
                    </div>
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <div class="details">
                        <span>Name Name</span>
                        <p>This is test message</p> 
                    </div>
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                    <div class="details">
                        <span>Name Name</span>
                        <p>This is test message</p> 
                    </div>
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
           </div>
        </section>
    </div>
    <section class="icons">
        <a href="home.php"><img src="photos/home-icon.png" alt="Home"></a>
        <a href="liveChat.html"><img src="photos/chat-icon.png" alt="Live Chat"></a>
        <a href="map.html"><img src="photos/map-icon.png" alt="Local Map"></a>
        <a href="form.html"><img src="photos/profile-icon.png" alt="Profile"></a>
    </section>
    <footer>
        <p>&copy; 2023 CarMate</p>
    </footer>
</body>

</html>