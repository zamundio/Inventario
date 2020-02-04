<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Tablero

            <small>Panel de Control</small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

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
                            <span class="info-box-number">5 <small> </small></span>
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
                            <span class="info-box-number">0 <small> </small></span>
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
                            <span class="info-box-number">2 <small> </small></span>
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
                            <span class="info-box-number">5 <small> </small></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->


            <div class="col-md-2" style="width:20%;">
                <a href="http://helpdesk.test/duetoday">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fas fa-keyboard"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Accesorios</span>
                            <span class="info-box-number">1 <small> Tickets</small></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
                <!-- /.info-box -->
            </div>

        </div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div id="tree-container"></div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$res = ControladorDelegados::ctrMostrarDelegados();
//iterate on results row and create new index array of data

$username = "root";
$password = "sfs2018";
$dbname = "inventario";
$servername = "localhost";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "SELECT * FROM `treeview` ";
$res = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
//iterate on results row and create new index array of data
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
$itemsByReference = array();

// Build array of item references:
foreach ($data as $key => &$item) {
    $itemsByReference[$item['id']] = &$item;

    // Children array:
    $itemsByReference[$item['id']]['children'] = array();
    // Empty data class (so that json_encode adds "data: {}" )
    $itemsByReference[$item['id']]['data'] = new StdClass();
}
var_dump($itemsByReference[$item['id']]['data']);
?>




?>
