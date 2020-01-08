$(".tablas").on("click", ".btnEditarCategoria", function() {

    idCategoria = $(this).attr("idCategoria");

    var datos = new FormData();
    datos.append("Categoria", 'Tablets');


    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "idCat": 1
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
