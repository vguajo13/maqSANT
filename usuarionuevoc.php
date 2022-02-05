<?php
$titulo = "<br>Registro";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="navegacion.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">
  
    <title>Registrar</title>
</head>
<body>

<section>

<?php
    include "conexion.php";

    $informe = "Informacion";

    $ID_usuario = $_POST['ID_usuario'];
    $pass = $_POST['contra'];
    $verif = $_POST['veripass'];
    $Tipo_usuario = $_POST['tipo'];



    if ($verif != $pass) {
        echo "Error la contraseña no concuerda";
        retorno();
    }elseif(!checarPassword($pass)){
        echo "Error la contraseña debe contener almenos 8 caracteres 
        un numero una letra y un caracter especial.";
        retorno();
    }elseif(ctype_alnum($pass)){
        echo "Error la contraseña debe contener almenos 8 caracteres 
        un numero una letra y un caracter especial.";
        retorno();
    }

    //Ocupamos la conexion para realizar la consulta 

    if($dbh != null){ // se logro la coneccion
        $stmt = $dbh -> prepare("SELECT idusuario, user, pass, tipousuario 
        FROM usuario
        WHERE user =:ID_usuario ");
        
        $stmt->bindParam(':ID_usuario', $ID_usuario);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        $stmt->execute();
        $datos = $stmt->fetch();

        if(!$datos){
            //ingresar el usuario a la base de datos
            $stmt2 = $dbh -> prepare("INSERT INTO usuario ( user, pass, tipousuario) 
            VALUES (?,?,?)");

            $stmt2->bindParam(1, $ID_usuario);
            $stmt2->bindParam(2, $pass);
            $stmt2->bindParam(3,$Tipo_usuario);
        
            $stmt2->execute();


            $stmt4 = $dbh -> prepare("SELECT idusuario
            FROM usuario
            WHERE user =:ID_usuario ");
        
        $stmt4->bindParam(':ID_usuario', $ID_usuario);
        $stmt4->setFetchMode(PDO::FETCH_ASSOC);
        
        $stmt4->execute();
        $datos = $stmt4->fetch();

        $nuevouser = $datos["idusuario"];

        echo "usuario " . $nuevouser;





            if ($Tipo_usuario == 'C') {
                $stmt3 = $dbh -> prepare("INSERT INTO cliente ( idcliente, usuario_idusuario) 
                VALUES (?, ?)");

                $stmt3->bindParam(1, $nuevouser);
                $stmt3->bindParam(2, $nuevouser);

                $stmt3->execute();
            }elseif($Tipo_usuario == 'E'){
                $stmt3 = $dbh -> prepare("INSERT INTO empleado ( idempleado, usuario_idusuario) 
                VALUES (?, ?)");

                $stmt3->bindParam(1, $nuevouser);
                $stmt3->bindParam(2, $nuevouser);

                $stmt3->execute();
            }

        echo "<h2>Registro de nuevo cliente.   </h2> ";
        echo '<br><br><a href="usuarionuevo.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
      </svg>Regresar</a>';

        }
        else{
            echo "El ID de usuario ya existe.";
            retorno();
            exit();    
        }
        
        $dbh = null;
            
    }else{
        echo "No se logro la conexion con la base de datos.";
    }
    

    //Funcion que evalua las condiciones de los password agregados.
    function  retorno(){
        echo "<h2>Registro erroneo.   </h2> ";
        echo '<br><br><a href="usuarionuevo.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
      </svg>Regresar</a>';

        exit();
    }

    function checarPassword($password) {//Verifica que la contraseña debe contener almenos 8 caracteres un numero una letra
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
     
        if(!$uppercase && !$lowercase && !$number && strlen($password) < 8) {
            return false;
        }
        return true;
    }

?>
</section>

  
</html>