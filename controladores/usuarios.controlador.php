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

                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["usuario"]=$respuesta["usuario"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["perfil"] = $respuesta["perfil"];
                    $_SESSION["foto"] = $respuesta["foto"];

					echo '<script>


						window.location = "Inicio";

					</script>';

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



}
