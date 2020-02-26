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
    static function EditItemList(){

            if (isset($_POST["TextItem"])){
            $tabla="todo_list";
            $item="id";
            $valor= $_POST["IdItem"];
            $text = $_POST["TextItem"];

            $now = new DateTime();
            $fecha  = $now->format('Y-m-d-H-i-s');
            $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET  text = :texto , fecha = :fecha WHERE $item = :$item");
            $stmt->bindParam(":texto", $text, PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }
   }
static function MostrarItemList($tabla, $item, $valor){


        $respuesta = ModeloInventario::mdlMostrarInventario($tabla, $item, $valor);

        return $respuesta;

}
    static function DeleteItemList()
    {

        if (isset($_POST["IdItemBorrar"])) {
            $tabla = "todo_list";
            $item = "id";
            $valor = $_POST["IdItemBorrar"];
 $respuesta = ModeloMaestras::mdlEliminarMaestras($tabla,$item,$valor);
        }

    }
    static function AddItemList()
    {

        if (isset($_POST["textItemAñadir"])) {
            $tabla = "todo_list";
            $now = new DateTime();
            $fecha  = $now->format('Y-m-d-H-i-s');
            $datos = array(
                "text" => $_POST["textItemAñadir"],
                "fecha" =>  $fecha);
            $respuesta = ModeloMaestras::mdlAñadirMaestras($tabla,$datos);
        }
    }


}
