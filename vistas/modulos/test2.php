<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar categorías

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar categorías</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                Start creating your amazing application!
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
require_once "modelos/inventario.modelo.php";
require_once "vendor/autoload.php";



function ExportXLS(){



$jsondata = array();

$item = null;
$valor = null;
$tabla = "inventario_view";

$inventario = ModeloInventario::mdlMostrarInventarioNoFetch($tabla, $item, $valor);
$documento = new Spreadsheet();
$documento
    ->getProperties()
    ->setCreator("Sergio Fernandez")
    ->setLastModifiedBy('Inventario')
    ->setTitle('Archivo Inventario exportado desde MySQL')
    ->setDescription('Un archivo de Excel exportado desde MySQL');

# Como ya hay una hoja por defecto, la obtenemos, no la creamos


$hojaDeProductos = $documento->getActiveSheet();
$hojaDeProductos->setTitle("Productos");
# Escribir encabezado de los productos
$encabezado = ["NS", "Modelo", "Tipo", "Localizacion", "Estado"];
# El último argumento es por defecto A1 pero lo pongo para que se explique mejor
$numeroDeFila = 2;
$hojaDeProductos->fromArray($encabezado, null, 'A1');

while ($inv = $inventario->fetchObject()) {
    $ns = $inv->NS;
    $modelo = $inv->Modelo;
    $tipo = $inv->TipoMaq;
    $loc = $inv->Nombre;
    $estado = $inv->Estado;
    $hojaDeProductos->setCellValueByColumnAndRow(1, $numeroDeFila, $ns);
    $hojaDeProductos->setCellValueByColumnAndRow(2, $numeroDeFila, $modelo);
    $hojaDeProductos->setCellValueByColumnAndRow(3, $numeroDeFila, $tipo);
    $hojaDeProductos->setCellValueByColumnAndRow(4, $numeroDeFila, $loc);
    $hojaDeProductos->setCellValueByColumnAndRow(5, $numeroDeFila, $estado);
    $numeroDeFila++;
}

$writer = new Xlsx($documento);

# Le pasamos la ruta de guardado
$writer->save('Exportado.xlsx');
};
?>
