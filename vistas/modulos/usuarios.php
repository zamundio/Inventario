<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
   
      <div class="box-header with-border">
        <h3 class="box-title">Title</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
                        
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>usuario</th>
                  <th>Foto</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Ultimo Login</th>
                  <th> Acciones </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Usuario Administrador</td>
                  <td>admin</td>
                  <td><img src="vistas/img/usuarios/IMG_20170916_173313.jpg" class="img-thumbnail" width="40px"></td>
                  <td> Administrator</td>
                  <td><button class="btn btn-success btn-xs">Activado</button></td>
                  <td>12-01-2019</td>
                  <td>
                    <div class="btn-group" >
                       <button class="btn btn-warning" data-toggle="modal" data-target="#ModalUser"><i class="fa fa-pencil"> </i> </button>
                       <button class="btn btn-danger"><i class="fa fa-times"> </i></button>
                    </div>
                </td>
                  <tr> 
                 <td>2</td>
                  <td>User</td>
                  <td>admin</td>
                  <td><img src="vistas/img/usuarios/IMG_20170916_173313.jpg" class="img-thumbnail" width="40px"></td>
                  <td> Administrator</td>
                  <td><button class="btn btn-success btn-xs">Activado</button></td>
                  <td>12-01-2019</td>
                  <td>
                    <div class="btn-group" >
                       <button class="btn btn-warning" data-toggle="modal" data-target="#ModalUser"><i class="fa fa-pencil"> </i> </button>
                       <button class="btn btn-danger"><i class="fa fa-times"> </i></button>
                    </div>
                </td>
             </tr>
              </table>


      </div>
    

      <!-- /.box-body -->
     
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->

</div>
/*=============================================
=          MODAL AGREGAR USUARIO              =
=============================================*/

<div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" >
  
  <div class="modal-dialog" role="document">
    
    <div class="modal-content" >
     
      <div class="modal-header" style="background:#3c8dbc;color:white">
       
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Usuarios</h4>
         
      </div>
      
      <div class="modal-body">
        <div class="form-group">
          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Introduzca Nombre" required>
        </div>

      </div>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>



