<?php
$error = null;

if (isset($_POST['save'])) {
    //Get form data
    $name = $_POST['name'];
    $type = $_POST['type'];
    $difficulty = $_POST['difficulty'];
    $recipe = $_POST['recipe'];

    //connect to db

    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "recipes";
	
	$MS = 'mysql:host='.$servername.';dbname='.$dbname;
	$PDO = new PDO($MS, $user, $pass);


    //Insert recipe into db
    $insert = $PDO->prepare("INSERT INTO recipes(name, type, recipe, difficulty ) VALUES(?,?,?,?) ");
	$insert->execute([$name, $type, $recipe, $difficulty]);

}
?>

<html>
	<head>
		<link href="myStyle.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="scripts.js"></script>
	</head>
	
	<body>
	
		<ul class="navList">
            <li><a href="insert.php">Add recipes here</a></li>
			<li><a href="view.php">View recipes here</a></li>
			<li><a href="filter.php">Filter recipes here</a></li>
			<li><a href="http://www.scs.ubbcluj.ro/~caig0228/examen.html">Back to Hobbys</a></li>
        </ul>
		<header class="myHeader">
            <h1 style=" margin-top:50px;">Insert Recipe</h1>
        </header>
		<div class="myContainer">
		<form method="POST" action="">
			<table border="0" align="center" cellpadding="5" class="myTable">
				<tr>
					<td align="right">Name:</td>
					<td> <input type="TEXT" name="name" id="name" required/> </td>
				</tr>
				<tr>
					<td align="right">Type:</td>
					<td> 
					<select id="type">
						<option value="breakfast">breakfast </option>
						<option value="main dish">main dish </option>
						<option value="dessert">dessert </option>
					</select>
					 </td>
				</tr>
				<tr>
					<td align="right">Difficulty:</td>
					<td> <input type="TEXT" name="difficulty" id="difficulty" required/> </td>
				</tr>
				<tr>
					<td align="right">Recipe:</td>
					<td> <input type="TEXT" name="recipe" id="recipe" required/> </td>
				</tr>
				<tr>
					<td colspan="2" style=" padding-left:330px;"> <input type="SUBMIT" name="submit" id="submit_btn" value="Add recepie" required/> </td>
				</tr>
			</table>
		</form>
		</div>
		<h1>
			<?php 
			echo $error;
			?>
		</h1>
	
	</body>
</html>
