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
    static public function mdlActualizarusuario($tabla,$item1,$valor1,$item2,$valor2)
    {


        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1=:$valor1 WHERE $item2=:$valor2");
        $stmt->bindParam(":".$valor1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":".$valor2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {
            return "error";
        }

        $stmt->closeCursor();
        $stmt = null;
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

     /*=============================================
    EDITAR USUARIOS
	=============================================*/
    static public function mdlEditarUsuarios($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla set nombre=:nombre,password=:password,perfil=:perfil,foto=:foto WHERE usuario=:usuario" );
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario",$datos["usuario"], PDO::PARAM_STR);
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
