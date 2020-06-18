
<html>

	<head>
		<link href="myStyle.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="scripts.js"></script>
		<script>
			$(document).ready(function(){
				//filter
				$('#selected_type').on('change', function(){
					var value=$(this).val();
					console.log(value)
					$.ajax({
						url: 'fetch.php',
						type: 'POST',
						data: {
							'filter':1,
							'type': value
						},
						success:function(data){
							$("#container").html(data);
						}
					})
				});
			});
		</script>
	</head>

	<body>
                <ul class="navList">
                    <li><a href="insert.php">Add recipes here</a></li>
			<li><a href="view.php">View recipes here</a></li>
			<li><a href="filter.php">Filter recipes here</a></li>
			<li><a href="http://www.scs.ubbcluj.ro/~caig0228/examen.html">Back to Hobbys</a></li>
                </ul>
		<header class="myHeader">
            <h1>Filter Recipes</h1>
        </header>
		
		<div class="myContainer">
			<div id="filter">
				Filter by:
				<select id="selected_type">
					<option value="breakfast">breakfast </option>
					<option value="main dish">main dish </option>
					<option value="dessert">dessert </option>
				</select>
			</div>
			<br>
			
			
			<div id="container">
			<?php
		
				
				//connect to db 
				$servername = "localhost";
				$user = "root";
				$pass = "";
				$dbname = "recipes";
				
				$MS = 'mysql:host='.$servername.';dbname='.$dbname;
				$PDO = new PDO($MS, $user, $pass);
					
				$resultQuery= $PDO->query("select * FROM recipes");
				
				echo '<table width="100%" border="1" class="myTable" >';
				echo '<thead>';
				echo '<tr>';
				echo '<th ><strong>Name</strong></th>';
				echo '<th ><strong>Type</strong></th>';
				echo '<th ><strong>Difficulty</strong></th>';
				echo '<th ><strong>Recipe</strong></th>';
				echo '<th ><strong>Edit</strong></th>';
				echo '<th ><strong>Delete</strong></th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody> ';
			
			
				while($row=$resultQuery->fetch(PDO::FETCH_ASSOC)) {
							echo '<tr>';
							echo '<td align="center">'.$row["name"].'</td>';
							echo '<td align="center">'.$row["type"].'</td>';
							echo '<td align="center">'.$row["difficulty"].'</td>';
							echo '<td align="center">'.$row["recipe"].'</td>';
							echo '<td align="center">';
							echo '<a href="update.php?id='.$row["id"].'">Edit</a>';
							echo '</td>';
							echo '<td align="center">';
							echo '<span class="delete" id="del_'.$row["id"].'" >Delete</a>';
							echo '</td>';
							echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
		 
	 ?>
			
			</div>
		</div>
		
	</body>
</html>

