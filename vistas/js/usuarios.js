/*********************************** */
/**SUBIENDO LA FOTO DEL USUARIO      *
 *************************************/
$(".nuevaFoto").change(function() {
    var imagen = this.files[0];

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        Swal({
            type: "error",
            title: "La imagen debe ser JPG o PNG",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeonCornfirm: true
        })

    } else if (imagen["size"] > 2000000) {
        Swal({
            type: "error",
            title: "La imagen debe ser inferior a 2 Mb",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeonCornfirm: true
        })
    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function(event) {

            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);

        })
    }

})

$(".btnEditarUsuario").click(function() {
    var idUsuario = $(this).attr("idUsuario");
    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("respuesta", respuesta);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $(".previsualizar").attr("src", respuesta["foto"]);
            if (respuesta["foto"] != "") {
                $("#fotoActual").val(respuesta["foto"]);
                $("#editarPerfil").val(respuesta["perfil"]);
            } else {
                $(".previsualizar").attr("src", "vistas/img/usuarios/default/anonymous.png");
            }
            $("#passwordActual").val(respuesta["password"]);
        }


    })

})

/**ACTIVAR USUARIO */
$(".btnActivar").click(function() {
    var idActivar = $(this).attr("idUsuario");
    var estado = $(this).attr("estadoUsuario");
    var datos = new FormData();
    datos.append("ActivarId", idActivar);
    datos.append("activarUsuario", estado);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    })

    location.reload();

})