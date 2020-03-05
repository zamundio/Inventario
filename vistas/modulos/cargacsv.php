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
                <h2>Import CSV file into Mysql using PHP</h2>

                <div id="response" class="<?php if (!empty($type)) {
                                                echo $type . " display-block";
                                            } ?>"><?php if (!empty($message)) {
                                                        echo $message;
                                                    } ?></div>
                <div class="outer-scontainer">
                    <div class="row">

                        <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                            <div class="input-row">
                                <label class="col-md-4 control-label">Choose CSV
                                    File</label> <input type="file" name="file" id="file" accept=".csv">
                                <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                                <br />

                            </div>

                        </form>
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


if (isset($_POST["import"])) {
    $campos[]=null;
    $stmt = Conexion::conectar()->prepare("SHOW COLUMNS FROM test");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       if($row['Field']){
        array_push($campos, $row['Field']);
       }
}

ModeloMaestras::mdlImportCSV("test",$campos);


  /*  $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into users (userId,userName,password,firstName,lastName)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "')";
            $result = mysqli_query($conn, $sqlInsert);

            if (!empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}*/
}
?>
