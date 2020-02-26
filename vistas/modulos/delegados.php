<?php
include "Modalesdelegado.php";

$ComboJV = ControladorDelegados::ctrMostrarJV();

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar delegados

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="active">Administrar delegados</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">
                <div class="col align-self-start">
                    <div class="form-group">
                        <select class="selectpicker show-menu-arrow" title="Jefatura Ventas" data-style="form-control" id="SelectJV" data-live-search="true">
                            <option data-tokens="*"> </option>
                            <?php
                            foreach ($ComboJV as $key => $value) {
                                echo '<option data-tokens=' . $value["Primer Apellido"] . ' value=' . $value["Codigo"] . '>' . $value["Primer Apellido"] . '</option>';
                            }
                            ?>
                        </select>
                        <button class="btn btn-primary" data-container="body" name="submitJV" id="submitJV" type="submit">Buscar</button>
                        <select class="selectpicker show-menu-arrow" title="Gerente" data-style="form-control" id="SelectGA" data-live-search="true">
                            <option data-tokens="*"> </option>

                        </select>
                        <button class="btn btn-primary" data-container="body" name="submitGA" id="submitGA" type="submit">Buscar</button>
                    </div>
                </div>

            </div>






            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive table-hover TablaDelegados" id="TablaDelegados" width="100%">

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
                            <th data-visible="false">codGer</th>
                            <th>Gerente</th>
                            <th>Linea</th>
                            <th>Movil</th>
                            <th>PIN</th>
                            <th>PUK</th>
                            <th>Acciones</th>






                        </tr>

                    </thead>



                </table>

            </div>

        </div>

    </section>

</div>
<script>
    $(function() {

        $('#TablaDelegados tbody').delegate("tr", "click", rowClick);
    });
</script>
