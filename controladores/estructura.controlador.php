<?php

 class ControladorEstructura
{
    static public function ctrMostrarDelegadosTree()
    {
        $item=null;
        $valor=null;
        $tabla = 'treeview_del';


        $respuesta = ModeloEstructura::mdlMostrarTree($tabla, $item, $valor);

        return $respuesta;
    }

}
