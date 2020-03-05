<?php

require_once "conexion.php";

class ModeloMaestras{

    static public function mdlMostrarMaestras($tabla, $item, $valor)
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

    static public function mdlEliminarMaestras($tabla,$item, $valor)
    {



        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :valor");

        $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }



        $stmt = null;
    }

    static public function mdlAñadirMaestras($tabla,$datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(text,fecha) VALUES (:text,:fecha)");

        $stmt->bindParam(":text", $datos["text"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }



        $stmt = null;



    }
    static public function mdlImportCSV($tabla,$campos)
    {
     $sql_campos=null;
        foreach ($campos as $valor) {
                $sql_campos= $sql_campos.",". $valor;

            }
            print_r(substr($sql_campos,2));

      /*  $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(text,fecha) VALUES (:text,:fecha)");

        $stmt->bindParam(":text", $datos["text"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }



        $stmt = null;*/
    }








}
