<?php

include "Modalesestructura.php";


include "Modalmail.php";


?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Estructura Red

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="active">Estructura Red</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- PANEL IZQUIERDO -->


        <div class="col-lg-4">
            <!-- general form elements -->
            <div class="box box-primary ">

                <form role="form" method="post" id=" formtree">

                    <div class="box-body">
                        <div class="input-group col-xs-8">
                            <span class="input-group-addon" id="search-addon"><span class="fa fa-th-list"></span></span>

                            <input type="text" id="busqueda_tree" class="form-control" placeholder="Buscar.." aria-describedby="busqueda-addon">

                            <span class="input-group-addon" id="busqueda-addon"><span class="fa fa-search"></span></span>
                        </div>

                        <div id="tree-container"></div>
                    </div>
                    <!-- /.box-body -->


                </form>
            </div>


        </div>
        <!--PANEL DERECHO -->
        <div class="col-lg-8">

            <div class="box box-primary">


                <form role="form" method="post" id="formdata">
                    <div class="box-body">

                        <div class="form-row">
                            <div class="form-group col-md-1">
                                <label for="Codigo">Codigo</label>
                                <input type="text" class="form-control" id="Codigo" placeholder="">
                                <input type="hidden" class="form-control" id="CodigoSelec">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" placeholder="">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="Apellidos" placeholder="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fechaalta">Fecha de alta</label>
                            <div class="input-group">
                                <input id="fechaalta" name="fechaalta" type="text" class="form-control">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1">
                                <label for="linea">Linea</label>
                                <input type="text" class="form-control" id="linea">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni">
                            </div>
                            <div class="form-group col-md-2">

                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="direccion">Dirección</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="direccion">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" id="botonmaps" type="button" data-toggle="modal" data-target="#ModalMaps" onClick="GetMap()"> <i class="fas fa-map-marker-alt" aria-hidden="true"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->

                            <div class="form-group col-md-3">
                                <label for="poblacion">Poblacion</label>
                                <input type="text" class="form-control" id="poblacion">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="cp">CP</label>
                                <input type="text" class="form-control" id="cp">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="provincia">Provincia</label>
                                <input type="text" class="form-control" id="provincia">
                            </div>
                            <div class="form-group col-xs-2">
                                <label for="telefonoemp">Telefono Empresa</label>
                                <input type="text" class="form-control" id="telefonoemp">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="abrev">Abreviado</label>
                                <input type="text" class="form-control" id="abrev">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="direccion">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="Email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" id="botonmail" type="button" data-toggle="modal" data-target="#modalMail"> <i class="fas fa-envelope" aria-hidden="true"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div>
                        <div class="form-group col-md-2">
                            <label for="chkuser">Checkpoint User</label>
                            <input type="text" class="form-control" id="chkuser">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="chkpwd">Checkpoint Password</label>
                            <input type="text" class="form-control" id="chkpwd">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="sim">Tarjeta Secundaria</label>
                            <input type="text" class="form-control" id="sim">
                        </div>

                        <div class="form-group col-md-1">
                            <label for="sim">PIN</label>
                            <input type="text" class="form-control" id="pin">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="puk">PUK</label>
                            <input type="text" class="form-control" id="puk">
                        </div>
                        <!-- /.box-body -->
                        <table class="table  table-striped table-bordered dt-responsive table-hover TablaLinkedItems" id="TablaLinkedItems" width="100%">

                            <thead>

                                <tr>
                                    <th style="width:8px">Observ</th>
                                    <th style="width:8px">NS</th>
                                    <th>Modelo</th>
                                    <th>Tipo </th>
                                    <th>Localizacion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                </tr>

                            </thead>

                        </table>

                </form>


                <!-- /.box-body -->



                <!-- /.box-body -->

                <!-- /.box-footer-->
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=waa0OVAIKFoFTxQhJmmz~LgnlIZ7aFnqZdryWOk-U1Q~An1_BTTeFUmx127gm-QIdAEfn_Oza3pCpPlAfrfje_aCqlKn96CCvK4R7SP7VveN' async defer></script>
<script>
    $(function() {

        $(' #TablaLinkedItems tbody').delegate("tr", "click", rowClick);
    });
</script>
