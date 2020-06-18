 <?php
if(isset($_POST['id'])) {
	//verification
	$id=$_POST['id'];
	echo $id;
	
	//connect to db 
		
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$dbname ="recipes";
		
	$MS = 'mysql:host='.$servername.';dbname='.$dbname;
	$PDO = new PDO($MS, $user, $pass);
		
	$responseSet= $PDO->prepare("delete FROM recipes where id =:id");
	$responseSet->execute(['id' => $id]);
	

	if($responseSet) {
		header("Location: view.php"); 
	}
} else {
	$mess = "Something went wrong";
}
?>