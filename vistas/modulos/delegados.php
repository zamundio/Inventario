<?php
include "Modalesdelegado.php"

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar delegados

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar delegados</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <!-- NO SE AGREGAN NI SE EDITAN LOS DELEGADOS PORQUE SE CARGAN DESDE UMES

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

                    Agregar delegado

                </button> -->

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:8px">Codigo</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha Alta</th>
                            <th>Email</th>
                            <th>Fecha Baja</th>
                            <th>Estado</th>
                            <th>Zona</th>
                            <th>Gerente</th>
                            <th>Linea</th>
                            <th>Movil</th>
                            <th>PIN</th>
                            <th>PUK</th>
                            <th>Acciones</th>






                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $delegados = ControladorDelegados::ctrMostrarDelegadosView($item, $valor);

                        foreach ($delegados as $key => $value) {

                            echo ' <tr>
                   <td>' . $value["Codigo"] . '</td>
                  <td>' . $value["Nombre"] . '</td>
                  <td>' . $value["Primer Apellido"] . '</td>
                  <td>' . $value["Fecha de Alta"] . '</td>
                  <td>' . $value["Email"] . '</td>
                  <td>' . $value["Fecha Baja"] . '</td>';
                            if (strlen($value["Fecha Baja"]) == 10) {
                                echo '<td <button type="button" class="btn btn-warning btn-xs">Baja</button></td>';
                            } else {
                                echo '<td <button type="button" class="btn btn-success btn-xs">Alta</button></td>';
                            }
                            echo '<td>' . $value["SubArea"] . '</td>';
                            echo '<td>' . $value["NomGer"] . '</td>';
                            echo '<td>' . $value["Linea"] . '</td>';
                            echo '<td>' . $value["Movil"] . '</td>';
                            echo '<td>' . $value["PIN"] . '</td>';
                            echo '<td>' . $value["PUK"] . '</td>';

                            echo '<td>

                    <div class="btn-group">

                      <button class="btn btn-warning btnEditarDelegado"  idDelegado="' . $value["Codigo"] . '" data-toggle="modal" data-target="#modalEditarDelegado"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                    </div>

                  </td>';


                        }





                        echo ' </tr>';

                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>
<?php
/*$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();*/
?>
