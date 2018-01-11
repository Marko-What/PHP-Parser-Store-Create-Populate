<?php
	include_once("databaseConnection.php");
	
?>

<?php 
	
	/* on find button submit*/
	if($_POST['find']){ 
		

		if($_POST['selectSearch'] == "name"){ 
			$AndCompare = "NameSurname.name";
			/* fetch the vale from the input field using php super globals */
			$AndValue = $_POST['searchInput'];
			/*$AndValue = 'fakeName96';*/
			/*echo $AndValue;*/
			$Searchquery1  = "SELECT items.*, NameSurname.surname ";
			$Searchquery1 .= "FROM items, NameSurname ";
			$Searchquery1 .= "WHERE items.BuyerID = NameSurname.BuyerID ";
			$Searchquery1 .= "AND {$AndCompare}= '{$AndValue}'";
			global $connection;
			$Searchquery = mysqli_query($connection, $Searchquery1);
			// test if there is some query error ...
			if (!$Searchquery){
				die("database connection query failed234");
			}
		}


		if($_POST['selectSearch'] == "surname"){ 
			$AndCompare = "NameSurname.surname";
			$AndValue = $_POST['searchInput'];
			/*$AndValue = 'fakeSurname6';*/	
			
			$Searchquery1  = "SELECT items.*, NameSurname.surname ";
			$Searchquery1 .= "FROM  items, NameSurname ";
			$Searchquery1 .= "WHERE items.BuyerID = NameSurname.BuyerID ";
			$Searchquery1 .= "AND {$AndCompare}= '{$AndValue}'";
			global $connection;
			$Searchquery = mysqli_query($connection, $Searchquery1);
			// test if there is some query error ...
			if (!$Searchquery){
				die("database connection query failed234");
			}

		}


		if($_POST['selectSearch'] == "saleDate"){ 
			/*$AndCompare = "NameSurname.saleDate";
			$AndValue = 'fakeSurname6';*/
			/*echo "SaleDate";*/
			
			$AndValue = $_POST['searchInput'];
			/*$AndValue = 'fakeSurname6';*/	
			
			$Searchquery1  = "SELECT * ";
			$Searchquery1 .= "FROM items ";
			$Searchquery1 .= "WHERE SaleDate = '{$AndValue}' ";
			

			global $connection;
			$Searchquery = mysqli_query($connection, $Searchquery1);
			// test if there is some query error ...
			if (!$Searchquery){
				die("database connection query failed234");
			}
		}



	} /* if POST Find */

	

?>
