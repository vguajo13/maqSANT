<?php
    $dbname = "maquinaria_santana"; //base de datos
    $user = "root";// usuario
    $password = "1234";// contraseña
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ  );

    try {
        //CONEXION A LA BASE DE DATOS.
        $dsn = "mysql:host=localhost;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password, $options);

    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    
    }
?>