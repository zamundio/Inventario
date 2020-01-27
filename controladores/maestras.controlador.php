<?php


class ControladorMaestras

{
static function ctrMostrarLocalizacion(){


        $tabla = "localizaciones";

        $item=null;
        $valor=null;
        $respuesta = ModeloInventario::mdlMostrarInventario($tabla, $item, $valor);

        return $respuesta;


}
    static function ctrMostrarEstado()
    {


        $tabla = "estado";

        $item = null;
        $valor = null;
        $respuesta = ModeloInventario::mdlMostrarInventario($tabla, $item, $valor);

        return $respuesta;
    }
}



