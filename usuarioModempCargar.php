<?php
    session_start();
    $idempleado = $_POST['idempleado'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $sexo = $_POST['sexo'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fechaing = $_POST['fechaing'];
    $fechanac = $_POST['fechanac'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Cargar cambios empleado.</title>
</head>


<body>
    <header>
      <h2>Cargar cambios empleado.</h2>
    </header>
    <section>
    <?php
        include "conexion.php";
        
        if($dbh != null){
            $stmt = $dbh -> prepare("UPDATE empleado 
            SET nombre = ?, paterno = ?, materno = ?, sexo = ?, 
            curp = ?, rfc = ?, direccion = ?, telefono = ?, 
            email = ?, fechaing = ?, fechanac = ?
            WHERE empleado.idempleado = ?");

            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $paterno);
            $stmt->bindParam(3, $materno);
            $stmt->bindParam(4, $sexo);
            $stmt->bindParam(5, $curp);
            $stmt->bindParam(6, $rfc);
            $stmt->bindParam(7, $direccion);
            $stmt->bindParam(8, $telefono);
            $stmt->bindParam(9, $email);
            $stmt->bindParam(10, $fechaing);
            $stmt->bindParam(11, $fechanac);
            $stmt->bindParam(12, $idempleado);
            

            $stmt->execute();

        echo "<h2>La modificacion del cliente: $nombre se realizo exitosamente.   </h2> ";
        echo '<br><br><a href="usuarioElimMod.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
      </svg>Regresar</a>';

        }
    ?>   
    

    </section>

</body>
  
</html>