<?php

require_once "conexion.php";

class ModeloInventario{
    public $timestamps = true;
    static public function mdlMostrarInventario($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }


    	/*=============================================
	ACTUALIZAR INVENTARIO
	=============================================*/
    static public function mdlActualizarInventario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Id_Loc = :localizacion, Id_Estado = :estado, Codigo = :delegado, Observaciones = :observ WHERE NS = :ns");

        $stmt->bindParam(":ns", $datos["ns"], PDO::PARAM_STR);
        $stmt->bindParam(":localizacion", $datos["Localizacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["Estado"], PDO::PARAM_STR);
        $stmt->bindParam(":delegado", $datos["Delegado"], PDO::PARAM_STR);
        $stmt->bindParam(":observ", $datos["Observaciones"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }



        $stmt = null;
    }

    static public function mdlActualizarLog_Movimientos($datos)
    {
        $tabla='log_movimientos';
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NS, Id_LocOld, Id_LocNew, Id_EstadoOld, Id_EstadoNew,ObservacionesOld,ObservacionesNew,CodigoOld,CodigoNew) VALUES (:ns, :Id_Locold, :Id_Locnew, :id_estadoold,:id_estadonew,:obsold,:obsnew,:codold,:codnew)");

        $stmt->bindParam(":ns", $datos["ns"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_Locold", $datos["Localizacionold"], PDO::PARAM_STR);
        $stmt->bindParam(":Id_Locnew", $datos["Localizacion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_estadonew", $datos["Estado"], PDO::PARAM_STR);
        $stmt->bindParam(":id_estadoold", $datos["EstadoOld"], PDO::PARAM_STR);
        $stmt->bindParam(":codnew", $datos["Delegado"], PDO::PARAM_STR);
        $stmt->bindParam(":codold", $datos["DelegadoOld"], PDO::PARAM_STR);
         $stmt->bindParam(":obsnew", $datos["Observaciones"], PDO::PARAM_STR);
        $stmt->bindParam(":obsold", $datos["ObservacionesOld"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }



        $stmt = null;
    }


}
