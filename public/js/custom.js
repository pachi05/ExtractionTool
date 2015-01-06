$(document).ready(function($) {
	var f = $("#form-export-csv");

	f.submit(function() {
		$.ajax({
			type: "POST",
			url: f.attr("action"),
			data: f.serialize(),
			success: function(r) {
				if(r.length > 0) {
					if(r.status == 'success') {
						window.location.href = window.location.origin + '/generatedResults';
					}
				}
			}
		});
	})
});