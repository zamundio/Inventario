/*=============================================
SideBar Menu
=============================================*/

$('.sidebar-menu').tree()

/*=============================================
Data Table
=============================================*/

$(".tablas").DataTable({
    "bFilter": true,

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
activacion del popover
=============================================*/
$(document).popover({
    selector: '[data-toggle=hover]',
    html: true,
    trigger: 'hover'

});
/*=============================================
SELECCION DE LA LINEA EN AZUL EN DATATABLE
=============================================*/

var hlr = 0; // Reference to the currently highlighted row

function rowClick() {
    if (hlr)
        $("td:first", hlr).parent().children().each(function() {
            $(this).removeClass('markrow');
        });
    hlr = this;
    $("td:first", this).parent().children().each(function() {
        $(this).addClass('markrow');
    });

    // You can pull the values out of the row here if required
    var a = $("td:first", this).text();
    var b = $("td:eq(1)", this).text();
    // alert("One = " + a + ", Two = " + b);
}