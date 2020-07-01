	$(document).ready(function() {
	    $('#upload_csv').on('submit', function(event) {
	        event.preventDefault();
	        $.ajax({


	            //Cambiar a type: POST si necesario
	            type: "POST",
	            // Formato de datos que se espera en la respuesta
	            dataType: "json",
	            // URL a la que se enviará la solicitud Ajax
	            url: "ajax/importcsv.ajax.php",
	            contentType: false,
	            cache: false,
	            processData: false,
	            success: function(jsonData) {
	                $('#csv_file').val('');
	                $('#data-table').DataTable({
	                    data: jsonData,
	                    columns: [{
	                            data: "student_id"
	                        },
	                        {
	                            data: "student_name"
	                        },
	                        {
	                            data: "student_phone"
	                        }
	                    ]
	                });
	            }
	        });
	    });
	});
