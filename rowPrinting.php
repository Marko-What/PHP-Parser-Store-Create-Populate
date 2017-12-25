<?php
	include_once("databaseConnection.php");
	
?>

<?php 
if(mysqli_connect_errno()){ //it return null or error number
	echo " trying to establish ... connection to database failed ...";
	die("connection failed: ". mysqli_connection_error() . "(" . mysqli_connect_errno() .")"
);	
} 
?>

<?php

	function itemsRows(){
	
	$query = "SELECT * ";
	$query .= "FROM items ";
	
		
	 		
	
	global $connection;
	$result = mysqli_query($connection, $query);
	// test if there is some query error ...
	if (!$result){
		die("database connection query failed");
	}
		
	var_dump($result);
	
	}
	itemsRows();
?>
