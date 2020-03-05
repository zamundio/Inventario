<?php
include "ModalesTodoList.php";
function get_format($df)
{
    global $fechas;
    $i = 0;
    $str = '   ';
    $str .= ($df->invert == 1) ? ' - ' : '';
    if ($df->y > 0) {
        // years
        $str .= ($df->y > 1) ? $df->y . '   Años ' : $df->y . '   Año ';
        $fechas[$i] =  $str;
        $i++;
    }
    if ($df->m > 0) {
        // month
        $str .= ($df->m > 1) ? $df->m . '   Meses ' : $df->m . '  Mes ';
        $fechas[$i] =  $str;
        $i++;
    }
    if ($df->d > 0) {
        // days
        $str .= ($df->d > 1) ? $df->d . '   Dias ' : $df->d . '   Dia ';
        $fechas[$i] =  $str;
        $i++;
    }
    if ($df->h > 0) {
        // hours
        $str .= ($df->h > 1) ? $df->h . '   Horas ' : $df->h . '   Hora ';
        $fechas[$i] =  $str;
        $i++;
    }
    if ($df->i > 0) {
        // minutes
        $str .= ($df->i > 1) ? $df->i . '   Minutos ' : $df->i . '   Minuto ';
        $fechas[$i] =  $str;
        $i++;
    }
    if ($df->s > 0) {
        // seconds
        $str .= ($df->s > 1) ? $df->s . '   Segundos ' : $df->s . '   Segundo ';
        $fechas[$i] =  $str;
        $i++;
    }
}

$tabla = "log_movimientos_view";

$item = null;
$valor = null;
$CheckAlta = null;
$log = ModeloMaestras::mdlMostrarMaestras($tabla, $item, $valor);



