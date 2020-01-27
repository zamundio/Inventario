<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";

class AjaxInventario
{

    /*=============================================
	EDITAR DELEGADOS
	=============================================*/
    public $NS;
    public $NumeroSIM;
    public $NumeroTelf;
    public $idJV;

    public function ajaxEditarInventario()
    {
        $tabla = "inventario_view";
        $item = "NS";
        $valor = $this->NS;
        $respuesta = ModeloInventario::mdlMostrarInventario($tabla, $item, $valor);
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


    /*=============================================
LISTA GERENTES
=============================================*/

    public function ajaxListaGerentes(){

       ;
        $valor = $this->idJV;

        $respuesta=ControladorDelegados::ctrMostrarGA($valor);
        echo json_encode($respuesta);

    }

}





/*=============================================
EDITAR DELEGADOS
=============================================*/

if (isset($_POST["NS"])) {


    $editarInv = new AjaxInventario;
    $editarInv->NS = $_POST["NS"];
    $editarInv->ajaxEditarInventario();
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


/*=============================================
CARGAR LISTA DE GERENTES
=============================================*/
if (isset($_POST["IdJV"])) {


    $ListaGer = new AjaxDelegados;
    $ListaGer->idJV = $_POST["IdJV"];
    $ListaGer->ajaxListaGerentes();
}
