<?php
$jsonData = array();
$jsondata['success'] = true;
$jsonData['message'] = 'Hola! El valor recibido es correcto.';
echo json_encode($jsonData);
if (!empty($_FILES['csv_file']['name'])) {
    $campos[] = null;


    $stmt = Conexion::conectar()->prepare("SHOW COLUMNS FROM test");
    $stmt->execute();
    $NumColumns = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($row['Field']) {
            array_push($campos, $row['Field']);
            $NumColumns++;
        }
    }


    $sql_campos = null;

    foreach ($campos as $campo) {
        $sql_campos = $sql_campos . "," . $campo;
    }




    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");
        // SE OBVIA LA PRIMERA FILA, QUE CONTIENE LOS NOMBRES
        $first_line = $column = fgetcsv($file, 1000, ";");
        $NumRows = 0;
        while (($column = fgetcsv($file, 1000, ";")) !== FALSE) {
            $NumRows++;
            // SE CARGA EN UN ARRAY LOS VALORES DE LAS COLUMNAS
            unset($valores);
            $valores = array();

            for ($i = 0; $i < $NumColumns; $i++) {

                array_push($valores, $column[$i]);
            }

            // SE CONCATENAN LOS VALORES DE LAS COLUMNAS PARA PASARLOS EN UNA CADENA SQL
          /*  $sql_valores = null;
            foreach ($valores as $valor) {
                $sql_valores = $sql_valores .  "','" . $valor;
            }

            $result = ModeloMaestras::mdlImportCSV("test", substr($sql_campos, 2), substr($sql_valores, 3));

            if ($result = "ok") {

                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }*/
        }
    }


}
