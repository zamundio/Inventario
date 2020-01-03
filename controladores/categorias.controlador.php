<?php
class ControladorCategorias

{
static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::MdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
    }

    static public function ctrCrearCategorias()
    {

        if (isset($_POST["nuevaCategoria"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"]) && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]))
            {
            $tabla = "categorias";
                $datos = array('' => , );
            $respuesta = ModeloCategorias::MdlCrearCategorias($tabla,$datos);

            return $respuesta;
        }
        }
    }


}
