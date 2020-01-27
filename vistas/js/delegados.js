$('.selectpicker').selectpicker({
    style: 'btn-default'
});

/*$.ajax({

        url: "ajax/DataTableDelegados.ajax.php",
        success: function(respuesta) {

            console.log("respuesta", respuesta);

        }

    })*/
/*=============================================
CARGA DINAMICA DE LOS DELEGADOS
=============================================*/
var Tabladelegados = $('.TablaDelegados').DataTable({
    "ajax": "ajax/DataTableDelegados.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

});

/*=============================================
Se refrescan los valores de los combos al iniciar
=============================================*/
$("#SelectJV").val('default').selectpicker("refresh");
$("#SelectGA").val('default').selectpicker("refresh");

/*=============================================
Si la JV esta vacia, se recarga la lista de GA
=============================================*/
$("#SelectJV").on('change', function() {

    if ($('#SelectJV > option:checked').val() == "") {
        $("#SelectGA").val('default').selectpicker("refresh");


    }

})

/*=============================================
BUSCAR GA POR JV
=============================================*/
$("#submitJV").click(function() {
    $SelectGA = $("#SelectGA");
    $idJV = $('#SelectJV > option:checked').val();

    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "IdJV": $idJV
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "ajax/delegados.ajax.php",
        })
        .done(function(data, textStatus, jqXHR) {
            console.log(data);
            console.log("La solicitud de JV ha FUNCIONADO: " + textStatus);

            $("#SelectGA").find('option').remove();
            $("#SelectGA").append('<option data-tokens = "*" value="*"> </option>');
            $(data).each(function(i, v) {

                $("#SelectGA").append('<option value=' + v.Codigo +
                    '>' + v["Primer Apellido"] +
                    '</option>').selectpicker('refresh');

            })
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });





});

/*=============================================
BUSCAR DELEGADOS POR GA
=============================================*/
$("#submitGA").click(function() {
    $idJV = $('#SelectJV > option:checked').val();
    $idGA = $('#SelectGA > option:checked').val();
    var busq = "";
    if ($idGA == "*") {
        busq = $idJV;

    } else {
        busq = $idGA;




    }

    Tabladelegados

        .column(8)
        .search(busq)
        .draw();


})



/*=============================================
EDITAR DELEGADOS
=============================================*/
$(".TablaDelegados").on("click", ".btnEditarDelegado", function() {

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
            /*console.log(respuesta);
            console.log("La solicitud ha FUNCIONADO: " + textStatus);*/
            $("#codigoDel").val(respuesta["Codigo"]);
            $("#editarNombre").val(respuesta["Nombre"]);
            $("#editarApellidos").val(respuesta["Primer Apellido"]);
            $("#editarEmail").val(respuesta["Email"]);
            $("#editarGA").val(respuesta["NomGer"]);
            $("#editarLinea").val(respuesta["Linea"]);
            $("#editarNumTelf").val(respuesta["Movil"]);
            $("#editarSIM").val(respuesta["SIM"]);
            $("#SIMactual").val(respuesta["SIM"]);
            $("#editarPIN").val(respuesta["PIN"]);
            $("#editarPUK").val(respuesta["PUK"]);

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });



})

/*=============================================
EDITAR SIM (COMPROBAR NO REPETIDA)
=============================================*/

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
            /* console.log(respuesta);
             console.log("La solicitud ha FUNCIONADO: " + textStatus);*/
            if (respuesta) {
                $("#editarSIM").parent().after('<div class="alert alert-warning">Esta numeración ya existe en la base de datos</div>');
                $("#editarSIM").val($("#SIMactual").val());
            } else {

            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });
});
/*=============================================
EDITAR TELF (COMPROBAR NO REPETID0)
=============================================*/
$(".CheckTelf").change(function() {
    $(".alert").remove();
    $NumeroTelf = $(this).val();

    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "NumeroTelf": $NumeroTelf
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "ajax/delegados.ajax.php",
        })
        .done(function(data, textStatus, jqXHR) {
            /*console.log(data);
            console.log("La solicitud de telefono ha FUNCIONADO: " + textStatus);*/
            if (data) {
                $("#editarNumTelf").parent().after('<div class="alert alert-warning">Esta telefono ya existe en la base de datos</div>');
                $("#editarNumTelf").val($("#TelfActual").val());

            } else {

            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });




});