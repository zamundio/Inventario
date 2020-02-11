
<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";

class AjaxTablaInventarioEstructura
{

    public function DataTableMostrarInventario()
    {

      $DatosJson = '[ ';
        $item = "codigo";
       if (ISSET($_POST["CurrentNode"])){
        $valor = $_POST["CurrentNode"][0];



        $inventario = controladorInventario::ctrMostrarInventarioview($item, $valor);

        $botones = null;
        foreach ($inventario as $key => $value) {
            $botones = "<button class='btn btn-warning btnEditarInventario'  NS=" . $value['NS'] . " data-toggle='modal' data-target='#modalEditarInventario'><i class='fa fa-edit'></i></button>";




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
                    "Estado":"' . $value["Estado"] . '"},';
        }

        $DatosJson = substr($DatosJson, 0, -1);

        $DatosJson .=   '] ';

        echo $DatosJson;
    }
    }
}

$activarInventarioLinked = new AjaxTablaInventarioEstructura();
$activarInventarioLinked->DataTableMostrarInventario();
