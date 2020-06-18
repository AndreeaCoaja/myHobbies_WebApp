<?php
//connect to db 

$servername = "localhost";
$user       = "root";
$pass       = "";
$dbname     = "recipes";

$MS = 'mysql:host='.$servername.';dbname='.$dbname;
$PDO = new PDO($MS, $user, $pass);


$createTable = $PDO->query("create table recipes(
            id INT AUTO_INCREMENT,name VARCHAR(30), recipe VARCHAR(120), type varchar(30), difficulty varchar(30), primary key (id))");

header('location:view.php');
?>