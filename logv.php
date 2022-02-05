<?php
  session_start();
  $titulo = "Login";
  $submenus = false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="navegacion.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">

    <title>Ingresa</title>
</head>
<body>
    
    <?php 
        include "navegacion.php";
    ?>

    
    <section class="sepa">
    <form id="form1" action="logc.php" method="POST" >
    <div>
        <div >
            <label for="ID_usuario">Usuario</label>
            <input name="ID_usuario" type="text" id="ID_usuario" value="" required >
    
            <label for="pass" >Pass</label>
            <input name="pass"  type="password" id="pass" value="" required >
    
            <button  type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>Ingresar</button>

        </div>
    </div>
    
    </form>
    </section>
    
</body>
  
</html>