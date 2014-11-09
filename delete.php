<?php


	include('connect.php');
	
	if(isset($_GET['id']) && is_numeric($_GET['id'])){
	
		$id = $_GET['id'];
		
		if($stmt = $mysqli->prepare("DELETE FROM grocery WHERE id = ? LIMIT 1")){
		
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->close();
			echo "DELETED";
			}
		else{
			echo "ERROR";
			}
		
		$mysqli->close();
		
		header("Location: view.php");
	}
	else{
		header("Location: view.php");
		}
		echo "<form action='view.php' method='post'>
			<input type='submit' value='Return to List'>";
	?>