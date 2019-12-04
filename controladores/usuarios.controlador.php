<?php

class controladorUsuarios{

	
public function ctrIngresousuarios(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"]) ){

				$tabla="usuarios";
				$item="usuario";
				$valor= $_POST["ingUsuario"];
				$respuesta=modeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);
				
				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){
					
					
					$_SESSION["IniciarSesion"] = "ok";
				
					echo '<script>
					window.location="Inicio";
					<script>';

						



				

				}else{

					
					echo '<br><div class="alert alert-danger">Error al entrar, vuelve a intentarlo</div>';

				}

			}	
				
			}
				

			}
		}