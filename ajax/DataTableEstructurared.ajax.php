
<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";
require_once "../controladores/delegados.controlador.php";
require_once "../modelos/delegados.modelo.php";
class AjaxTablaInventarioEstructura
{

    public function DataTableMostrarInventario()
    {

      $DatosJson = '[ ';
        $item = "codigo";

        $valor = $_POST["CurrentNode"][0];



        $inventario = controladorInventario::ctrMostrarInventarioview($item, $valor);

        $botones = null;
        foreach ($inventario as $key => $value) {
            $botones = "<button type='button' class='btn btn-warning btnEditarEstructura'  NS=" . $value['NS'] . " data-toggle='modal' data-target='#modalEditarEstructura'><i class='fa fa-edit'></i></button>";




                if (strlen($value["Observaciones"]) > 1) {

                    $tooltip = "<div class='row'><div class='col text-center'><a class='btn btn-primary btn-circle '  data-toggle='hover' title='Observaciones' data-content='" . $value["Observaciones"] . "'><i class='fas fa-info'></i></a>";
                } else {
                    $tooltip = "";
                }

            $DatosJson .= '{
                    "Observ":"' . $tooltip . '",
                    "NS":"' . $value["NS"] . '",
                    "Modelo":"' . $value["Modelo"] . '",
                    "Tipo":"' . $value["TipoMaq"] . '",
                     "Localizacion":"' . $value["Nombre"] . '",
                    "Estado":"' . $value["Estado"] . '",
                     "Acciones":"'.$botones.'"},';
        }

        $DatosJson = substr($DatosJson, 0, -1);

        $DatosJson .=   '] ';

        echo $DatosJson;

    }
}
if (isset($_POST["CurrentNode"])) {
$activarInventarioLinked = new AjaxTablaInventarioEstructura();
$activarInventarioLinked->DataTableMostrarInventario();
}

if (isset($_POST["COD"])) {

    $tabla = 'delegados_ficha';
    $item = 'Codigo';
    $valor = $_POST["COD"];




    $respuesta = ModeloDelegados::mdlMostrardelegados($tabla, $item, $valor);


    echo json_encode($respuesta);
}
