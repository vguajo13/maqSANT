<?php
  session_start();
  $titulo = "<br>Registro de usuario";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="dentro.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">

    <title>Registrarse</title>
</head>
<body>
    <section >
    <h4>Registrar</h4>
        <form action="usuarionuevoc.php" id="form2" method="POST" >
            <div >
                <div >
            <div>
                <label for="ID_usuario">Usuario: </label>
                <input name="ID_usuario" type="text" id="ID_usuario" value="" required >
            </div>
            
            <div >
                <label for="contra" >Password: </label>
                <input name="contra"  type="password" id="contra" value="" required >
            </div>

            <div >
                <label for="veripass" >Verificar Password: </label>
                <input name="veripass"  type="text" id="veripass" value="" required >
            </div>

            <div >
                <label for="tipo" >Tipo de usuario: </label>
                <select name="tipo" id="tipo">
                    <option value="E">Empleado</option>
                    <option value="C">Cliente</option>
                </select>
            </div>
    
            <div >
            <button  type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
              </svg>  
              Enviar</button>
                </div>  
            </div>
            </div>
        </form>
    </section>
    <script src="js/funciones.js"></script>

</body>

</html>