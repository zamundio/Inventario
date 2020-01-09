<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

	/*=============================================
	EDITAR CATEGORIAS
	=============================================*/

	public $idCategoria;

	public function ajaxEditarCategorias(){

        $tabla = "categorias";
        $item = "id";
        $valor = $this->idCategoria;

        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        echo json_encode($respuesta);

	}

}



/*=============================================
EDITAR CATEGORIAS
=============================================*/

if (isset($_POST["idCat"])) {

    $editarCat=new AjaxCategorias;
    $editarCat->idCategoria=$_POST["idCat"];
    $editarCat->ajaxEditarCategorias();

}

if (isset($_POST["Categoria"])) {

    $tabla = "categorias";
    $item = "Categoria";
    $valor = $_POST["Categoria"];

    $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
    echo json_encode($respuesta);
}
