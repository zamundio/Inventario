<?php
class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                /* Encriptacion y verificacion password *************************************/

                 $PasswordDecripOK=password_verify($_POST["ingPassword"],$respuesta["password"]);

				if($respuesta["usuario"] == $_POST["ingUsuario"] && $PasswordDecripOK){
                   /*comprobamos que el usuario esté activo  *************************/
                    if ($respuesta["estado" == "1"]) {


                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["usuario"]=$respuesta["usuario"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["perfil"] = $respuesta["perfil"];
                    $_SESSION["foto"] = $respuesta["foto"];
                    /*==========================================*/
                    /** REGISTRO ZONA HORARIA                 */
                    /*==========================================*/
                    date_default_timezone_set("Europe/Madrid");
                    $fecha=date('Y-m-d');
                    $hora = date('H:i:s');
                    $item1= "ultimo_login";
                    $valor1 = $fecha . " " . $hora;
                    $item2="id";
                    $valor2= $_SESSION["id"];


                    $ultimologin = ModeloUsuarios::mdlActualizarusuario($tabla,$item1,$valor1,$item2,$valor2);

					echo '<script>


						window.location = "Inicio";

					</script>';
                    }else{
                        echo '<br><div class="alert alert-danger">Usuario desactivado</div>';
                    }
				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

                }


			}

		}

	}
    /*=============================================
	REGISTRO DE USUARIO
    =============================================*/
    static public function ctrCrearUsuario()
    {
        if (isset($_POST["nuevoUsuario"])) {
            /* Control caracteres Ingreso */
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoNombre"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"])
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
            ) {
                /********************************************************
                 * GESTION DE LA FOTO
                 ********************************************************/
                $ruta = "";
                if (isset($_FILES["nuevaFoto"]["tmp_name"])){
                     list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoancho=500;
                    $nuevoalto=500;

                    /*************************************************** */
                    /* Directorio donde se guardará la imagen        *****/
                    /*************************************************** */

                    $directorio="vistas/img/usuarios/".$_POST["nuevoUsuario"];

                    if (!file_exists($directorio)){
                        mkdir($directorio, 0755, true);
                        }

                    if ($_FILES["nuevaFoto"]["type"]=="image/jpeg"){
                    $aleatorio=mt_rand(100,999);
                    $ruta="vistas/img/usuarios/" . $_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
                    $origen=imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                    $destino=imagecreatetruecolor($nuevoalto,$nuevoancho);
                    imagecopyresized($destino, $origen,0,0,0,0,$nuevoancho,$nuevoalto,$ancho,$alto);            imagejpeg($destino,$ruta);

                    }else if($_FILES["nuevaFoto"]["type"] == "image/png")
                        {
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";
                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoalto, $nuevoancho);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                            imagepng($destino, $ruta);
                        }
                 }
                /**fin Gestion FOTO */
               $tabla="usuarios";
              $encriptar=password_hash($_POST["nuevoPassword"],PASSWORD_DEFAULT);

              $datos=array("nombre"=>$_POST["nuevoNombre"],
                            "usuario" => $_POST["nuevoUsuario"],
                            "password" => $encriptar,
                            "perfil" => $_POST["nuevoPerfil"],
                            "foto"=>$ruta);

                 $respuesta=ModeloUsuarios::mdlCrearUsuarios($tabla,$datos);

                 if ($respuesta="ok")
                    {
                        Alerta("success", 'Usuario Agregado Correctamente');
                    } else {
                    Alerta("error", "Usuario no agregado");
                    }
                }else{
                Alerta("error", "El Usuario no puede contener caracteres especiales");
                }
            /* Fin else */
        }
    }
    /*=============================================
	MOSTRAR   USUARIOS
    =============================================*/
    static public function ctrMostrarusuarios($item,$valor){

       $tabla="usuarios";
      $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;


    }
    static public function ctrActivarId($idusuario, $valor)
    {

        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlActivarId($tabla,$valor);
        return $respuesta;
    }

   /*=============================================
	EDITAR   USUARIOS
    =============================================*/
    static public function ctrEditarUsuario()
    {

        if (isset($_POST["editarUsuario"]))
            {
            /* Control caracteres Ingreso */
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["editarNombre"])) {

                /********************************************************
                 * GESTION DE LA FOTO
                 ********************************************************/
                $ruta = $_POST["fotoActual"];

                if (!empty($_FILES["editarFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoancho = 500;
                    $nuevoalto = 500;

                    /*************************************************** */
                    /* Directorio donde se guardará la imagen        *****/
                    /*************************************************** */

                    $directorio = "vistas/img/usuarios/" . $_POST["editarUsuario"];

                    /**************************************************************************************/
                    /* Si ya existia una foto se elimina del directorio, si no, se crea el directorio  ****/
                    /* No se crea el directorio en caso de existir foto, solo se borra la foto
                    /*********************************************************************************** */
                    var_dump("Foto Actual",$_POST["fotoActual"]);
                    var_dump("Nueva Foto", $_FILES["editarFoto"]["tmp_name"]);
                    if(!empty($_POST["fotoActual"])){
                          // unlink($_POST["fotoActual"]);
                    }else{
                         if (!file_exists($directorio)) {
                            mkdir($directorio, 0755, true);
                            }
                    }
                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoalto, $nuevoancho);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    } else if ($_FILES["editarFoto"]["type"] == "image/png") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoalto, $nuevoancho);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }

                /**fin Gestion FOTO */
                $tabla = "usuarios";

                if ($_POST["editarPassword"]!="") {

                    $password = password_hash($_POST["editarPassword"], PASSWORD_DEFAULT);
                    var_dump("Pasa por la encriptacion:", $_POST["editarPassword"]);
                }else{
                     $password = $_POST["passwordActual"];
                    var_dump("Sigue con el ,mismo password:", $_POST["passwordActual"]);
                       }




                $datos = array(
                    "nombre" => $_POST["editarNombre"],
                    "usuario" =>  $_POST["editarUsuario"],
                    "password" => $password,
                    "perfil" => $_POST["editarPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModeloUsuarios::mdleditarUsuarios($tabla, $datos);
                if ($respuesta = "ok") {
                    Alerta("success", 'Usuario Modificado Correctamente');
                } else {
                    Alerta("error", "Usuario no Modificado");
                }
            }
        }
    }


}
