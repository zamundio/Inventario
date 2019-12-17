/*=============================================
SideBar Menu
=============================================*/

$('.sidebar-menu').tree()


/*=============================================
Data Table
=============================================*/
$(".tablas").dataTable({
    'language': {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    },
    'paging': true,
    'lengthChange': false,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': false
});
