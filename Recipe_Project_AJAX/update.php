<?php
$id = null;
if(isset($_GET['id'])) {
	//verification
	$id=$_GET['id'];
	
	//connect to db 
		
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$dbname ="recipes";
		
	$mysqli = new MySQLi($servername, $user, $pass, $dbname);
		
	$resultQuery= $mysqli->query("select * FROM recipes where id = '$id'");
	
	if($resultQuery->num_rows!=0) {	
		$row=$resultQuery->fetch_assoc(); //Returns an associative array of strings representing the fetched row
	}

} else {
	$mess = "Something went wrong";
}


?>

<html>
    <head>
        <link href="myStyle.css" rel="stylesheet" type="text/css" />
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
            <h1>Update Recipe</h1>
        </header>

        <div>
            <form method="post" action="">
                <table border="0" align="center" cellpadding="5" class="myTable">
                    <tr>
                        <td align="right">Name:</td>
                        <td><input type="TEXT" name="name" id="name" required value="<?php echo $row['name'];?>" /></td>
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
                        <td><input type="TEXT" name="difficulty" id="difficulty" required value="<?php echo $row['difficulty'];?>" /></td>
                    </tr>
                    <tr>
                        <td align="right">Recipe:</td>
                        <td><input type="TEXT" name="recipe" id="recipe" required value="<?php echo $row['recipe'];?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 330px;"><input type="SUBMIT" class="update_btn" id="upd_<?php echo $row["id"]; ?>" name="submit" value="Update recepie" required/></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
