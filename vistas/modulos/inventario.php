 <?php
    include "Modalesinventario.php";
    require_once "modelos/inventario.modelo.php";
    require_once "vendor/autoload.php";

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use Symfony\Component\HttpFoundation\StreamedResponse;
    use Symfony\Component\HttpFoundation\Response;



    $ComboJV = ControladorDelegados::ctrMostrarJV();
    ?>





 <div class="content-wrapper">

     <section class="content-header" id="contentheader">

         <h1>

             Administrar Inventario

         </h1>

         <ol class="breadcrumb">

             <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

             <li class="active">Administrar Inventario</li>

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
                         <button class="btn btn-primary" data-container="body" name="ResetFiltros" id="ResetFiltros" type="button">Resetear</button>
                         <button class="btn btn-info" data-container="body" name=" Exportxls_inv" id="Exportxls_inv" type="button" style="position: absolute; right: 0;">Exportar Excel</button>
                     </div>
                 </div>

             </div>



             <div class="box-body">

                 <table class="table  table-striped table-bordered dt-responsive table-hover TablaInventario" id="TablaInventario" width="100%">

                     <thead>

                         <tr>
                             <th style="width:8px">Observ..</th>
                             <th style="width:8px">NS</th>
                             <th data-visible="false">Id_Mod</th>
                             <th>Modelo</th>
                             <th>Tipo </th>
                             <th data-visible="false">Id_loc</th>
                             <th>Localización</th>
                             <th data-visible="false">id_Estado</th>
                             <th>Estado Equipo</th>
                             <th>Codigo</th>
                             <th>Delegado</th>
                             <th>Fecha Baja</th>
                             <th>Estado</th>
                             <th data-visible="false">codGer</th>
                             <th>Gerente</th>
                             <th>Acciones</th>
                         </tr>

                     </thead>

                 </table>


             </div>

         </div>

     </section>
     <script>
         $(function() {

             $('#TablaInventario tbody').delegate("tr", "click", rowClick);
         });
     </script>
 </div>
 <?php

    ?>
