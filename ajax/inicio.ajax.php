 <?php
require_once "../controladores/maestras.controlador.php";
require_once "../modelos/maestras.modelo.php";

if ($_POST["id"]){

$tabla="todo_list";
$item="id";
$valor= $_POST["id"];
        $data=ModeloMaestras::mdlMostrarMaestras($tabla,$item,$valor);


echo json_encode($data);

}
?>
