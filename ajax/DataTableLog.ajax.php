<?php


require_once "../modelos/maestras.modelo.php";

class AjaxTablaLog{

    public function DataTableMostraLog(){

        $tabla="log_movimientos_view";
        $DatosJson = '{
		  "data": [';
        $item = null;
        $valor = null;
        $CheckAlta=null;
        $log = ModeloMaestras::mdlMostrarMaestras($tabla,$item,$valor);

        foreach ($log as $key => $value) {

            $DatosJson.='[
                    "'. $value["Fecha"] . '",
                    "'. $value["NS"] . '",
                    "' . $value["Loc_Anterior"] . '",
                    "' . $value["Loc_Actual"] . '",
                    "' . $value["Estado_Anterior"] . '",
                    "' . $value["Estado_Actual"] . '",
                    "' . $value["ObservacionesOld"] . '",
                    "' . $value["ObservacionesNew"] . '",
                    "' . $value["DelegadoOld"] . '",
                    "' . $value["DelegadoNew"] . '",
                     ""],';
            }

        $DatosJson = substr($DatosJson, 0, -1);

        $DatosJson .=   '] }';

        echo $DatosJson;
}

}

$cargarlog = new AjaxTablaLog();
$cargarlog->DataTableMostraLog();

