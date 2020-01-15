CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `delegados_ga` AS
    SELECT 
        `ga`.`Primer Apellido` AS `NomGer`,
        `delegados_lineas4g`.`Codigo` AS `Codigo`,
        `delegados_lineas4g`.`Nombre` AS `Nombre`,
        `delegados_lineas4g`.`Primer Apellido` AS `Primer Apellido`,
        `delegados_lineas4g`.`Segundo Apellido` AS `Segundo Apellido`,
        `delegados_lineas4g`.`Fecha de Alta` AS `Fecha de Alta`,
        `delegados_lineas4g`.`Email` AS `Email`,
        `delegados_lineas4g`.`Fecha Baja` AS `Fecha Baja`,
        `delegados_lineas4g`.`SubArea` AS `SubArea`,
        `delegados_lineas4g`.`Gerente` AS `Gerente`,
        `delegados_lineas4g`.`Linea` AS `Linea`,
        `delegados_lineas4g`.`Movil` AS `Movil`,
        `delegados_lineas4g`.`PIN` AS `PIN`,
        `delegados_lineas4g`.`PUK` AS `PUK`
    FROM
        (`delegados_lineas4g`
        JOIN `ga`)
    WHERE
        (`ga`.`Codigo` = `delegados_lineas4g`.`Gerente`)