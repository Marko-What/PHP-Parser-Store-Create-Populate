<?php
	include_once("databaseConnection.php");
	include_once("pagination.php");
	include_once("fetch.php");
	

?>

<?php 
if(mysqli_connect_errno()){ //it return null or error number
	echo " trying to establish ... connection to database failed ...";
	die("connection failed: ". mysqli_connection_error() . "(" . mysqli_connect_errno() .")"
);	
} 
?>

<?php 

global $connection;
	$result = mysqli_query($connection, $query);
	// test if there is some query error ...
	if (!$result){
		die("database connection query failed");
	}

?>
<!DOCTYPE html>
<html>
<head>
	
	<script src="jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>



<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

-->
</head>
<body>
<div class="container">
	<div style="height: 20px;"></div>
	<div class="row">
	<div class="col-lg-2">
	</div>
	<div class="col-lg-8">

	<form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>" id="searchForm">
	  Search: <input type="text" name="searchInput" id="searchInput">
	<select name="selectSearch">
	  <option value="name" name="name">Name</option>
	  <option value="surname" name="surname">Surname</option>
	  <option value="saleDate" name="saleDate">SaleDate</option>
	</select>
	  <input type="submit" value="find" name="find" id="search">
	</form> 
	</br> 


	<table width="80%" class="table table-striped table-bordered table-hover">
		<thead>
			 <th>column1</th>

			  <th id="click">column2</th>

			  <th>column3</th>
			  
			  <th>column4</th>

			  <th>column5</th>

			  <th>column6</th>

	 		  <th>column7</th>
		</thead>
		<tbody>
		<?php
		
			if($_POST['selectSearch']){$nquery = $Searchquery;}
			
		
			while($crow = mysqli_fetch_array($nquery)){
			?>
				<tr>
					<td><?php echo $crow['name_refernce1']; ?></td>
					<td><?php echo $crow['name_refernce2']; ?></td>
					<td><?php echo $crow['name_refernce3']; ?></td>
					<td><?php echo $crow['name_refernce4']; ?></td>
					<td><?php echo $crow['name_refernce5']; ?></td>
					<td><?php echo $crow['name_refernce6']; ?></td>
					<td><?php echo $crow['name_refernce7']; ?></td>
				</tr>
			<?php
			}		
		?>
		</tbody>
	</table>
	<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
	</div>
	<div class="col-lg-2">
	</div>
	</div>
</div>


<div id="div1">
</div>
<!-- end of div1 -->

</body>


<script src="ajaxNavigation.js"></script>
</html>
