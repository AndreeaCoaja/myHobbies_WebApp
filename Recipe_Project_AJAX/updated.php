 <?php

if(isset($_POST['updated'])) {
	//Get form data
	$id=$_POST['id'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$difficulty=$_POST['difficulty'];
	$recipe=$_POST['recipe'];
	
		//connect to db 
		
		$servername = "localhost";
		$user = "root";
		$pass = "";
		$dbname ="recipes";
		
		$mysqli = new MySQLi($servername, $user, $pass, $dbname);

		
		// Escape special characters, if any = escapes special characters in a string for use in an SQL query (e.g. ' name: D'Ore)
		$name=$mysqli -> real_escape_string($name);
		$type = $mysqli -> real_escape_string($type);
		$difficulty = $mysqli -> real_escape_string($difficulty);
		$recipe = $mysqli -> real_escape_string($recipe);		
		
		
		//Update recipe into db
		$update = $mysqli->query("UPDATE recipes SET name='$name', type='$type', difficulty='$difficulty', recipe='$recipe' WHERE id='$id' ");		
 }
?>