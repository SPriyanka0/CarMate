<?php
$con = new mysqli('localhost','root', '', 'register');

if(!$con){
    die(mysqli_error($con));
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
    
  <div class="container">
        <button class="btn btn-primary my-5"><a href="dashboard.php" class="text-light">Add user</a></button>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM admindash";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $banned = $row['banned'];

                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $email . '</td>
                        <td>' . $password . '</td>
                        <td>
                            <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete </a></button>';

                        if ($banned == 0) {
                            echo '<button class="btn btn-warning"><a href="ban.php?userid=' . $id . '" class="text-light">Ban</a></button>';
                        } else {
                            echo '<button class="btn btn-success"><a href="unban.php?userid=' . $id . '" class="text-light">Unban</a></button>';
                        }

                        echo '</td>
                        </tr>';
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
  </body>
</html>