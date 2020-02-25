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
    height: '260px'
});

$('.todo-list').on("click", ".EditarTodo", function() {

    var item = $(this).attr("idTodo");

    $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            data: {
                "id": item
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
                console.log("La solicitud se ha completado correctamente.");
                if (data) {
                    $("#nuevaCategoria").parent().after('<div class="alert alert-warning">Esta categoria ya existe en la base de datos</div>');
                    $("#nuevaCategoria").val("");
                }


            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud ha fallado: " + textStatus);
            }
        });
});


});

});