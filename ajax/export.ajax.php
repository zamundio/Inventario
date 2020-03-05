 <?php
require_once "../modelos/inventario.modelo.php";
require_once "../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



if (isset($_POST["Export_table"])){

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
            $encabezado = ["NS", "Modelo", "Tipo", "Localizacion", "Estado","Observaciones", "Codigo","Delegado","fecha Baja","Cod Gerente", "Gerente"];
            # El último argumento es por defecto A1 pero lo pongo para que se explique mejor
            $numeroDeFila = 2;
            $hojaDeProductos->fromArray($encabezado, null, 'A1');

            while ($inv = $inventario->fetchObject()) {
                $ns = $inv->NS;
                $modelo = $inv->Modelo;
                $tipo = $inv->TipoMaq;
                $loc = $inv->Nombre;
                $estado = $inv->Estado;
                $obs = $inv->Observaciones;
                $codigo = $inv->codigo;
            $delegado = $inv->Delegado;
            $fechbaja=$inv->{"fecha baja"};
            $codger=$inv->CodGer;
            $ger=$inv->gerente;

                $hojaDeProductos->setCellValueByColumnAndRow(1, $numeroDeFila, $ns);
                $hojaDeProductos->setCellValueByColumnAndRow(2, $numeroDeFila, $modelo);
                $hojaDeProductos->setCellValueByColumnAndRow(3, $numeroDeFila, $tipo);
                $hojaDeProductos->setCellValueByColumnAndRow(4, $numeroDeFila, $loc);
                $hojaDeProductos->setCellValueByColumnAndRow(5, $numeroDeFila, $estado);
            $hojaDeProductos->setCellValueByColumnAndRow(6, $numeroDeFila, $obs);
            $hojaDeProductos->setCellValueByColumnAndRow(7, $numeroDeFila, $codigo);
            $hojaDeProductos->setCellValueByColumnAndRow(8, $numeroDeFila, $delegado);
            $hojaDeProductos->setCellValueByColumnAndRow(9, $numeroDeFila, $fechbaja);
            $hojaDeProductos->setCellValueByColumnAndRow(10, $numeroDeFila, $codger);
            $hojaDeProductos->setCellValueByColumnAndRow(11, $numeroDeFila, $ger);
                $numeroDeFila++;
            }

            $writer = new Xlsx($documento);

        # Le pasamos la ruta de guardado
        if (!is_dir("c:/Export_inventario")){
            mkdir("c:/Export_Inventario");
        }

        try {
            $writer->save("c:/Export_Inventario/Inventario.xlsx");
        } catch (Exception $e) {
            echo json_encode('Message: ' . $e->getMessage());
        }

        echo json_encode('c:/Export_Inventario/Inventario.xlsx');



}
