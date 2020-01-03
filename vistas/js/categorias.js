/*********************************** */
/**SUBIENDO LA FOTO DE LA CATEGORIA      *
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


/**ACTIVAR CATEGORIA */
$(document).on("click", ".btnActivarCat", function() {
    var idActivar = $(this).attr("idCategoria");
    var estado = $(this).attr("estadoCategoria");

    var datos = new FormData();
    datos.append("ActivarId", idActivar);
    datos.append("activarCategoria", estado);
    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log("respuesta", respuesta);
            /* Una vez Activado/Desactivado el boton, se recarga la pagina */
            if (windows.matchMedia("(max-width:767px)").matches) {


                window.location = "categorias";
            }
        }
    })
    if (estado == 1) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoCategoria', 2);
    } else {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activado');
        $(this).attr('estadoCategoria', 1);

    }


})