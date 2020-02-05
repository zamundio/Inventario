<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Estructura Red

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Estructura Red</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->


        <div class="col-lg-4">
            <!-- general form elements -->
            <div class="box box-primary ">

                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="input-group col-xs-8">
                            <span class="input-group-addon" id="search-addon"><span class="fa fa-th-list"></span></span>

                            <input type="text" id="busqueda_tree" class="form-control" placeholder="Buscar.." aria-describedby="busqueda-addon">

                            <span class="input-group-addon" id="busqueda-addon"><span class="fa fa-search"></span></span>
                        </div>
                        </br>
                        <div id="tree-container"></div>
                    </div>
                    <!-- /.box-body -->


                </form>
            </div>
            <!-- /.box-body -->



            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        <div class="col-lg-8">
            <!-- general form elements -->
            <div class="box box-primary ">

                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">

                        <div class="form-row">
                            <div class="form-group col-md-1">
                                <label for="Codigo">Codigo</label>
                                <input type="text" class="form-control" id="Codigo" placeholder="">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" placeholder="">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="Apellidos" placeholder="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fechaalta">Fecha de alta</label>
                            <div class="input-group">
                                <input id="fechaalta" name="fechaalta" type="text" class="form-control">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-1">
                                <label for="linea">Linea</label>
                                <input type="text" class="form-control" id="linea">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputCity">Dirección</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>

                        </div>
                        <!-- /.box-body -->


                </form>
            </div>
            <!-- /.box-body -->



            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
