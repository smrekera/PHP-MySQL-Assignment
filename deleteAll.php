<?php
include('connect.php');

			if($stmt = $mysqli->prepare("DELETE FROM grocery")){
		
			$stmt->bind_param();
			$stmt->execute();
			$stmt->close();
			echo "DELETED";
			}
		else{
			echo " DELETE ERROR";
			}
		echo "<form action='interface.php' method='post'>
	<input type='submit' value='Start New List'>";
		$mysqli->close();
				
?>