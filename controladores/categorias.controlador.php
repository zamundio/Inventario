<?php
class ControladorCategorias

{
static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::MdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
	}
}
