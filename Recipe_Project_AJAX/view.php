<?php
//connect to db 
					
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$dbname ="recipes";
					
	$MS = 'mysql:host='.$servername.';dbname='.$dbname;
	$PDO = new PDO($MS, $user, $pass);
				
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
            
<div class="myHeader">
            <h1>View Recipes</h1>
</div>
		

		<div class="myContainer">
		<button type="submit" class="btn btn-info deleteTable" onclick="window.location.href='http://localhost/Recipe_Project_AJAX/deleteTable.php';">Delete table </button>
		<button type="submit" class="btn btn-info createTable" onclick="window.location.href='http://localhost/Recipe_Project_AJAX/createTable.php';">Create a table for recipes </button>
		
		<table width="100%" border="1" class="myTable" style=" margin-top:20px;">
			<thead class="text-center">
				<tr>
					<th class="text-center"><strong>Name</strong></th>
					<th class="text-center"><strong>Type</strong></th>
					<th class="text-center"><strong>Difficulty</strong></th>
					<th class="text-center"><strong>Recipe</strong></th>
					<th class="text-center"><strong>Edit</strong></th>
					<th class="text-center"><strong>Delete</strong></th>
				</tr>
			</thead>
			<tbody> 
			
			<?php
				//select query
				$resultQuery=$PDO->query("select * from recipes");
		
		
				while($row=$resultQuery->fetch(PDO::FETCH_ASSOC)) { 
			?>
					<tr>
						<td align="center">
							<?php echo $row["name"]; ?>
						</td>
						<td align="center">
							<?php echo $row["type"]; ?>
						</td>
						<td align="center">
							<?php echo $row["difficulty"]; ?>
						</td>
						<td align="center">
							<?php echo $row["recipe"]; ?>
						</td>
						<td align="center">
							<a href="update.php?id=<?php echo $row["id"]; ?>">Edit</a>
						</td>
						<td align="center">
							<span class="delete" id="del_<?php echo $row["id"]; ?>" >Delete</a>
						</td>
					</tr>
					<?php } ?>
			</tbody>
		</table>
			
</div>
	</body>
</html>

