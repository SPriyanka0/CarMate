<?php
if(isset($_POST["submit"])){
    $car_make = $_POST["carMake"];
    $car_type = $_POST["carType"];
    $car_year = $_POST["carYear"];
    $car_color = $_POST["carColor"];
    $mods = $_POST["carModification"];

    if(!empty($car_make) && !empty($car_type) && !empty($car_year) && !empty($car_color) && !empty($mods)){
        $link = mysqli_connect("localhost","root", "", "register");
        if($link == false){
            die(mysqli_connect_error());
        }

        $sql = "INSERT INTO form (car_make, car_type, car_year, car_color, mods) VALUES ('$car_make', '$car_type','$car_year','$car_color', '$mods') ";
        if(mysqli_query($link, $sql)){
            header("Location: home.php");
        }else{
            echo "something went wrong";
        }

    }else{
        echo "please enter all information";
    }
}
?>