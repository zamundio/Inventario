<?php
class ControladorCategorias

{
static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";


		$respuesta = ModeloCategorias::MdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrCrearCategoria()
    {
        $ruta = "";
        if (isset($_POST["nuevaCategoria"])) {
            if (preg_match('/^[a-zA-Z 0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"]) && preg_match('/^[a-zA-Z 0-9.,-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]))
            {



                if (isset($_FILES["nuevaFotoCat"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFotoCat"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

                    $directorio = "vistas/img/categorias/" . $_POST["nuevaCategoria"];

                    mkdir($directorio, 0755);

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($_FILES["nuevaFotoCat"]["type"] == "image/jpeg") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/categorias/" . $_POST["nuevaCategoria"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFotoCat"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaFotoCat"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/categorias/" . $_POST["nuevaCategoria"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFotoCat"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }


            $tabla = "categorias";
                date_default_timezone_set('Europe/Madrid');

                $fecha = date('Y-m-d');
                $hora = date('H:i:s');

                $fechaActual = $fecha . ' ' . $hora;
                $datos = array("categoria" => $_POST["nuevaCategoria"],
                               "descripcion" => $_POST["nuevaDescripcion"],
                                 "foto"=>$ruta,
                                "fechaAlta" => $fechaActual );

            $respuesta=ModeloCategorias::MdlCrearCategorias($tabla,$datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡La categoria ha sido creada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							window.location = "categorias";

						}

					});


					</script>';
                }
        }
        }
    }

/*=============================================
				EDITAR CATEGORIA
=============================================*/


    static public function ctrEditarCategoria()
    {

        if (isset($_POST["editarCategoria"])) {
            if (preg_match('/^[a-zA-Z 0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"]) && preg_match('/^[a-zA-Z 0-9.,-ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])) {

                /*=============================================
				VALIDAR IMAGEN
				=============================================*/

                $ruta = $_POST["fotoActualCat"];

                if (isset($_FILES["editarFotoCat"]["tmp_name"]) && !empty($_FILES["editarFotoCat"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["editarFotoCat"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

                    $directorio = "vistas/img/categorias/" . $_POST["editarCategoria"];

                    /*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

                    if (!empty($_POST["fotoActualCat"])) {

                        unlink($_POST["fotoActualCat"]);
                    } else {

                        mkdir($directorio, 0755);
                    }

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($_FILES["editarFotoCat"]["type"] == "image/jpeg") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/categorias/" . $_POST["editarCategoria"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFotoCat"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["editarFotoCat"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/categorias/" . $_POST["editarCategoria"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["editarFotoCat"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }
                $tabla = "categorias";



                $datos = array(
                    "Categoria" => $_POST["editarCategoria"],
                    "Descripción" => $_POST["editarDescripcion"],
                    "foto" => $ruta
                );

                $respuesta = ModeloCategorias::mdlEditarCategorias($datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "La categoria ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';
            }
        }
    }
static public function ctrBorrarCategorias(){
    if (isset ($_GET["idCategoria"])){
    if ($_GET["idCategoria"]){
        $item="id";
        $valor= $_GET["idCategoria"];
            if ($_GET["fotoCat"] != "") {

                unlink($_GET["fotoCat"]);
                rmdir('vistas/img/usuarios/' . $_GET["categoria"]);
            }
           $respuesta=ModeloCategorias::mdlEliminarCategorias($item,$valor);
            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "La categoria ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "categorias";

								}
							})

				</script>';
            }

    }

    }
}


}


