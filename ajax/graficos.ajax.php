 <?php


    require_once "../modelos/maestras.modelo.php";

    if (isset($_POST["Grafico"])) {

        $grafico= $_POST["Grafico"];
    switch ($grafico){
        case "Grafico1";
        $tabla = "grafico_estado_pie";
         break;
            case "Grafico2";
                $tabla = "grafico_modelo_pie";
                break;
    }

        $item = null;
        $valor = null;
    $respuesta = ModeloMaestras::mdlMostrarMaestras($tabla, $item, $valor);
    echo json_encode($respuesta);
    }
