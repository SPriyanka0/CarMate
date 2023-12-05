<?php 
include 'database.php';
	if(isset($_POST['send_event'])) {

		$event = $_POST['event_name'];
		$date = $_POST['event_date'];
		$location = $_POST['event_location'];
		$info = $_POST['event_info'];

			$query = "INSERT INTO drag_events (event_name, event_date, event_location, event_info) values ('$event', '$date', '$location', '$info')";
			$result = mysqli_query($conn, $query);
		


		if(!$result){
			die("Query failed".mysqli_error());
		}

		else{
			header('location:home.php?insert_msg=Your event was posted!');
		}
	}

 ?>