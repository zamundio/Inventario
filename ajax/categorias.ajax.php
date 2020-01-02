<?php
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{
public $activarCategoria;
public $activarId;

public $foto;
/**************************************
        EDITAR USUARIO
***************************************/
public $idCategoria;
public function ajaxEditarCategoria(){

    $item="id";
    $valor=$this->idCategoria;
    $respuesta=ControladorCategorias::ctrMostrarCategorias($item, $valor);
    echo json_encode($respuesta);
}
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
if (isset($_POST["activarCategoria"])) {

    $activar = new Ajaxcategorias();
    $activar->activarId = $_POST["ActivarId"];
    $activar->activarCategoria = $_POST["activarCategoria"];

    $activar->ajaxActivarCategoria();
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



