<?php
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
public $activarUsuario;
public $activarId;
public $Username;
public $foto;
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
    /**************************************
        SWITCH ACTIVAR/DESACTIVAR USUARIO
     ***************************************/
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
    /*************************************************
        CHECK NOMBRE USUARIO NO DUPLICADO AGREGAR USUARIO
     **************************************************/
public function ajaxCheckUser()
    {
    $tabla = "usuarios";
    $item = "usuario";
    $valor = $this->Username;
    $respuesta = ControladorUsuarios::ctrMostrarusuarios($item, $valor);
    echo json_encode($respuesta);
    }

    /**************************************
        ELIMINAR USUARIO
     ***************************************/
    public function ajaxEliminarUser()
    {
        $tabla = "usuarios";
        $item = "id";
        $valor = $this->idUsuario;
        $fotoaborrar=$this->foto;
        $usuario=$this->Username;
        if ($fotoaborrar!=""){

        }
        unlink('../'.$fotoaborrar);
        if (is_dir('../vistas/img/usuarios/' . $usuario.'/')){
                rmdir('../vistas/img/usuarios/' . $usuario);
        }


        $respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla, $valor);
        return $respuesta;

    }



}

if(isset($_POST["idUsuario"])){

    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];

    $editar->ajaxEditarUsuario();



}
/**Switch Activar/Desactivar usuario*/
if (isset($_POST["activarUsuario"])) {

    $activar = new AjaxUsuarios();
    $activar->activarId = $_POST["ActivarId"];
    $activar->activarUsuario = $_POST["activarUsuario"];
    $activar->ajaxActivarUsuario();
}

/**No repetir usuario */

if (isset($_POST["CheckUser"])) {
$checkuser = new AjaxUsuarios();
$checkuser->Username= $_POST["CheckUser"];
$checkuser->ajaxCheckUser();
}

/**Eliminar usuario */

if (isset($_POST["idBorrarUsuario"])) {
    $borraruser = new AjaxUsuarios();
    $borraruser->idUsuario = $_POST["idBorrarUsuario"];
    if (isset($_POST["idFotoBorrar"])){
        $borraruser->foto= $_POST["idFotoBorrar"];
    }

    $borraruser->Username=$_POST["usuarioBorrar"];

    $borraruser->ajaxEliminarUser();

}



