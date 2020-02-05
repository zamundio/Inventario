var to = false;

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

$('#tree-container').slimScroll({
    height: '500px'
});

$("#tree-container").on("changed.jstree", function(e, data) {
    console.log('Selezionati ' + data.changed.selected);
    console.log('Deselezionati ' + data.changed.deselected);
});
$(document).ready(function() {
    //fill data to tree  with AJAX call



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