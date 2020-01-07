<!--=====================================
MODAL AGREGAR CATEGORIA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
    ?>
    <div class="modal-dialog" id="modalAgregarCategoria_dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Categoria</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" placeholder="Categoria" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA DESCRIPCION -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>

                                <input type="text" class="form-control input-lg " name="nuevaDescripcion" id="nuevaDescripcion" placeholder="Descripción" required>

                            </div>
                            <!-- FIN ENTRADA PARA LA DESCRIPCION -->
                        </div>


                        <!-- ENTRADA PARA SELECCIONAR FOTO   -->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO </div>
                            <input type="file" class="nuevaFoto" name="nuevaFotoCat">
                            <p class="help-block">peso maximo de la foto 2 Mb</p>
                            <img src="vistas\img\categorias\default\categories.png" class="img-thumbnail previsualizarImgCat" width="100px">
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
                $crearCategoria = new ControladorCategorias();
                $crearCategoria->ctrCrearCategorias();
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
MODAL EDITAR CATEGORIA
===========================================================================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
    ?>
    <div class="modal-dialog" id="modalEditarCategoria_dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Categoria</h4>

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

                                <input type="text" class="form-control input-lg" id="editarCat" pattern="[a-zA-Z 0-9ñÑáéíóúÁÉÍÓÚ]+" name="editarCat" placeholder="" required>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA DESCRIPCION -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>

                                <input type="text" class="form-control input-lg " name="editarDescripcion" id="editarDescripcion" placeholder="" required>

                            </div>
                            <!-- FIN ENTRADA PARA LA DESCRIPCION -->
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FOTO   -->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO </div>
                            <input type="file" class="nuevaFoto" id="editarFoto" name="editarFoto">
                            <p class="help-block">peso maximo de la foto 2 Mb</p>
                            <img src="vistas\img\usuarios\default\anonymous.png" class="img-thumbnail previsualizar" width="100px">
                            </input>
                            <input type="hidden" id="fotoActual" name="fotoActual">
                        </div>
                        <!--FIN ENTRADA PARA SELECCIONAR FOTO   -->

                    </div>



                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pull-left">Modificar Categoria</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
                <?php
                $editarCategoria = new ControladorCategorias();
                $editarCategoria->ctrEditarCategoria();
                ?>
                <!-- --Fin formulario -->
            </form>
            <!--  class="modal-content"-->
        </div>
        <!--  class="modal-dialog" -->
    </div>
    <!-- class="modal fade" -->
</div>
