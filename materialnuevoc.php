<?php
$titulo = "<br>Registro material";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
   
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">
  
    <title>Registrar producto</title>
</head>
<body>

<section>

<?php
    include "conexion.php";

    $informe = "Informacion";

    $nombre = $_POST['nombre'];
    $caracteristicas = $_POST['caracteristicas'];

    //Ocupamos la conexion para realizar la consulta 

    if($dbh != null){ // se logro la coneccion
        $stmt = $dbh -> prepare("SELECT nombre
        FROM material
        WHERE nombre = ?");

        $stmt->bindParam(1, $nombre);
        
        $stmt->execute();
        $datos = $stmt->fetch();

        if(!$datos){
            //ingresar el usuario a la base de datos
            $stmt2 = $dbh -> prepare("INSERT INTO material
            (nombre, caracteristicas )
            VALUES (?,?)");


            $stmt2->bindParam(1, $nombre);
            $stmt2->bindParam(2, $caracteristicas);
        
            $stmt2->execute();


        echo "El producto : " . $nombre;

        echo "<h2>Se registro en los materiales.   </h2> ";
        echo '<br><br><a href="materialnuevo.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
      </svg>Regresar</a>';

        }
        else{
            echo "El material " . $nombre . " ya existe en la base de datos.";
            retorno();
            exit();    
        }
        
        $dbh = null;
            
    }else{
        echo "No se logro la conexion con la base de datos.";
    }

    function  retorno(){
        echo "<h2>Registro erroneo.   </h2> ";
        echo '<br><br><a href="materialnuevo.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
      </svg>Regresar</a>';

        exit();
    }

?>

</section>
  
</html>