<?php

if (isset($_POST["COD"])) {

    $tabla = 'delegados_ficha';
    $item = 'Codigo';
    $valor = $_POST["COD"];


    /* $FichaDelegados=new ModeloEstructura();
   $respuesta= $FichaDelegados::mdlMostrarFichaDelegado($item,$valor);*/

    $respuesta = ModeloDelegados::mdlMostrardelegados($tabla, $item, $valor);


    echo json_encode($respuesta);
}



