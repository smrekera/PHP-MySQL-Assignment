<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Assingment 5</title>
</head>
<body>
<?php include ("connect.php");?>
<p><h2>Grocery List</h2>
<form method="post">
Item Name <input type="text" name="name">
Category <input type="text" name="category">
Price <input type="text" name="price">
<input type="submit" name="add" value="Add">
<?php
ini_set('display_error', 'On');




if(!empty($_POST['name'])){
	if(empty($_POST['price'])){
		echo "Please enter a price";
		}
	else{
	//$name = htmlentities($_POST['name'], ENT_QUOTES);
	//$category = htmlentities($_POST['category'], ENT_QUOTES);
	//$price = htmlentities($_POST['price'], ENT_QUOTES);
	
	//$name = mysqli_real_escape_string($name);
	//$category = mysqli_real_escape_string($category);
	//$price = mysqli_real_escape_string($price);

		$sql = $mysqli->prepare("INSERT INTO grocery ( name, category, price) VALUES (?,?,?)");
		
		$sql->bind_param("ssd", $_POST['name'], $_POST['category'], $_POST['price']);
			$sql->execute();
			$sql->close();
		echo "1 record added";
		}
		}
	else{
	echo "Please enter an item";
	}
	
	
	


?>
</form>
<form action="view.php" method="post">
<input type="submit" value="Go to List">

</form>
</body>
</html>