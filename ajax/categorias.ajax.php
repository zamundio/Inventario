<?php
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";
var_dump("ddudud", $_POST["CheckCategoria"]);
class AjaxCategorias{
public $activarCategoria;
public $activarId;
public $categoria;

public $foto;

public $idCategoria;

    /**************************************
        SWITCH ACTIVAR/DESACTIVAR CATEGORIA
     ***************************************/
public function ajaxActivarCategoria()
    {
        $tabla = "categorias";
        $item1="estado";
        $valor1 = $this->activarCategoria;
        $item2="id";
        $valor2 =$this->activarId;

        $respuesta = ModeloCategorias::mdlActualizarCategoria($tabla,$item1,$valor1,$item2,$valor2);
        header("Cache-Control: no-cache");
    }

    public function ajaxCheckCat()
    {

        $item = "Categoria";
        $valor = $this->categoria;
        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);
        json_encode($respuesta);

    }
}


if (isset($_POST["activarCategoria"])) {

    $activar = new Ajaxcategorias();
    $activar->activarId = $_POST["ActivarId"];
    $activar->activarCategoria = $_POST["activarCategoria"];

    $activar->ajaxActivarCategoria();
}
if (isset($_POST["CheckCategoria"])) {
    $checkcat = new Ajaxcategorias();
    $checkcat->categoria = $_POST["CheckCategoria"];
    $checkcat->ajaxCheckCat();

}

