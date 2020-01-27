<?php

class controladorInventario{

	static public function ctrMostrarInventarioview($item,$valor){

        $tabla = "inventario_view";


        $respuesta = ModeloInventario::mdlMostrarInventario($tabla, $item, $valor);

        return $respuesta;

	}
    static public function DataTableMostrarInventario()
    {
        $DatosJson = '{
		  "data": [';
        $item = null;
        $valor = null;

        $inventario = controladorInventario::ctrMostrarInventarioview($item, $valor);

        foreach ($inventario as $key => $value) {
            $botones = ""; /*"<div class='btn-group'><button class='btn btn-warning btnEditarDelegado'  NumSerie=" .$value['NS']." data-toggle='modal' data-target='#modalEditarInventario'><i class='fa fa-pencil'></i><button></div>";*/
            if (strlen($value["fecha baja"]) == 10) {
                $CheckAlta = "";/* "<button type='button' class='btn btn-warning btn-xs'>Baja</button>";*/
            } else {
                $CheckAlta = ""; /*"<button type='button' class='btn btn-success btn-xs'>Alta</button>";*/
            }
            $DatosJson .= '[
                    "' . $value["NS"] . '",
                    "' . $value["Id_Mod"] . '",
                    "' . $value["Modelo"] . '",
                    "' . $value["Id_Loc"] . '",
                    "' . $value["Nombre"] . '",
                    "' . $value["Id_Estado"] . '",
                    "' . $value["Estado"] . '",
                    "' . $value["Observaciones"] . '",
                    "' . $value["codigo"] . '",
                    "' . $value["Delegado"] . '",
                    "' . $CheckAlta . '",
                    "' . $value["CodGer"] . '",
                    "' . $value["gerente"] . '",
                    "' . $botones . '"],';
        }

        $DatosJson = substr($DatosJson, 0, -1);

        $DatosJson .=   '] }';

        return  $DatosJson;
    }
}

