<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";

class AjaxTablaInventario{

    public function DataTableMostrarInventario(){
        $DatosJson = '{
		  "data": [';
        $item = null;
        $valor = null;

        $inventario = controladorInventario::ctrMostrarInventarioview($item, $valor);
        $botones =null;
        foreach ($inventario as $key => $value) {
             $botones = "<button class='btn btn-warning btnEditarInventario'  NS=" .$value['NS']. " data-toggle='modal' data-target='#modalEditarInventario'><i class='fa fa-edit'></i></button>";



           if (strlen($value["fecha baja"]) == 10 && $value["codigo"] == 0) {
                $CheckAlta= "<button type='button' class='btn btn-warning btn-xs'>Baja</button>";
            } else {
                if ($value["codigo"] != 0){
                    $CheckAlta = "<button type='button' class='btn btn-success btn-xs'>Alta</button>";
                }else {
                    $CheckAlta="";
                }
                if(strlen($value["Observaciones"])>1){

            $tooltip= "<div class='row'><div class='col text-center'><a class='btn btn-primary btn-circle '  data-toggle='hover' title='Observaciones' data-content='" . $value["Observaciones"] . "'><i class='fas fa-info'></i></a>";


                }else{
                    $tooltip="";
                }



            }
            $DatosJson.= '[
                    "' . $tooltip . '",
                    "'. $value["NS"] . '",
                    "'. $value["Id_Mod"] . '",
                    "' . $value["Modelo"] . '",
                    "' . $value["TipoMaq"] . '",
                    "' . $value["Id_Loc"] . '",
                    "' . $value["Nombre"] . '",
                    "' . $value["Id_Estado"] . '",
                    "' . $value["Estado"] . '",
                    "' . $value["codigo"] . '",
                    "' . $value["Delegado"] . '",
                     "' .$value["fecha baja"] . '",
                    "' . $CheckAlta . '",
                    "' . $value["CodGer"] . '",
                    "' . $value["gerente"] . '",
                    "' . $botones . '"],';
            }

        $DatosJson = substr($DatosJson, 0, -1);

        $DatosJson .=   '] }';

        echo $DatosJson;
}

}

$activarInventario = new AjaxTablaInventario();
$activarInventario->DataTableMostrarInventario();

