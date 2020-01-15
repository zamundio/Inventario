<?php

require_once "conexion.php";

class ModeloDelegados{

	/*=============================================
	MOSTRAR DELEGADOS
	=============================================*/

	static public function mdlMostrardelegados($tabla, $item, $valor){

		if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :valor");

            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);



			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}


		$stmt -> close();

		$stmt = null;

	}









}
