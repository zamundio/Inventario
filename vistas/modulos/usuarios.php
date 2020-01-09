<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar usuarios

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar usuarios</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

                    Agregar usuario

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Último login</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                        foreach ($usuarios as $key => $value) {

                            echo ' <tr>
                   <td>' . $value["id"] . '</td>
                  <td>' . $value["nombre"] . '</td>
                  <td>' . $value["usuario"] . '</td>';

                            if ($value["foto"] != "") {

                                echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                            } else {

                                echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                            }

                            echo '<td>' . $value["perfil"] . '</td>';

                            if ($value["estado"] != 0) {

                                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                            } else {

                                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                            }

                            echo '<td>' . $value["ultimo_login"] . '</td>
                  <td>

                    <div class="btn-group">

                      <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>

                    </div>

                  </td>

                </tr>';
                        }


                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    ?>
    <div class="modal-dialog" id="modalAgregarUsuario_dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar usuario</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Nombre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Usuario" required>

                            </div>
                            <!-- FIN ENTRADA PARA EL USUARIO -->
                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class=" form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Contraseña" required>

                            </div>
                            <!-- FIN ENTRADA PARA LA CONTRASEÑA -->
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL PERFIL   -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevoPerfil" required>
                                    <option value="">Seleccionar Perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                            <!-- FIN ENTRADA PARA SELECCIONAR EL PERFIL   -->
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR FOTO   -->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO </div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">peso maximo de la foto 2 Mb</p>
                            <img src="vistas\img\usuarios\default\anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            </input>
                        </div>
                        <!--FIN ENTRADA PARA SELECCIONAR FOTO   -->

                    </div>



                </div>

                <!-- PIE MODAL -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pull-left">Guardar Cambios</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
                <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrCrearUsuario();
                ?>
                <!-- --Fin formulario -->
            </form>
            <!--  class="modal-content"-->
        </div>
        <!--  class="modal-dialog" -->
    </div>
    <!-- class="modal fade" -->
</div>


<!--========================================================================================
MODAL EDITAR USUARIO
===========================================================================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
    ?>
    <div class="modal-dialog" id="modalEditarUsuario_dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar usuario</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" id="editarNombre" pattern="[a-zA-Z 0-9ñÑáéíóúÁÉÍÓÚ]+" name="editarNombre" placeholder="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL USUARIO(no modificable en la edicion) -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

                            </div>
                            <!-- FIN ENTRADA PARA EL USUARIO -->
                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lg" name="editarPassword" pattern="[a-zA-Z0-9]+" placeholder="Escriba la nueva Contraseña">
                                <input type="hidden" id="passwordActual" name="passwordActual">


                            </div>
                            <!-- FIN ENTRADA PARA LA CONTRASEÑA -->
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL PERFIL   -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarPerfil">
                                    <option value="" id="editarPerfil"></option>
                                    </option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                            <!-- FIN ENTRADA PARA SELECCIONAR EL PERFIL   -->
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR FOTO   -->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO </div>
                            <input type="file" class="nuevaFoto" id="editarFoto" name="editarFoto">
                            <p class="help-block">peso maximo de la foto 2 Mb</p>
                            <img src="vistas\img\usuarios\default\anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            </input>
                            <input type="hidden" id="fotoActual" name="fotoActual">
                        </div>
                        <!--FIN ENTRADA PARA SELECCIONAR FOTO   -->

                    </div>



                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pull-left">Modificar usuario</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
                <?php
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();
                ?>
                <!-- --Fin formulario -->
            </form>
            <!--  class="modal-content"-->
        </div>
        <!--  class="modal-dialog" -->
    </div>
    <!-- class="modal fade" -->
</div>
