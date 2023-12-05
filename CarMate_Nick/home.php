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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD AN EVENT</button>



        <?php 

        $query = "SELECT * from drag_events";
        $result = mysqli_query($conn, $query);

         ?>

         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">ADD AN ADMIN</button>

         <?php 

        $query2 = "SELECT * from drag_admins";
        $result2 = mysqli_query($conn, $query2);

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
    <!-- Modal -->
<form action="dragstrip_notif.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Event Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <label>Event Name</label>
        <input type="text" name="event_name" class="form-control">
    </div>
    <div class="form-group">
        <label>Event Date</label>
        <input type="text" name="event_date" class="form-control">
    </div>
     <div class="form-group">
        <label>Event Location</label>
        <input type="text" name="event_location" class="form-control">
    </div>
    <div class="form-group">
        <label>Event Description</label>
        <input type="text" name="event_info" class="form-control">
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name ="send_event" value="Send Event">
      </div>
    </div>
  </div>
</div>
</form>
<!-- Modal -->
<form action="dragstrip_admin.php" method="post">
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin to add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" class="form-control">
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name ="send_admin" value="Add Admin">
      </div>
    </div>
  </div>
</div>
</form>
</body>
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