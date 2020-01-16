<?php

require_once "../controladores/delegados.controlador.php";
require_once "../modelos/delegados.modelo.php";

class AjaxDelegados
{

    /*=============================================
	EDITAR DELEGADOS
	=============================================*/
    public $idDelegado;
    public $NumeroSIM;
    PUBLIC $NumeroTelf;
    public function ajaxEditarDelegados()
    {
        $tabla = "delegados_ga";
        $item = "Codigo";
        $valor = $this->idDelegado;
        $respuesta = ModeloDelegados::mdlMostrardelegados($tabla, $item, $valor);
        echo json_encode($respuesta);
    }

/*=============================================
	CHECKEAR NUMERO SIM EXISTENTE
	=============================================*/
    public function ajaxCheckSIM()
    {
        $tabla = "delegados_ga";
        $item = "SIM";
        $valor = $this->NumeroSIM;
        $respuesta = ModeloDelegados::mdlMostrardelegados($tabla, $item, $valor);
        echo json_encode($respuesta);
    }

    /*=============================================
	CHECKEAR NUMERO TELF EXISTENTE
	=============================================*/
public function ajaxCheckTelf()
    {

        $item = "Movil";
        $valor =$this->NumeroTelf;
        $respuesta=ControladorDelegados::ctrEditarDelegadosView($item,$valor);

        echo json_encode($respuesta);
    }



}


/*=============================================
EDITAR DELEGADOS
=============================================*/

if (isset($_POST["idDelegado"])) {


    $editarDel = new AjaxDelegados;
    $editarDel->idDelegado = $_POST["idDelegado"];
    $editarDel->ajaxEditarDelegados();
}

/*=============================================
CHECKEAR NUMERO SIM EXISTENTE
=============================================*/
if (isset($_POST["NumeroSIM"])) {


    $CheckSIM = new AjaxDelegados;
    $CheckSIM->NumeroSIM = $_POST["NumeroSIM"];
    $CheckSIM->ajaxCheckSIM();
}
/*=============================================
CHECKEAR NUMERO TELF EXISTENTE
=============================================*/
if (isset($_POST["NumeroTelf"])) {


    $CheckTelf = new AjaxDelegados;
    $CheckTelf->NumeroTelf = $_POST["NumeroTelf"];
    $CheckTelf->ajaxCheckTelf();
}
