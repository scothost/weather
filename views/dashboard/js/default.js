$(function(){

	$.get('dashboard/xhrGetListings', function(o){
	
		//console.log(o[0].text);
		//alert(jQuery.fn.jquery);
				
		for (var i = 0; i < o.length; i++ )
		{
			$('#listInserts').append('<div>' + o[i].text + '<a class="del" rel="' + o[i].id + '" href="#"> x</a></div>');
		}
	
		$('.del').on("click", function() {
			var delItem = $(this);
			var id = $(this).attr('rel');
			//alert(1);
			
			//console.log(delItem);
			//console.log(id);
			
			//delItem.parent().remove();
				
			//SYNTAX:	$.post(URL,data,callback);
			$.post('dashboard/xhrDeleteListing',  function() {
					delItem.parent().remove();
					//alert(1);// this method is never executed...
					//console.log(id);
			}, 'json');
			
			return false;
		});
	
	}, 'json');
	
	$('#randomInsert').on("submit", function(event) {
		event.preventDefault(); //stackoverflow
		var url = $(this).attr('action');
		var data = $(this).serialize();
		
		var dump = $(this);
		console.log(dump);
		
		$.post(url, data, function(o) {
			$('#listInserts').append('<div>' + o.text + ' <a class="del" rel="' + o.id + '" href="#">[X]</a></div>');
		}, 'json');
		
		return false;
	});
	
	
});