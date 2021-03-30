$(document).ready(function() {
			$("#search").keyup(function() {
				var query = $("#search").val();
				
				if (query.length > 0) {
					console.log(query);
					$.ajax({
						url: 'o_search.php',
						type: 'POST',
						dataType: 'text',
						data: {search: 1, q: query},
						success:function(data){
							console.log(data);
							$("#response").html(data);
						}
					})
					.done(function() {
						console.log("success");
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
					
				}else{
					console.log(query);
					$.ajax({
						url: 'o_search.php',
						type: 'POST',
						dataType: 'text',
						data: {search: 1, q: query},
						success:function(data){
							console.log(data);
							$("#response").html('');
						}
					})
					.done(function() {
						console.log("success");
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
				}
			});
			$(document).on('click', '.barra_lista', function() {
				var izena = $(this).text();
				$("#search").val(izena);
				$("#response").html('');
			});
		});