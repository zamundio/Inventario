<?php
class ControladorDelegados

{
static public function ctrMostrarDelegadosView($item, $valor){

		$tabla = "delegados_GA";


		$respuesta = ModeloDelegados::MdlMostrarDelegados($tabla, $item, $valor);

        return $respuesta;

    }

}
