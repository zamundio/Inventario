/* Recoge el codigo de la Categoria  al pulsar en el boton de EditarCategoria*/
$(".tablas").on("click", ".btnEditarCategoria", function() {

    idCategoria = $(this).attr("idCategoria");


    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "idCat": idCategoria
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "ajax/categorias.ajax.php",
        })
        .done(function(data, textStatus, jqXHR) {
            if (console && console.log) {
                console.log("La solicitud se ha completado correctamente.");
                console.log(data);
                $("#editarCategoria").val(data["Categoria"]);
                $("#idCategoria").val(data["id"]);
                $("#editarDescripcion").val(data["Descripción"]);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });
});

/*=============================================
REVISAR SI lA CATEGORIA YA ESTÁ REGISTRADA
=============================================*/
$("#nuevaCategoria").change(function() {

    $(".alert").remove();
    Categoria = $(this).val();



    console.log(Categoria);
    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "Categoria": Categoria
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "ajax/categorias.ajax.php",
        })
        .done(function(data, textStatus, jqXHR) {
            if (console && console.log) {
                console.log("La solicitud se ha completado correctamente.");
                if (data) {
                    $("#nuevaCategoria").parent().after('<div class="alert alert-warning">Esta categoria ya existe en la base de datos</div>');
                    $("#nuevaCategoria").val("");
                }


            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });
});
/*=============================================
ELIMINAR CATEGORIAS
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function() {

    var idCategoria = $(this).attr("idCategoria");
    var fotoCategoria = $(this).attr("fotoCat");
    var categoria = $(this).attr("categoria");


    swal({
        title: '¿Está seguro de borrar la categoria?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoria!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=categorias&idCategoria=" + idCategoria + "&categoria=" + categoria + "&fotoCat=" + fotoCategoria;

        }

    })

})
