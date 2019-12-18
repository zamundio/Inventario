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

                                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Usuario" required>

                            </div>
                            <!-- FIN ENTRADA PARA EL USUARIO -->
                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

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
                                <select class="form-control input-lg" name="nuevoPerfil">
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

                                <input type="text" class="form-control input-lg" name="editarNombre" placeholder="" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lg" name="editarUsuario" placeholder="" required>

                            </div>
                            <!-- FIN ENTRADA PARA EL USUARIO -->
                        </div>

                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Contraseña" required>

                            </div>
                            <!-- FIN ENTRADA PARA LA CONTRASEÑA -->
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL PERFIL   -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarPerfil">
                                    <option value="">Editar Perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                            <!-- FIN ENTRADA PARA SELECCIONAR EL PERFIL   -->
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR FOTO   -->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO </div>
                            <input type="file" class="nuevaFoto" name="editarFoto">
                            <p class="help-block">peso maximo de la foto 2 Mb</p>
                            <img src="vistas\img\usuarios\default\anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            </input>
                        </div>
                        <!--FIN ENTRADA PARA SELECCIONAR FOTO   -->

                    </div>



                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->
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
