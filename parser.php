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

		/* sanitize fetched data */

	/*$data1_dirty = $_POST['$data1'];*/
	$data1_dirty = $data1;
	$data1=filter_var($data1_dirty, FILTER_SANITIZE_STRING);

	/*$data2_dirty = $_POST['$data2'];*/
	$data2_dirty = $data2;
	$data2=filter_var($data2_dirty, FILTER_SANITIZE_STRING);

	/*$data3_dirty = $_POST['$data3'];*/
	$data3_dirty = $data3;
	$data3=filter_var($data3_dirty, FILTER_SANITIZE_STRING);

	/*$data4_dirty = $_POST['$data4'];*/
	$data4_dirty = $data4;	
	$data4=filter_var($data4_dirty, FILTER_SANITIZE_STRING);

	/*$data5_dirty = $_POST['$data5'];*/
	$data5_dirty = $data5;
	$data5=filter_var($data5_dirty, FILTER_SANITIZE_INTEGER);

	/*$data6_dirty = $_POST['$data6'];*/
	$data6_dirty = $data6;
	$data6=filter_var($data6_dirty, FILTER_SANITIZE_STRING);

		
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
