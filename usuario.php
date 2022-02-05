<?php
  session_start();
  $titulo = "Administracion usuarios";
  $submenus = true;
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="navegacion.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">

    <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
    crossorigin="anonymous"></script>

    <title>Usuario DAROCA WEB</title>
  </head>
  <body>
    <?php 
      include "navegacion.php";
    ?>

    <section class="sepa">

    <div class="principal">
    <iframe src="" style="width: 100%; height: 500px" name="formularios"></iframe>
    </div>

    </section>

    <script src="js/funciones.js"></script>
    

    
  </body>
  
</html>
