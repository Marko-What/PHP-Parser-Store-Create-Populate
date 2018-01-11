/*confirm('ready');*/

(function(){
	
})();

$("a.btn").on('click', function(){
	confirm('ajax0 ...');
	$("div#div1").css('background-color', "yellow");
	      /*$("div#div1").html(result);*/
		confirm('ajax1 ...');
 		$("div#div1").load("demo_test.txt");

        });


$('th#click').on('click', function(){
	/*confirm('click ...');*/
	$("div#div1").css('background-color', "yellow");
	$("div#div1").load("demo_test.txt");

	

});

$('input#search').on('click', function(){
	confirm('click ...');
	inputVal = $('input#searchInput').val();
	
	 $.ajax({url:"fetch.php", 
		method:"POST", 
		data:{surname:"fgffgf"},
		dataType:"JSON", 	 	
		success: function(result){
           	 $("div#div1").html(result);
		confirm('click ..dsds.');
        }});
});
