<?php
$servername = "localhost";
$user       = "root";
$pass       = "";
$dbname     = "recipes";

$MS = 'mysql:host='.$servername.';dbname='.$dbname;
$PDO = new PDO($MS, $user, $pass);

$deleteTable = $PDO->query("DROP TABLE recipes");

header('location:view.php');

?>