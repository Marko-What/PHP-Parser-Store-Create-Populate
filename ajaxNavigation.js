
$('input#search').on('click', function(){
	confirm('click ...');
	inputVal = $('input#searchInput').val();
	
	 $.ajax({url:"fetch.php", 
		method:"POST", 
		data:{dataValue:"retrieved using php super globals"},
		dataType:"JSON", 	 	
		success: function(result){
           	 $("div#div1").html(result);
        }});
});
