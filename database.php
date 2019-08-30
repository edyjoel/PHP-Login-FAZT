<?php  


$server = 'localhost';
$name = 'root';
$password = 'root';
$database = 'login';

try {
	$connect = new PDO(
		"mysql:host=$server;dbname=$database;", 
		$name, 
		$password
	);
} catch (PDOException $e) {
	die('Connected failed '. $e->getMessage() );
}




?>