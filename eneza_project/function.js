$(function() {
	
	var functionName="GetProducts";	
	// alert(functionName);

	// Get products
	function LoadData(){
		// loaderShow();
		// alert("LoadData");
		$.getJSON("http://localhost/eneza_project/api.php?function="+functionName+"&jsonCallback=?", function(data){
			console.log(data);
			// alert('gotJSON');
			var all_data=[];
			$.each(data, function(key,name){
				var array_data='<div class="row">'+key+':'+name+'</div>';
				all_data.push(array_data);
			})
			$('#results').append(all_data);
		});
	}

	LoadData();
});