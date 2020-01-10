<?php

require_once "conexion.php";

class ModeloCategorias{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);



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

    /*=============================================
	ACTUALIZAR CATEGORIA
	=============================================*/

    static public function mdlActualizarCategoria($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }



        $stmt = null;
    }
    static public function MdlCrearCategorias($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Categoria,Descripción,foto,FechaAlta) VALUES (:categoria,:descripcion,:foto,:fechaAlta)");

        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":fechaAlta", $datos["fechaAlta"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }



        $stmt = null;


    }
    static public function mdlEditarCategorias($datos)
    {
        $tabla="categorias";
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Categoria=:categoria,Descripción = :descripcion, foto=:foto WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["Categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["Descripción"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }


    }
    static public function mdlEliminarCategorias($item, $valor){

        $tabla="categorias";

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :valor");

        $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }



        $stmt = null;
    }














}
