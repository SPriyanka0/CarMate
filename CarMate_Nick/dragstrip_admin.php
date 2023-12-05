<?php 
include 'database.php';
	if(isset($_POST['send_admin'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];

			$query = "INSERT INTO drag_admins (email, password) values ('$email', '$password')";
			$result = mysqli_query($conn, $query);
		


		if(!$result){
			die("Query failed".mysqli_error());
		}

		else{
			header('location:home.php?insert_msg=The admin was added!');
		}
	}

 ?>