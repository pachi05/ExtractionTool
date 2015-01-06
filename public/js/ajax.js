$(document).ready(function() {
	$("#generateReport").submit(function(e) {
		e.preventDefault();

		$.ajax({
			url: '{{url("/")}}',
			type: 'POST',
			dataType:  'json',
			data: $('')
			success: function(data) {
				if(data['success']) {
					$(data.records).each(function(i,item) {
						alert('it works!');
					})
				}
			}
		});



		return false;
	});

});