$tabla = "todo_list";
$todo = ModeloMaestras::mdlMostrarMaestras($tabla, $item, $valor);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<div class="content-wrapper">

    <section class="content-header">


        <h1>

            Dashboard

            <small></small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="active">Tablero</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- <div class="col-md-3 col-sm-6 col-xs-12"> -->
            <div class="col-md-2" style="width:20%;">
                <a href="delegados">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Delegados</span>
                            <?php

                            $tabla = "delegados_ga";
                            $item = "Linea";
                            $value = "OTC";
                            $TotalOTC = ControladorMaestras::TotalTablas($tabla, $item, $value);
                            $tabla = "totallineaseticos";
                            $item = null;
                            $value = null;
                            $TotalEticos = ControladorMaestras::TotalTablas($tabla, $item, $value);
                            $TotaDel = $TotalEticos[0][0] + $TotalOTC[0][0];
                            echo '<span class="info-box-number">' . $TotalEticos[0][0] . ' + ' . $TotalOTC[0][0] . " = " . $TotaDel  . ' <small> </small></span>';

                            ?>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <!-- <div class="col-md-3 col-sm-6 col-xs-12"> -->
            <div class="col-md-2" style="width:20%;">
                <a href="http://helpdesk.test/unassigned">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="fas fa-user-graduate"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Gerentes De Area</span>
                            <?php

                            $tabla = "delegados_ga";
                            $item = "Linea";
                            $value = "AM";
                            $TotalAM = ControladorMaestras::TotalTablas($tabla, $item, $value);
                            $value = "GA";
                            $TotalGA = ControladorMaestras::TotalTablas($tabla, $item, $value);
                            $TotalMan = $TotalAM[0][0] + $TotalGA[0][0];
                            echo '<span class="info-box-number">' . $TotalGA[0][0] . ' + ' . $TotalAM[0][0] . " = " . $TotalMan  . ' <small> </small></span>';

                            ?>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <!-- <div class="col-md-3 col-sm-6 col-xs-12"> -->
            <div class="col-md-2" style="width:20%;">
                <a href="inventario">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fas fa-laptop"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">equipos</span>
                            <?php

                            $tabla = "inventario_view";
                            $item = "TipoMaq";
                            $value = "Tablet";
                            $TotalTab = ControladorMaestras::TotalTablas($tabla, $item, $value);

                            echo '<span class="info-box-number">' . $TotalTab[0][0] . ' <small> </small></span>';

                            ?>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <!-- <div class="col-md-3 col-sm-6 col-xs-12"> -->
            <div class="col-md-2" style="width:20%;">
                <a href="http://helpdesk.test/ticket/myticket">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fas fa-print"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Impresoras</span>
                            <?php

                            $tabla = "inventario_view";
                            $item = "TipoMaq";
                            $value = "Impresora";
                            $TotalImpr = ControladorMaestras::TotalTablas($tabla, $item, $value);

                            echo '<span class="info-box-number">' . $TotalImpr[0][0] . ' <small> </small></span>';

                            ?>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->


            <div class="col-md-2" style="width:20%;">
                <a href="norecepcionados">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fas fa-cart-arrow-down"></i></span>
                        <div class="info-box-content">


                            <span class="info-box-text">Equipos no Recepcionados</span>
                            <?php

                            $tabla = "equipos_no_recepcionados";
                            $item = null;
                            $value = null;
                            $TotalNoRecep = ControladorMaestras::TotalTablas($tabla, $item, $value);

                            echo '<span class="info-box-number">' . $TotalNoRecep[0][0] . ' <small> </small></span>';

                            ?>

                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
                <!-- /.info-box -->
            </div>

        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-5 connectedSortable">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tablets Por Estado</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="pieChart1" style="height:250px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ultimos Movimientos </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">

                            <?php
                            $i = 0;
                            foreach ($log as $key => $value) {
                                if ($i > 3) {
                                    break;
                                }
                                switch ($value["Estado_Actual"]) {
                                    case "Asignado":
                                        $etiq_estado = '<span class="label label-success pull-right">' . $value["Estado_Actual"] . '</span></a>';
                                        break;
                                    case "Robado":
                                        $etiq_estado = '<span class="label label-danger pull-right">' . $value["Estado_Actual"] . '</span></a>';
                                        break;
                                    case "Retirado":
                                        $etiq_estado = '<span class="label label-warning pull-right">' . $value["Estado_Actual"] . '</span></a>';
                                        break;
                                    default:
                                        $etiq_estado = '<span class="label label-info pull-right">' . $value["Estado_Actual"] . '</span></a>';
                                        break;
                                }

                                $i++;
                                if ($value["DelegadoNew"] == null) {
                                    $delnew = $value["Estado_Actual"];
                                } else {
                                    $delnew = $value["DelegadoNew"];
                                }


                                echo '
                               <li class="item">

                                     <div class="product-info">
                                         <a href="javascript:void(0)" class="product-title">     ' . $value["NS"] . '-' . $value["DelegadoOld"] . '-->' . $delnew . $etiq_estado . '
                                <span class="product-description">' .
                                    $value["ObservacionesNew"] . '
                        </span>
                  </div>';
                            }


                            ?>



                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="log" class="uppercase">Ver Todos los Movimentos</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>




            <!-- /.col (LEFT) -->
            <div class="col-md-7 connectedSortable">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Por Tipo Dispositivo</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="pieChart2" style="height:250px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

            <div class="col-md-7 connectedSortable">
                <!-- TO DO List -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>

                        <h3 class="box-title">Lista de Tareas</h3>
                        <br> </br>
                        <ul class="todo-list">

                            <?php
                            foreach ($todo as $key => $value) {

                                $pre = " <li>

                                 <span class='handle'>
                                     <i class='fa fa-ellipsis-v'></i>
                                     <i class='fa fa-ellipsis-v'></i>
                                 </span>

                                 <input type='checkbox' value='checked'  >

                                 <span class='text'>";
                                $post_label_success = "</span> <small class='label label-success'><i class='fa fa-clock'></i>";
                                $post_label_info = "</span> <small class='label label-info'><i class='fa fa-clock'></i>";
                                $post_label_warning = "</span> <small class='label label-warning'><i class='fa fa-clock'></i>";
                                $post_label_danger = "</span> <small class='label label-danger'><i class='fa fa-clock'></i>";
                                $post_tools = "</small><div class='tools'>
                                     <button class='EditarTodo' data-modal-position='modal-bottom-right' data-toggle='modal'  data-target='#ModalEditarTODO' idTodo=" . $value["id"] . " ><i class='fa fa-edit' ></i></button>
                                    <button class='BorrarTodo' data-modal-position='modal-bottom-right' data-toggle='modal'  idTodo=" . $value["id"] . " ><i class='fa fa-trash' ></i></button>
                                 </div>
                             </li>";

                                $date1 = new DateTime($value["fecha"]);
                                $date2 = $now = new DateTime();
                                $diff = $date1->diff($date2);


                                $fechas = null;
                                // will output 2 days
                                get_format($diff);

                                switch (true) {
                                    case stristr($fechas[0], 'dia'):
                                        $post_label = $post_label_warning;
                                        break;
                                    case stristr($fechas[0], 'hora'):
                                        $post_label = $post_label_success;
                                        break;
                                    case stristr($fechas[0], 'semana'):
                                        $post_label = $post_label_danger;
                                        break;
                                    case stristr($fechas[0], 'min'):
                                        $post_label = $post_label_info;
                                        break;
                                    case stristr($fechas[0], 'mes'):
                                        $post_label = $post_label_danger;
                                        break;
                                    default:
                                        $post_label = $post_label_info;
                                        break;
                                }

                                echo $pre . $value["text"] . $post_label . $fechas[0] . $post_tools;
                            }


                            ?>

                        </ul>
                    </div>




                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right" data-modal-position='modal-bottom-right' data-toggle='modal' data-target='#ModalAñadirTODO'><i class="fa fa-plus"></i> Añadir Tarea</button>
                    </div>
                </div>







    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
