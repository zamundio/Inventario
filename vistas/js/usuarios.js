/*********************************** */
/**SUBIENDO LA FOTO DEL USUARIO      *
 *************************************/
$(".nuevaFoto").change(function() {
    var imagen = this.files[0];
    console.log("imagen", imagen);
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
    var idUsuario = $(this).attr("idusuario");
    var datos = new FormData();
    datos.append("idusuario", idUsuario);
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
        }


    })



})