<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

        if($item!=null){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
        else
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchall();
         }

        $stmt ->closeCursor();
        $stmt=null;

	}

    /*=============================================
    CREAR USUARIOS
	=============================================*/
    static public function mdlCrearUsuarios($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,usuario,password,perfil,foto) values (:nombre,:usuario,:password,:perfil,:foto)");
        $stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario",$datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password",$datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil",$datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        if($stmt->execute()){

            return "ok";

        }else{
            return "error";
        }

        $stmt->closeCursor();
        $stmt = null;

    }
    static public function mdlEditarUsuarios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla set nombre=:nombre,usuario=:usuario,password=:password,perfil=:perfil,foto=:foto WHERE  ");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        if ($stmt->execute()) {

            return "ok";
        } else {
            return "error";
        }

        $stmt->closeCursor();
        $stmt = null;
    }


}
