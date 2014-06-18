$(function(){

	$.get('dashboard/xhrGetListings', function(o){
	
		console.log(o[0].text);
		
		for (var i = 0; i < o.length; i++ )
		{
			$('#listInserts').append('<div>' + o[i].text + '<a class="del" rel="' + o.id + '" href="#">x</a></div>');
		}
	
	
		$('.del').live('click', function() {
		
			delItem = $(this);
			var id = $(this).attr('rel');
			
			$.post('dashboard/xhrDeleteListing', {'id' : id }, function(o) {
		
				//$('#listInserts').append('<div>' + o.text + '<a class="del" rel="' + o.id + '" href="#">x</a></div>');
				delItem.parent().remove();
			}, 'json');
			
			return false;
			
		});
	
	
	}, 'json');
	
	
	$('#randomInsert').submit(function() {
		var url = $(this).attr('action');
		var data = $(this).serialize();
		//console.log(data);
		
		$.post(url, data, function(o) {
		
			$('#listInserts').append('<div>' + o.text + '<a class="del" rel="' + o.id + '" href="#">x</a></div>');
			
		}, 'json');
		
		
		return false;
	});
	

	
});