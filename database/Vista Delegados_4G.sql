CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `delegados_lineas4g` AS
    SELECT 
        `delegados`.`Codigo` AS `Codigo`,
        `delegados`.`Nombre` AS `Nombre`,
        `delegados`.`Primer Apellido` AS `Primer Apellido`,
        `delegados`.`Segundo Apellido` AS `Segundo Apellido`,
        DATE_FORMAT(`delegados`.`Fecha de Alta`, '%d-%m-%Y') AS `Fecha de Alta`,
        `delegados`.`Email` AS `Email`,
        DATE_FORMAT(`delegados`.`Fecha Baja`, '%d-%m-%Y') AS `Fecha Baja`,
        `delegados`.`SubArea` AS `SubArea`,
        `delegados`.`Gerente` AS `Gerente`,
        `delegados`.`Linea` AS `Linea`,
        `lineas_4g`.`sim` AS `SIM`,
        `lineas_4g`.`movil` AS `Movil`,
        `lineas_4g`.`pin` AS `PIN`,
        `lineas_4g`.`puk` AS `PUK`
    FROM
        (`delegados`
        LEFT JOIN `lineas_4g` ON ((`delegados`.`Codigo` = `lineas_4g`.`codigo`)))