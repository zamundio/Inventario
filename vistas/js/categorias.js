/*=============================================
SUBIENDO LA FOTO DE LA categoria
=============================================*/
$(".nuevaFotoCat").change(function() {

    var imagen = this.files[0];

    /*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFotoCat").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFotoCat").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

            var rutaImagen = event.target.result;


            $(".previsualizarcat").attr("src", rutaImagen);


        })

    }
})



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


                $("#editarCategoria").val(data["Categoria"]);
                $("#idCategoria").val(data["id"]);
                $("#editarDescripcion").val(data["Descripción"]);
                $("#editarFotoCat").val(data["foto"]);
                console.log(data["foto"]);
                if (data["foto"] != "") {

                    $(".previsualizarcat").attr("src", data["foto"]);

                } else {
                    $(".previsualizarcat").attr("src", "vistas/img/categorias/default/categories.png")
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
ACTIVAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnActivarCat", function() {

    var idCat = $(this).attr("idCategoria");
    var estadoCat = $(this).attr("estadoCategoria");



    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "ActivaridCat": idCat,
                "estadoCat": estadoCat
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta

            // URL a la que se enviará la solicitud Ajax
            url: "ajax/categorias.ajax.php",
        })
        .done(function(data, textStatus, jqXHR) {
            console.log(data);
            console.log("La solicitud ha FUNCIONADO: " + textStatus);

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });
    if (estadoCat == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoCategoria', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoCategoria', 0);

    }

})



/*=============================================
REVISAR SI lA CATEGORIA YA ESTÁ REGISTRADA
=============================================*/
$("#nuevaCategoria").change(function() {

    $(".alert").remove();
    Categoria = $(this).val();




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