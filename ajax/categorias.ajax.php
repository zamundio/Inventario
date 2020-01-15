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

/*=============================================
	ACTIVAR CATEGORIAS
	=============================================*/

    public $activarCat;
    public $activarIdCat;


    public function ajaxActivarCategoria()
    {

        $tabla = "categorias";

        $item1 = "estado";
        $valor1 = $this->activarCat;

        $item2 = "id";
        $valor2 = $this->activarIdCat;

        $respuesta = ModeloCategorias::mdlActualizarCategoria($tabla, $item1, $valor1, $item2, $valor2);
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


/*=============================================
ACTIVAR CATEGORIAS
=============================================*/
if (isset($_POST["ActivaridCat"])) {


   $activarCat = new AjaxCategorias;
    $activarCat->activarIdCat = $_POST["ActivaridCat"];
    $activarCat->activarCat = $_POST["estadoCat"];


    $activarCat->ajaxActivarCategoria();



}
