<?php
    session_start();
    $id = $_GET['idusuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="dentro.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">

    <title>Modificar producto.</title>
</head>

<body>
    <header>
        <h3>Modificar empleado</h3>
    </header>
    <section>

    <?php
            include "conexion.php";
        

        
            if($dbh != null){
                $stmt = $dbh -> prepare("SELECT usuario.idusuario, usuario.user, usuario.tipousuario,
                cliente.nombre, cliente.rfc, cliente.direccion, cliente.telefono, cliente.email
                FROM (usuario INNER JOIN cliente ON usuario.idusuario = cliente.usuario_idusuario)
                WHERE usuario.idusuario = :id");
    
                $stmt->bindParam(':id', $id);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);    

                $stmt->execute();
                $datos = $stmt->fetch();

                if (!$datos) {
                    echo "<br><br><a href='usuarioElimMod.php'>Regresar</a>";
                    exit();
                }else{
                    $id = $datos['idusuario'];
                    $tipo = $datos['tipousuario'];
                    $user = $datos['user'];
                    $nombre = $datos['nombre'];;
                    $rfc =$datos['rfc'];;
                    $direccion =$datos['direccion'];;
                    $telefono =$datos['telefono'];;
                    $email = $datos['email'];;   
                }
            }
    ?>
    
    
    <form action="usuarioModcliCargar.php" method="post">
    <div >
        <div >
            <div>
                <label for="idcliente">idcliente</label>
                <input type="text" id="idlciente" name="idcliente" value="<?php echo $id; ?>" readonly >
            </div>
            <div>
                <label for="user">Usuario cliente.</label>
                <input type="text" id="user" name="user" value="<?php echo $user; ?>" readonly >
            </div>
            <div>
                <label for="nombre">Nombre cliente.</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" required >
            </div>
            <div>
                <label for="RFC">RFC</label>
                <input type="text" name="rfc" id="rfc" maxlength="13" value="<?php echo $rfc;?>" required >
            </div>
            <div>
                <label for="Direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion"  value="<?php echo $direccion;?>" required >
            </div>
            <div>
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $telefono;?>" required >
            </div>
            <div>
                <label for="email">Correo electronico</label>
                <input type="email" name="email" id="email"  value="<?php echo $email;?>" required >
            </div>
            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>Registrar.</button>
            
                </div></div>        
        </form>
        <div>
        <form action="usuarioElimMod.php">
        <button class="btn btn-primary mt-2" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>Cancelar.</button>
        </form>
        </div>
            
    </section>
</body>
</html>