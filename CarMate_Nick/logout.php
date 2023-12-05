<!-- abort session and once logged out user can not go back to home page -->
<?php
session_start();
session_destroy();
header("Location: login.php"); //redirect to page
?>