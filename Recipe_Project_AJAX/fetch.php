 <?php
	if(isset($_POST['type'])) {
		//Get form data
		$type=$_POST['type'];
		//echo $type;
			
			//connect to db 
			$servername = "localhost";
				$user = "root";
				$pass = "";
				$dbname = "recipes";
				
				$MS = 'mysql:host='.$servername.';dbname='.$dbname;
				$PDO = new PDO($MS, $user, $pass);
			
		$resultQuery= $PDO->prepare("select * FROM recipes where type =:type");
		$resultQuery->execute(['type' => $type]);
		
		echo '<table width="100%" border="1" class="myTable">';
		echo '<thead>';
		echo '<tr>';
		echo '<th><strong>Name</strong></th>';
		echo '<th><strong>Type</strong></th>';
		echo '<th><strong>Difficulty</strong></th>';
		echo '<th><strong>Recipe</strong></th>';
		echo '<th><strong>Edit</strong></th>';
		echo '<th><strong>Delete</strong></th>';
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
	}
 
 ?>
 <html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script src="scripts.js"></script>
<link href="myStyle.css" rel="stylesheet" type="text/css"/>
 </html>
 
