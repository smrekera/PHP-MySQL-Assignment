<?php 
		include("connect.php");
		
		
		
		
		
		if($query = $mysqli->query ("SELECT id, name, category, price FROM grocery ORDER by id")){
		
		
		
		echo "<h2>Grocery List</h2>";
		
				echo "<table border='1' cellpadding='10'>";
				
				echo"<tr><th>ID</th><th>Item</th><th>Category</th><th>Price</th><th></th></tr>";
				
				while ($row = $query->fetch_object()){
				
				//$name = $row['name'];
				//$category = $row['category'];
				//$price = $row['price'];
				
				//$name = htmlspecialchars($row['name'], ENT_QUOTES);
				//$category = htmlspecialchars($row['category'], ENT_QUOTES);
				//$price = htmlspecialchars($row['price'], ENT_QUOTES);
				
				
					
				
					echo "<tr>";
					echo "<td>" . $row->id . "</td>";
					echo "<td>" . $row->name . "</td>";
					echo "<td>" . $row->category . "</td>";
					echo "<td>" . $row->price . "</td>";
					echo "<td><a href='delete.php?id=" . $row->id . "'>Delete</a></td>";
					echo "</tr>";
					}
					echo "</table>";
				echo "<form action='interface.php' method='post'>
						<input type='submit' value='Add Another Item'></form>";
				echo "<form action='deleteAll.php' method='post'>
						<input type='submit' name='Delete All' value='Delete ALL'></form>";
						
				$query = $mysqli->query("SELECT category FROM grocery");
				echo "<form method='post'
					<select name= 'category'>";
				while($row = $query->fetch_object()){
					echo "<option value='" . $row->category . "'>" . $row->category . "</option>";
				}
				echo "</select>,</form>";
				echo "<form method='post'>
					Price Change (%) <input type='text' name='percent'>
					<input type='submit' name='Alter Price' value='Alter Price'></form>";
					if(isset($_POST['Alter Price'])){
					$newprice = $_POST['percent'] / 100;
					$stmt = $mysqli->query("UPDATE grocery SET price = ROUND (price * $newprice,2) WHERE $_POST['category']");
					$stmt->bind_param("d", $price);
					$stmt->execute();
					$stmt->close();
					}
		}
				
			
		else{
			echo "No results";
			}
			
		
		//$mysqli->close();
			
		mysqli_close($mysqli);
?>