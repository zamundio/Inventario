<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar categorías

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar categorías</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                    Agregar Categoria

                </button>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Categoria</th>
                            <th>Descripción</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Fecha Alta</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                        foreach ($categorias as $key => $value) {

                            echo ' <tr>
                  <td>' . $value["id"] . '</td>
                  <td>' . $value["Categoria"] . '</td>
                  <td>' . $value["Descripción"] . '</td>';

                            if ($value["foto"] != "") {

                                echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
                            } else {

                                echo '<td><img src="vistas/img/categorias/default/categories.png" class="img-thumbnail" width="40px"></td>';
                            }



                            if ($value["Estado"] != 0) {

                                echo '<td><button class="btn btn-success btn-xs btnActivarCat" idCategoria="' . $value["id"] . '" estadoCategoria="0">Activado</button></td>';
                            } else {

                                echo '<td><button class="btn btn-danger btn-xs btnActivarCat" idCategoria="' . $value["id"] . '" estadoCategoria="1">Desactivado</button></td>';
                            }

                            echo '<td>' . $value["FechaAlta"] . '</td>
                  <td>

                    <div class="btn-group">

                      <button class="btn btn-warning btnEditarCategoria" idCategoria="' . $value["id"] . '"data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarCategoria" idCategoria="' . $value["id"] . '" fotoCat="' . $value["foto"] . '" categoria="' . $value["Categoria"] . '"><i class="fa fa-times"></i></button>

                    </div>

                  </td>

                </tr>';
                        }


                        ?>

                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar categoría</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" placeholder="Introducir categoría" required>

                            </div>

                        </div>
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg CheckCat" name="nuevaDescripcion" placeholder="Introducir descripcion" required>

                            </div>

                        </div>




                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar categoría</button>

                </div>

                <?php

                $crearCategoria = new ControladorCategorias();
                $crearCategoria->ctrCrearCategoria();

                ?>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar categoría</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>


                                <input type="hidden" name="idCategoria" id="idCategoria" required>

                            </div>

                        </div>
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-commenting"></i></span>

                                <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>




                            </div>

                        </div>
                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                </div>

                <?php

                $editarCategoria = new ControladorCategorias();
                $editarCategoria->ctrEditarCategoria();

                ?>

            </form>

        </div>

    </div>

</div>

<?php

$borrarCategoria = new ControladorCategorias();
/*$borrarCategoria->ctrBorrarCategoria();*/
