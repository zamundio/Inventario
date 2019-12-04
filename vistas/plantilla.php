
<?php
 if ( !isset($_SESSION) ) session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <!--=====================================
  =            CABECERA                   =
  ======================================-->
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Field Force Inventory System</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="vistas/img/plantilla/icono-negro.png">
  <!--=======================
=    PLUGINS CSS            =
==========================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    
    <!-- AdminLTE skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!--=======================
=    PLUGINS JAVASCRIPT   =
========================-->


<!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>

</head>

<!--=====================================
=            CUERPO DOCUMENTO           =
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">



  <?php

 
  if(isset($_SESSION["IniciarSesion"]) && $_SESSION["IniciarSesion"] == "ok"){

    /*=============================================
    CABECERA
    =============================================*/

    include "modulos/cabecera.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menulateral.php";

    /*=============================================
    CONTENIDO
    =============================================*/
 
    if(isset($_GET["ruta"])){
      
      if($_GET["ruta"] == "Inicio" ||
         $_GET["ruta"] == "Usuarios" ||
         $_GET["ruta"] == "Categorias" ||
         $_GET["ruta"] == "Inventario" ||
         $_GET["ruta"] == "Salir")
      {

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.html";

      }

    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

   

  }else{

    include "modulos/login.php";

  }

  ?>



<script src="vistas/js/plantilla.js"></script>

</body>
</html>
