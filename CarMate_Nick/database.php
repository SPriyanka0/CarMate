<!-- adding code to connect with database -->
<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = ""; //keep password empty
$dbName ="register"; //same name from phpMyAdmin
//return true/false if anything happens with variable ->if statement
$conn =mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if(!$conn){
    die("Something went wrong, sorry...");
}
?>