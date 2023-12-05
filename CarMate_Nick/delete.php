<?php 
    $con = new mysqli('localhost','root', '', 'register');

    if(!$con){
        die(mysqli_error($con));
    }

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM admindash WHERE id = $id";
        $result = mysqli_query($con, $sql);
        if($result){
            //echo "Deleted successful";
            header('location: display.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>