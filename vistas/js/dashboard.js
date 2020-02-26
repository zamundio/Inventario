$(document).ready(function() {
    $('.confirmModal').click(function(e) {
        e.preventDefault();
        $.confirmModal('Are you sure to delete this?', function(el) {
            console.log("Ok was clicked!")
                //do delete operation
        });
    });
});
$(function() {

    'use strict';

    // Make the dashboard widgets sortable Using jquery UI
    $('.connectedSortable').sortable({
        containment: $('section.content'),
        placeholder: 'sort-highlight',
        connectWith: '.connectedSortable',
        handle: '.box-header, .nav-tabs',
        forcePlaceholderSize: true,
        zIndex: 999999
    });
    $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

    // jQuery UI sortable for the todo list
    $('.todo-list').sortable({
        placeholder: 'sort-highlight',
        handle: '.handle',
        forcePlaceholderSize: true,
        zIndex: 999999
    });
    /* The todo list plugin */
    $('.todo-list').todoList({
        onCheck: function() {
            window.console.log($(this), 'The element has been checked');
        },
        onUnCheck: function() {
            window.console.log($(this), 'The element has been unchecked');
        }
    });
    $('.todo-list').slimScroll({
        height: '150px'
    });

    $('.todo-list').on("click", ".EditarTodo", function() {

        var Iditem = $(this).attr("idTodo");

        $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: {
                    "id": Iditem
                },
                //Cambiar a type: POST si necesario
                type: "POST",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "ajax/inicio.ajax.php",
            })
            .done(function(data, textStatus, jqXHR) {
                if (console && console.log) {
                    console.log(data, "La solicitud se ha completado correctamente.");
                    $("#TextItem").val(data["text"]);
                    $("#IdItem").val(data["id"]);


                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus);
                }
            });


    });

    $('.todo-list').on("click", ".BorrarTodo", function() {

        var Iditem = $(this).attr("idTodo");

        $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: {
                    "id": Iditem
                },
                //Cambiar a type: POST si necesario
                type: "POST",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "ajax/inicio.ajax.php",
            })
            .done(function(data, textStatus, jqXHR) {
                if (console && console.log) {
                    console.log(data, "La solicitud se ha completado correctamente.");
                    $("#tarea").text('"' + data["text"] + '"');
                    $("#IdItemBorrar").val(data["id"]);
                    console.log($("#IdItem").val());
                    $('#ModalBorrarTODO').modal('show');

                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud ha fallado: " + textStatus);
                }
            });
    });

});