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
                empleado.nombre, empleado.paterno, empleado.materno, empleado.sexo, empleado.curp, empleado.rfc, 
                empleado.direccion, empleado.telefono, empleado.email, empleado.fechaing, empleado.fechanac
                FROM (usuario INNER JOIN empleado ON usuario.idusuario = empleado.usuario_idusuario)
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
                    $nombre = $datos['nombre'];
                    $paterno = $datos['paterno'];
                    $materno = $datos['materno'];
                    $sexo = $datos['sexo'];
                    $curp = $datos['curp'];
                    $rfc = $datos['rfc'];
                    $direccion = $datos['direccion'];
                    $telefono = $datos['telefono'];
                    $email = $datos['email'];
                    $fechaing = $datos['fechaing'];
                    $fechanac = $datos['fechanac'];
                }
            }
    ?>
    
    
    <form action="usuarioModempCargar.php" method="post">
    <div >
        <div >
            <div>
                <label for="idempleado">idempleado</label>
                <input type="text" id="idempleado" name="idempleado" value="<?php echo $id; ?>" readonly >
            </div>
            <div>
                <label for="user">Usuario empleado.</label>
                <input type="text" id="user" name="user" value="<?php echo $user; ?>" readonly >
            </div>
            <div>
                <label for="nombre">Nombre empleado.</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" required >
            </div>
            <div>
                <label for="paterno">Apellido paterno.</label>
                <input type="text" name="paterno" id="paterno" value="<?php echo $paterno;?>" required >
            </div>
            <div>
                <label for="materno">Apellido Materno.</label>
                <input type="text" name="materno" id="materno" value="<?php echo $materno;?>" required >
            </div>
            <div >
                <label for="sexo" >Sexo: </label>
                <select name="sexo" id="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div>
                <label for="curp">CURP</label>
                <input type="text" name="curp" id="curp" oninput="validarCurp(this)" maxlength="18" value="<?php echo $curp;?>" required >
            </div>
            <div>
                <label for="rfc">RFC</label>
                <input type="text" name="rfc" id="rfc" maxlength="13" value="<?php echo $rfc;?>" required >
            </div>
            <div>
                <label for="direccion">Dirección</label>
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
            <div>
                <label for="fechaing">Fecha de ingreso.</label>
                <input type="date" name="fechaing" id="fechaing"  value="<?php echo $fechaing;?>" required >
            </div>
            <div>
                <label for="fechanac">Fecha de nacimiento</label>
                <input type="date" name="fechanac" id="fechanac"  value="<?php echo $fechanac;?>" required >
            </div>
            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>Registrar.</button>
            
        </div>        
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
    <script src="js/funciones.js"></script>
</body>


</html>