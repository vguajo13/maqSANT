<?php
  session_start();
  $titulo = "<br>Login";
  $submenus = false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="navegacion.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">

    
    <title>Login</title>
</head>
<body>

    <?php 
      include "navegacion.php";
    ?>

<section class="sepa">
<?php
        include "conexion.php";
        $ID_usuario = $_POST['ID_usuario'] ;
        $pass = $_POST['pass'];

        if($dbh != null){ // se logro la coneccion
            $stmt = $dbh -> prepare("SELECT user, tipousuario, pass
            FROM usuario
            WHERE user =:ID_usuario AND pass =:pass");
            
            $stmt->bindParam(':ID_usuario', $ID_usuario);
            $stmt->bindParam(':pass', $pass);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $stmt->execute();
            $datos = $stmt->fetch();



            if(!$datos){
                echo "<h2>Lo sentimos no has podido iniciar sesion.   </h2> Usuario o contraseña incorrecta. ";
                echo '<br><br><a href="logv.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
              </svg>Volver</a>';
                exit();

            }elseif($datos["user"] != null){
                $_SESSION["ID_usuario"] = $datos["user"];
                if($datos["tipousuario"] == 'A')
                    $_SESSION["Tipo_usuario"] = "Administrador";
                elseif($datos["tipousuario"] == 'E')
                    $_SESSION["Tipo_usuario"] = "Empleado";
                else
                    $_SESSION["Tipo_usuario"] = "Cliente";

                echo "<h2>Inicio de sesion.   </h2> Como ". $_SESSION["Tipo_usuario"]. 
                    " Bienvenido " .$_SESSION["ID_usuario"];
                    echo '<br><br><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                  </svg>Regresar</a>';
            }

            $dbh = null;
            
        }else{
            echo "No se logro la conexion con la base de datos.";
        }

        header('refresh: 3; url=index.php');

        exit;
    ?>

</section>
    <?php
        include "footer.php";
    ?>
</body>

</html>



