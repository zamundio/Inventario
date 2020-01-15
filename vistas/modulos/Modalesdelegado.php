<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarDelegado" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Delegados</h4>

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

                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" readonly>

                            </div>

                        </div>

                        <!-- APELLIDOS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                                <input type="text" class="form-control input-lg" id="editarApellidos" name="editarApellidos" value="" readonly>

                            </div>

                        </div>


                        <!-- EMAIL -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="text" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" readonly>

                            </div>

                        </div>


                        <!-- GERENTE -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>

                                <input type="text" class="form-control input-lg" id="editarGA" name="editarGA" value="" readonly>

                            </div>

                        </div>
                        <!-- LINEA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>

                                <input type="text" class="form-control input-lg" id="editarLinea" name="editarLinea" value="" readonly>

                            </div>

                        </div>
                        <!-- sim -->
                        <div class="form-group">

                            <div class="row col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-wifi"></i></span>
                                    <input type="text" class="form-control input-lg CheckSIM" id="editarSIM" name="editarSIM" data-toggle="tooltip" data-placement="right" title="Numero Tarjeta SIM" value="">
                                </div>
                            </div>
                            <div class="row col-xs-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="text" class="form-control input-lg" id="editarPIN" name="editarPIN" data-toggle="tooltip" data-placement="center" title="PIN"  value="">
                                </div>
                            </div>
                            <div class="row col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                                    <input type="text" class="form-control input-lg" id="editarPUK" name="editarPUK" data-toggle="tooltip" data-placement="left" title="PUK" value="">
                                </div>
                            </div>
                        </div>






                        <!-- movil -->





                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar usuario</button>

                </div>

                <?php

                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();

                ?>

            </form>

        </div>

    </div>

</div>

<?php



?>