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
	
	function databaseInsert($data1, $data2, $data3, $data4, $data5, $data6){

	$query = "INSERT INTO items (ColumnField1, ColumnField2, ColumnField3, ColumnField4, ColumnField5, ColumnField6) VALUES({$data1}, {$data2}, {$data3}, {$data4}, '{$data5}', '{$data6}')";
		
	
		
	global $connection;
	$result = mysqli_query($connection, $query);

	} /* end of databaseInsert function ... */



	function fakeNameSurnameGeneratorandPopulate($buyerId, $x){
					
		$Fakename = "fakeName{$x}";
		$FakeSurname = "fakeSurname{$x}";
		
		$query = "INSERT INTO NameSurname (BuyerID, name, surname) VALUES({$buyerId}, '{$Fakename}', '{$FakeSurname}')";
		
		global $connection;
		$result = mysqli_query($connection, $query);
	}




	function fetchResourceValue($urlParse){

		$url = $urlParse;
		
		$content = file_get_contents($url);
		
		$contentExplodes12 = explode('<br>', $content);
		
	 	$counting = count($contentExplodes12);

		
		
		for ($x = 1; $x <= $counting; $x++) {
		  	
			$propsItems = explode(',', $contentExplodes12[$x]);
			echo "<br />";
			echo "<hr>";
			$ItemsList[] = $propsItems;
			
			fakeNameSurnameGeneratorandPopulate($propsItems['2'], $x);
		
		} 

		
		/*var_dump($ItemsList);*/
	
	}

	fetchResourceValue("www.sampleResource.com/dataToFetch");
?>
