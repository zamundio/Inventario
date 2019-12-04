<?php

require_once "conexion.php";

class modeloUsuarios{

/*=============================================
=          MOSTRAR USUARIOS                   =
=============================================*/
static public function MdlMostrarUsuarios($tabla,$item,$valor)
	{

		$stmt= conexion::Conectar()->prepare("select * from $tabla where $item=:$item");
		$stmt->bindparam(":".$item,$valor,PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();

	}





}

?>