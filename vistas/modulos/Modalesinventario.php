<!--=====================================
MODAL EDITAR USUARIO
======================================-->
<?php


$Combodelegados = ControladorDelegados::ctrMostrarDelegados();
$ComboLocalizaciones = controladorMaestras::ctrMostrarLocalizacion();
$ComboEstado = ControladorMaestras::ctrMostrarEstado()
?>

<div id="modalEditarInventario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" class="form-horizontal" enctype="multipart/form-data">

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



                        <div class="form-group">
                            <label for="NS" class="control-label col-xs-3">Numero de Serie</label>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-laptop"></i>
                                    </div>
                                    <input id="NS" name="NS" type="text" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TipoDisp" class="control-label col-xs-3">Tipo Disp.</label>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-keyboard"></i>
                                    </div>
                                    <input id="TipoDisp" name="TipoDisp" type="text" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Modelo" class="control-label col-xs-3">Modelo</label>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-tablet-alt"></i>
                                    </div>
                                    <input id="Modelo" name="Modelo" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selectDel" class="control-label col-xs-3">Asignado a</label>
                            <div class="col-xs-8">
                                <select class="selectpicker show-menu-arrow" title="Asignar a..." data-style="form-control" id="selectDel" data-live-search="true">
                                    <option data-tokens="*"> </option>
                                    <?php
                                    foreach ($Combodelegados as $key => $value) {
                                        echo '<option data-tokens=' . $value["Delegado"] . ' value=' . $value["Codigo"] . '>' . $value["Delegado"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selectLoc" class="control-label col-xs-3">Localización</label>
                            <div class="col-xs-8">
                                <select id="selectLoc" name="selectLoc" required="required" class="select form-control">
                                    <?php
                                    foreach ($ComboLocalizaciones as $key => $value) {
                                        echo '<option value=' . $value["Id_Localizaciones"] . '>' . $value["Nombre"] . '</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selectEstado" class="control-label col-xs-3">Estado</label>
                            <div class="col-xs-8">
                                <select id="selectEstado" name="selectEstado" required="required" class="select form-control">
                                    <?php
                                    foreach ($ComboEstado as $key => $value) {
                                        echo '<option value=' . $value["Id"] . '>' . $value["Estado"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textComentarios" class="control-label col-xs-3">Comentarios</label>
                            <div class="col-xs-8">
                                <textarea id="textComentarios" name="textComentarios" cols="40" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                            <button type="submit" class="btn btn-primary">Modificar usuario</button>

                        </div>






                    </div>
                </div>
            </form>

        </div>

    </div>

</div>

<?php



?>
