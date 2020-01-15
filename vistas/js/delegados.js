/*=============================================
EDITAR DELEGADOS
=============================================*/
$(".tablas").on("click", ".btnEditarDelegado", function() {

    var idDelegado = $(this).attr("idDelegado");




    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "idDelegado": idDelegado
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "ajax/delegados.ajax.php",
        })
        .done(function(respuesta, textStatus, jqXHR) {
            console.log(respuesta);
            console.log("La solicitud ha FUNCIONADO: " + textStatus);
            $("#editarNombre").val(respuesta["Nombre"]);
            $("#editarApellidos").val(respuesta["Primer Apellido"]);
            $("#editarEmail").val(respuesta["Email"]);
            $("#editarGA").val(respuesta["NomGer"]);
            $("#editarLinea").val(respuesta["Linea"]);
            $("#editarSIM").val(respuesta["SIM"]);
            $("#editarPIN").val(respuesta["PIN"]);
            $("#editarPUK").val(respuesta["PUK"]);

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });



})

$(".CheckSIM").change(function() {
    $(".alert").remove();
    $NumeroSIM = $(this).val();

    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "NumeroSIM": $NumeroSIM
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "ajax/delegados.ajax.php",
        })
        .done(function(respuesta, textStatus, jqXHR) {
            console.log(respuesta);
            console.log("La solicitud ha FUNCIONADO: " + textStatus);
            if (respuesta) {
                $("#editarSIM").parent().after('<div class="alert alert-warning">Esta numeración ya existe en la base de datos</div>');
                $("#editarSIM").val("");
            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });




});