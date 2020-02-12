var to = false;

//funcion que busca en el arbol al introducir un caracter(es) en el textbox
$('#busqueda_tree').keyup(function() {
    if (event.keyCode == 13) {
        event.preventDefault();
    } else {
        if (to) {
            clearTimeout(to);
        }
        to = setTimeout(function() {
            var v = $('#busqueda_tree').val();
            console.log(v);
            $('#tree-container').jstree(true).search(v);
        }, 250);
    }
});
$('busqueda_tree').keypress(function(event) {
    if (event.keyCode == 13) {
        event.preventDefault();
    }
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
        },
        {
            "data": "Acciones"
        }
    ],
    /*"ajax": "ajax/DataTableLinkedItems.ajax.php",*/
    "deferRender": true,
    "retrieve": false,
    "searching": false,
    "paging": false,
    "info": true,
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

    if ($CurrentNode[0] != 1 && $CurrentNode[0] != "" && $CurrentNode[0] != 3010 && $CurrentNode[0] != 892 && $CurrentNode[0] != 1907 && $CurrentNode[0] != 3384 && $CurrentNode[0] != 1826 && $CurrentNode[0].length > 0) {
        $("#formdata").css('display', 'block');
    } else {
        $("#formdata").css('display', 'none');
    }

    //recupera la informacion de la ficha del delegado

    $cod = $CurrentNode[0];
    console.log($cod);
    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "COD": $cod
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "ajax/DataTableLinkedItems.ajax.php",
        })
        .done(function(respuesta, textStatus, jqXHR) {
            console.log(respuesta);
            console.log("La solicitud NS: " + textStatus);
            $("#Codigo").val(respuesta["Codigo"]);
            $("#Nombre").val(respuesta["Nombre"]);
            $("#Apellidos").val(respuesta["Primer Apellido"]);
            $("#fechaalta").val(respuesta["Fecha de Alta"]);
            $('#linea').val(respuesta["Linea"]);
            $('#dni').val(respuesta["DNI"]);
            $('#telefono').val(respuesta["Telf"]);
            $('#direccion').val(respuesta["Direccion"]);
            $('#poblacion').val(respuesta["Poblacion"]);
            $('#cp').val(respuesta["CP"]);
            $('#provincia').val(respuesta["Provincia"]);
            $('#telefonoemp').val(respuesta["Telf"]);
            $('#abrev').val(respuesta["EXTENSION"]);
            $('#email').val(respuesta["Email"]);
            $('#chkuser').val(respuesta["ChkUser"]);
            $('#chkpwd').val(respuesta["ChkPwd"]);
            $('#sim').val(respuesta["SIM"]);
            $('#pin').val(respuesta["PIN"]);
            $('#puk').val(respuesta["PUK"]);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });



});


$(document).ready(function() {

    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });


    //plugins para la busqueda en el arbol
    $('#tree-container').jstree({

        plugins: ['search', 'changed', 'state'],
        'state': {
            'key': 'id',
            'events': 'activate_node.jstree'
        },
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
            datajson = JSON.parse(data);

            if (data.length > 4) {
                $("#TablaLinkedItems").DataTable().clear().draw();
                $("#TablaLinkedItems").DataTable().rows.add(datajson).draw();
            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        })

}
/*=============================================
  EDITAR INVENTARIO DESDE ESTRUCTURA
  =============================================*/
$(".TablaLinkedItems").on("click", ".btnEditarEstructura", function() {

    var NS = $(this).attr("NS");

    console.log(NS);


    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "NS": NS
            },
            //Cambiar a type: POST si necesario
            type: "POST",
            // Formato de datos que se espera en la respuesta
            dataType: "json",
            // URL a la que se enviará la solicitud Ajax
            url: "ajax/inventario.ajax.php",
        })
        .done(function(respuesta, textStatus, jqXHR) {
            console.log(respuesta);
            console.log("La solicitud NS: " + textStatus);
            $("#NS").val(respuesta["NS"]);
            $("#TipoDisp").val(respuesta["TipoMaq"]);
            $("#Modelo").val(respuesta["Modelo"]);
            $('.selectpicker').selectpicker('val', respuesta["codigo"]);
            $('#DelegadoOld').val(respuesta["codigo"]);
            $('#selectLoc').prop('selectedIndex', respuesta["Id_Loc"] - 1);
            $('#id_LocalizacionOld').val(respuesta["Id_Loc"]);
            $('#selectEstado').prop('selectedIndex', respuesta["Id_Estado"] - 1);
            $('#id_estadoOld').val(respuesta["Id_Estado"]);
            $('#textComentarios').val(respuesta["Observaciones"]);
            $('#textComentariosOld').val(respuesta["Observaciones"]);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });



})
