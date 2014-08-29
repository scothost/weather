$(function() {

	$.get('dashboard/xhrGetListings', function(o){
				
		for (var i = 0; i < o.length; i++)
		{
			// console.log(i);
			// console.log(o[i]);
			$('#listInserts').append('<div>' + o[i].text + '<a class="del" rel="'+o[i].dataid+'" href="#">X</a></div>');
		}
	
		$('.del').on("click", function() {
			var delItem = $(this);
			var id = $(this).attr('rel');
			
			// console.log(delItem);
			// console.log(id);
			
			//delItem.parent().remove();
				
			//SYNTAX:	$.post(URL,data,callback);
			$.post('dashboard/xhrDeleteListing', {'id': id}, function() {
					delItem.parent().remove();
					alert(1);// this method is never executed...
					//console.log(id);
			}, 'json');
			
			return false;
		});
	
	}, 'json');
	
	//$('#randomInsert').on("submit", function(event) {
	$('#randomInsert').submit(function() {
		//event.preventDefault(); //stackoverflow
		var url = $(this).attr('action');
		var data = $(this).serialize();
		
		// var dump = $(this);
		// console.log(dump);
		
		$.post(url, data, function(o) {
			$('#listInserts').append('<div>' + o.text + ' <a class="del" rel="' + o.dataid + '" href="#">[X]</a></div>');
		}, 'json');
		
		return false;
	});
	
	
});