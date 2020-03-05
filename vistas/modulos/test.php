<?php
require_once "modelos/inventario.modelo.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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



# Escribir encabezado de los productos
$encabezado = ["NS", "Modelo", "Tipo", "Localizacion", "Estado"];
# El último argumento es por defecto A1 pero lo pongo para que se explique mejor
$numeroDeFila = 2;


while ($producto = $inventario->fetchObject()) {
    $ns = $producto->NS;
}
?>
