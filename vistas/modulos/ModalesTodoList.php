<!--=====================================
MODAL EDITAR TAREA
======================================-->

<!-- Modal -->
<div class="modal custom" id="ModalEditarTODO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Tarea</h5>

                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="TextItem" name="TextItem">
                    <input type="hidden" class="form-control" id="IdItem" name="IdItem">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

$editItem = new ControladorMaestras;
$respuesta = $editItem->EditItemList();


?>
<!--=====================================
MODAL ELIMINAR TAREA
======================================-->

<!-- Modal -->
<div class="modal custom" id="ModalBorrarTODO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Tarea</h5>

                </div>
                <div class="modal-body">


                    Esta seguro de borrar la tarea <span id="tarea"></span> ?

                    <input type="hidden" class="form-control" id="IdItemBorrar" name="IdItemBorrar">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?php

$editItem = new ControladorMaestras;
$respuesta = $editItem->DeleteItemList();


?>

<!--=====================================
MODAL AÑADIR TAREA
======================================-->

<!-- Modal -->
<div class="modal custom" id="ModalAñadirTODO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir Tarea</h5>

                </div>
                <div class="modal-body">

                    <input type="text " class="form-control" id="textItemAñadir" name="textItemAñadir">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-success">Añadir</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?php

$editItem = new ControladorMaestras;
$respuesta = $editItem->AddItemList();


?>
