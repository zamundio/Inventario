<?php

require_once "../controladores/delegados.controlador.php";
require_once "../modelos/delegados.modelo.php";

class AjaxTablaDelegados{

    public function DataTableMostrarDelegados(){
        $DatosJson = '{
		  "data": [';
        $item = null;
        $valor = null;
        $CheckAlta=null;
        $delegados = ControladorDelegados::ctrMostrarDelegadosView($item, $valor);

        foreach ($delegados as $key => $value) {
            $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarDelegado'  idDelegado=" .$value['Codigo']." data-toggle='modal' data-target='#modalEditarDelegado'><i class='fa fa-edit'></button></div>";
            if (strlen($value["Fecha Baja"]) == 10) {
                $CheckAlta= "<button type='button' class='btn btn-warning btn-xs'>Baja</button>";
            } else {
                $CheckAlta = "<button type='button' class='btn btn-success btn-xs'>Alta</button>";
            }
            $DatosJson.='[
                    "'. $value["Codigo"] . '",
                    "'. $value["Nombre"] . '",
                    "' . $value["Primer Apellido"] . '",
                    "' . $value["Fecha de Alta"] . '",
                    "' . $value["Email"] . '",
                    "' . $value["Fecha Baja"] . '",
                    "' . $CheckAlta . '",
                    "' . $value["SubArea"] . '",
                    "' . $value["Gerente"] . '",
                    "' . $value["NomGer"] . '",
                    "' . $value["Linea"] . '",
                     "' . $value["Movil"] . '",
                    "' . $value["PIN"] . '",
                    "' . $value["PUK"] . '",
                     "' . $botones . '"],';
            }

        $DatosJson = substr($DatosJson, 0, -1);

        $DatosJson .=   '] }';

        echo $DatosJson;
}

}

$activarDelegados = new AjaxTablaDelegados();
$activarDelegados->DataTableMostrarDelegados();

