<?php

require_once "conexion.php";

class ModeloDelegados{
    public $timestamps = true;
	/*=============================================
	MOSTRAR DELEGADOS
	=============================================*/

	static public function mdlMostrardelegados($tabla, $item, $valor){

		if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :valor");

            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);



			$stmt -> execute();

			return $stmt ->fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}


		$stmt -> close();

		$stmt = null;

	}

    static public function mdlMostrarenSelect($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :valor");

            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);



            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }

    static public function  MdlActualizarDelegados ($tabla,$datos){

        /*COMPROBAREMOS PRIMERO QUE EXISTE UN REGISTRO EN LA TABLA DE LINEAS_4G PARA PODER ACTUALIZARLO
        SI NO, HAREMOS UN INSERT EN VEZ DE UN UPDATE*/

        $CodExist = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Codigo = :codigo");
        $CodExist->bindParam(":codigo", $datos["codigoDel"], PDO::PARAM_STR);



        $CodExist->execute();



        if ($CodExist->fetch()==""){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Codigo, MOVIL, SIM_TS, PIN_TS, PUK_TS) VALUES (:codigoDel, :Movil, :SIM, :PIN, :PUK)");
            }else{

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET SIM_TS = :SIM, MOVIL = :Movil, PIN_TS = :PIN, PUK_TS = :PUK WHERE Codigo = :codigoDel");

           }



        $stmt->bindParam(":SIM", $datos["editarSIM"], PDO::PARAM_STR);
        $stmt->bindParam(":Movil", $datos["editarTelf"], PDO::PARAM_STR);
        $stmt->bindParam(":PIN", $datos["editarPIN"], PDO::PARAM_STR);
        $stmt->bindParam(":PUK", $datos["editarPUK"], PDO::PARAM_STR);
        $stmt->bindParam(":codigoDel", $datos["codigoDel"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }








}
