<?php

class controladorInventario{

	static public function ctrMostrarInventarioview($item,$valor){

        $tabla = "inventario_view";


        $respuesta = ModeloInventario::mdlMostrarInventarioLinked($tabla, $item, $valor);

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


    static public function ctrEditarInventario(){
            if (isset($_POST["selectDel"])|| isset($_POST["selectLoc"]) || isset($_POST["selectEstado"])){

            if(isset($_POST["selectDel"])){
                $delegado= $_POST["selectDel"];
             }else{

                $delegado=null;

             }


            $tabla="inventario";
                $datos=null;
            $datos = array(
                "ns" => $_POST["NS"],
                "Delegado"=> $delegado,
                "DelegadoOld" => $_POST["DelegadoOld"],
                "Localizacion" => $_POST["selectLoc"],
                "Localizacionold" => $_POST["id_LocalizacionOld"],
                "Estado" => $_POST["selectEstado"],
                "EstadoOld" => $_POST["id_estadoOld"],
                "Observaciones" => $_POST["textComentarios"],
                "ObservacionesOld" => $_POST["textComentariosOld"]
            );


            $respuesta = ModeloInventario::mdlActualizarInventario($tabla, $datos);
            ModeloInventario::mdlActualizarLog_Movimientos( $datos);
            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "Los datos han sido editados correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									;

									}
								})

					</script>';
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡Ha ocurrido un error!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							;

							}
						})

			  	</script>';
            }
            }


}





}
