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

    static function TotalTablas($tabla,$item,$valor)
    {

        if ($item != null) {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*)  FROM $tabla  WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        }else{

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla");

		}
        $stmt->execute();

        return $stmt->fetchAll();
    }
    static function EditTodo(){



    }



}



