<?php
include "Modalescategoria.php"

?>
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

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php

$borrarCategoria = new ControladorCategorias();
$borrarCategoria->ctrBorrarCategorias();
