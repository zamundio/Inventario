<?php
include "Modalesusuario.php";
?>

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

            <table class="table table-bordered table-striped dt-responsive tablas">
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
                    <?php
                    $item = null;
                    $valor = null;
                    $usuarios = ControladorUsuarios::ctrMostrarusuarios($item, $valor);
                    foreach ($usuarios as $key => $value) {
                        echo '<tr>';
                        echo '<td>' . $value["id"] . '</td>';
                        echo '<td>' . $value["nombre"] . '</td>';
                        echo '<td>' . $value["usuario"] . '</td>';
                        if ($value["foto"] != "") {
                            echo '<td><img src=' . $value["foto"] . ' class="img-thumbnail" width="40px"></td>';
                        } else {
                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                        }
                        echo '<td>' . $value["perfil"] . '</td>';
                       switch($value["estado"]){
                            case "1":
                                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] .'" estadoUsuario="2">Activado</button></td>';
                                break;
                            case "2":
                                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                                break;

                       }

                        echo '<td>' . $value["ultimo_login"] . '</td>';
                        echo ' <td>
                            <div class="btn-group">
                                <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"> </i> </button>
                                <button class="btn btn-danger"><i class="fa fa-times"> </i></button>
                            </div>
                        </td>';
                    }
                    ?>

            </table>
        </div>
        <!-- /.box-body -->
    </section>
</div>
<!-- /.box -->
<!-- /.content -->
