var to = false;

//funcion que busca en el arbol al introducir un caracter(es) en el textbox
$('#busqueda_tree').keyup(function() {
    if (to) {
        clearTimeout(to);
    }
    to = setTimeout(function() {
        var v = $('#busqueda_tree').val();
        console.log(v);
        $('#tree-container').jstree(true).search(v);
    }, 250);
});

//Scroll del arbol para que no se salga del contenedor al expandir el arbol
$('#tree-container').slimScroll({
    height: '500px'
});

$("#TablaLinkedItems").DataTable({
    data: [],
    columns: [{
            "data": "Observ"
        },
        {
            "data": "NS"
        },
        {
            "width": "200",
            "data": "Modelo"
        },
        {
            "data": "Tipo"
        },

        {
            "data": "Localizacion"
        },

        {
            "data": "Estado"
        }
    ],
    /*"ajax": "ajax/DataTableLinkedItems.ajax.php",*/
    "deferRender": true,
    "retrieve": false,
    "searching": false,
    "paging": false,
    "info": false,
    "order": [
        [3, "desc"]
    ],
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
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",

        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

});
//Funcion que se lanza al seleccionar un nodo
$("#tree-container").on("click.jstree", function(e, data) {
    $CurrentNode = $("#tree-container").jstree("get_selected");

    CurrentNodetoPHP($CurrentNode);

    if ($CurrentNode != "1" && $CurrentNode != "[]") {
        $("#formdata").css('display', 'block');
    } else {
        $("#formdata").css('display', 'none');
    }


});


$(document).ready(function() {
    //plugins para la busqueda en el arbol
    $('#tree-container').jstree({

        plugins: ['search', 'changed'],
        search: {
            "case_insensitive": true,
            show_only_matches: true
        },
        'core': {
            'data': {
                "url": "ajax/tree_data.php",
                contentType: "application/x-javascript; charset:utf-8",
                "dataType": "json" // needed only if you do not supply JSON headers
            }
        }



    })



})


/*=============================================
activacion del popover
=============================================*/
$(document).popover({
    selector: '[data-toggle=hover]',
    html: true,
    trigger: 'hover'

});

async function CurrentNodetoPHP($node) {

    var v = "";
    $.ajax({
            url: "ajax/DataTableLinkedItems.ajax.php",
            type: "POST",
            data: {
                'CurrentNode': $node
            }

        })
        .done(function(data, textStatus, jqXHR) {
            console.log(data);
            $("#TablaLinkedItems").DataTable().clear().draw();
            $("#TablaLinkedItems").DataTable().rows.add(
                [{
                    "Observ": "fdgdfg",
                    "NS": "FVFY11JJJK77",
                    "Modelo": "MacBook Air (Retina, 13-inch, 2018)",
                    "Tipo": "Tablet",
                    "Localizacion": "Colaborador",
                    "Estado": "Asignado"
                }, {
                    "Observ": "fdgfdg",
                    "NS": "TH7AS490KV",

                    "Modelo": "Hp Officejet 5230",
                    "Tipo": "Impresora",

                    "Localizacion": "Colaborador",

                    "Estado": "Asignado"
                }]
            ).draw();


        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        })

}