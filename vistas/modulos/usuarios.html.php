<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar usuarios

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar usuarios</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->

        <div class="box-header with-border">

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- BOTON AGREGAR USUARIO -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>

        <div class="box-body">

            <table  class="table table-bordered table-striped dt-responsive tablas">
                <thead>
                    <tr>
                        <th style="width:10px">#</th>
                        <th>Nombre</th>
                        <th>usuario</th>
                        <th>Foto</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Ultimo Login</th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Usuario Administrador</td>
                        <td>admin</td>
                        <td><img src="vistas/img/usuarios/IMG_20170916_173313.jpg" class="img-thumbnail" width="40px"></td>
                        <td> Administrator</td>
                        <td><button class="btn btn-success btn-xs">Activado</button></td>
                        <td>12-01-2019</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"> </i> </button>
                                <button class="btn btn-danger"><i class="fa fa-times"> </i></button>
                            </div>
                        </td>
                    <tr>
                        <td>2</td>
                        <td>User</td>
                        <td>admin</td>
                        <td><img src="vistas/img/usuarios/IMG_20170916_173313.jpg" class="img-thumbnail" width="40px"></td>
                        <td> Administrator</td>
                        <td><button class="btn btn-success btn-xs">Activado</button></td>
                        <td>12-01-2019</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="fa fa-pencil"> </i> </button>
                                <button class="btn btn-danger"><i class="fa fa-times"> </i></button>
                            </div>
                        </td>
                    </tr>
            </table>


        </div>


        <!-- /.box-body -->
    </section>
</div>
<!-- /.box -->


<!-- /.content -->
<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

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

                                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Usuario" id="nuevoUsuario" required>

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
                                <select class="form-control input-lg" name="NuevoPerfil">
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
                            <input type="FILE" name="NuevaFoto" id="NuevaFoto">
                            <p class="help-block">peso maximo de la foto 20 Mb</p>
                            <img src="vistas\img\usuarios\default\anonymous.png" class="img-thumbnail" width="100px">
                            </input>
                        </div>
                        <!--FIN ENTRADA PARA SELECCIONAR FOTO   -->

                    </div>



                </div>

                <!-- PIE MODAL -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left">Guardar Cambios</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>

                <!-- --Fin formulario -->
            </form>
            <!--  class="modal-content"-->
        </div>
        <!--  class="modal-dialog" -->
    </div>
    <!-- class="modal fade" -->
</div>
