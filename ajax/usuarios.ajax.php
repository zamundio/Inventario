<?php
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
public $activarUsuario;
public $activarId;
public $Username;
/**************************************
        EDITAR USUARIO
***************************************/
public $idUsuario;
public function ajaxEditarUsuario(){

    $item="id";
    $valor=$this->idUsuario;
    $respuesta=ControladorUsuarios::ctrMostrarusuarios($item, $valor);
    echo json_encode($respuesta);
}

public function ajaxActivarUsuario()
    {
        $tabla = "usuarios";
        $item1="estado";
        $valor1 = $this->activarUsuario;
        $item2="id";
        $valor2 =$this->activarId;

        $respuesta = ModeloUsuarios::mdlActualizarusuario($tabla,$item1,$valor1,$item2,$valor2);
        header("Cache-Control: no-cache");
    }
    public function ajaxCheckUser()
    {
        $tabla = "usuarios";
        $item = "usuario";
        $valor = $this->Username;

        $respuesta = ControladorUsuarios::ctrMostrarusuarios($item, $valor);
        echo json_encode($respuesta);


    }

}

if(isset($_POST["idUsuario"])){

    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];

    $editar->ajaxEditarUsuario();



}

if (isset($_POST["activarUsuario"])) {

    $activar = new AjaxUsuarios();
    $activar->activarId = $_POST["ActivarId"];
    $activar->activarUsuario = $_POST["activarUsuario"];
    $activar->ajaxActivarUsuario();
}


if (isset($_POST["CheckUser"])) {
$checkuser = new AjaxUsuarios();
$checkuser->Username= $_POST["CheckUser"];
$checkuser->ajaxCheckUser();
}


