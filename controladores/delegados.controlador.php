<?php
class ControladorDelegados
{
static public function ctrMostrarDelegadosView($item, $valor){

		$tabla = "delegados_GA";


		$respuesta = ModeloDelegados::MdlMostrarDelegados($tabla, $item, $valor);

        return $respuesta;

    }

static public function ctrEditarDelegadosView($item, $valor){

		$tabla = "delegados_GA";


		$respuesta = ModeloDelegados::MdlMostrarDelegados($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrModifDelegadosView(){

        if (isset($_POST["editarNumTelf"])){
            $CodigoDel= $_POST["codigoDel"];
            $Movil= $_POST["editarNumTelf"];
            $NumSIM= $_POST["editarSIM"];
            $NumPIN = $_POST["editarPIN"];
            $NumPUK = $_POST["editarPUK"];
            $tabla = "lineas_4g";


            $datos=array("codigoDel"=> $CodigoDel,
                        "editarTelf"=> $Movil,
                        "editarSIM" => $NumSIM,
                         "editarPIN" => $NumPIN,
                        "editarPUK" => $NumPUK);

                        $respuesta = ModeloDelegados::MdlActualizarDelegados($tabla,$datos);


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
    static public function ctrMostrarJV()
    {
        $tabla="jv";
        $item=null;
        $valor=null;
        $respuesta=ModeloDelegados::mdlMostrardelegados($tabla,$item,$valor);
    return $respuesta;
    }
    static public function ctrMostrarDelegados()
    {
        $tabla = "delegados_ga";
        $item = null;
        $valor = null;
        $respuesta = ModeloDelegados::mdlMostrardelegados($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrMostrarGA($valor)
    {
        $tabla = "ga";
        $item = "Gerente";

        $respuesta = ModeloDelegados::mdlMostrarenSelect($tabla, $item, $valor);
        return $respuesta;
    }

 static public function ctrMostrarDelegadosTest()
    {
        $tabla = "delegados_test";
        $item = null;
        $valor = null;
        $respuesta = ModeloDelegados::mdlMostrardelegados($tabla, $item, $valor);
        return $respuesta;
    }
     public function DataTableMostrarDelegados()
    {
    $DatosJson = $datosJson = '{
		  "data": [';
        $item = null;
        $valor = null;
        $CheckAlta = null;
        $delegados = ControladorDelegados::ctrMostrarDelegadosView($item, $valor);

        foreach ($delegados as $key => $value) {
            $botones = '<div class="btn-group">

                      <button class="btn btn-warning btnEditarDelegado"  idDelegado="' . $value["Codigo"] . '" data-toggle="modal" data-target="#modalEditarDelegado"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                    </div>';
            if (strlen($value["Fecha Baja"]) == 10) {
                $CheckAlta = '<td <button type="button" class="btn btn-warning btn-xs">Baja</button></td>';
            } else {
                $CheckAlta = '<td <button type="button" class="btn btn-success btn-xs">Alta</button></td>';
            }
            $DatosJson .= '[
                    "' . $value["Codigo"] . '",
                    "' . $value["Nombre"] . '",
                    "' . $value["Primer Apellido"] . '",
                    "' . $value["Fecha de Alta"] . '",
                    "' . $value["Email"] . '",
                    "' . $value["Fecha Baja"] . '",
                    "' . $CheckAlta.'",
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
