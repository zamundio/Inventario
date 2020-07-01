<?php


?>
<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Carga CSV

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Carga CSV</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

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
                <div class="container">
                    <br />
                    <h3 align="center">Import CSV File into Jquery Datatables using PHP Ajax</h3>
                    <br />
                    <form id="upload_csv" method="post" enctype="multipart/form-data">
                        <div class="col-md-3">
                            <br />
                            <label>Add More Data</label>
                        </div>
                        <div class="col-md-4">
                            <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
                        </div>
                        <div class="col-md-5">
                            <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
                        </div>
                        <div style="clear:both"></div>
                    </form>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="data-table">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>



                </body>

                <!-- /.box-body -->

                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php



