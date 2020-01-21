<!--=====================================
MODAL EDITAR USUARIO
======================================-->

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
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Modelo">Modelo</label>
                                <div class="col-md-4">
                                    <input id="Modelo" name="Modelo" type="text" placeholder="" class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">NS</label>
                                <div class="col-md-4">
                                    <input id="textinput" name="textinput" type="text" placeholder="Numero de Serie" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="selectLoc">Localizacion</label>
                                <div class="col-md-4">
                                    <select id="selectLoc" name="selectLoc" class="form-control">
                                        <option value="1">Option one</option>
                                        <option value="2">Option two</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="selectdeleg">Delegado</label>
                                <div class="col-md-4">
                                    <select id="selectdeleg" name="selectdeleg" class="form-control">
                                        <option value="1">Option one</option>
                                        <option value="2">Option two</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textObs">Observaciones</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="textObs" name="textObs"></textarea>
                                </div>
                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="buttonSubmit">Actualizar</label>
                                <div class="col-md-8">
                                    <button id="buttonSubmit" name="buttonSubmit" class="btn btn-success">OK</button>
                                    <button id="buttonDiscard" name="buttonDiscard" class="btn btn-danger">Cancelar</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <?php



    ?>
