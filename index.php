<?php
  session_start();
  $titulo = "Home";
  $submenus = false;
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="navegacion.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">

    <title>HOME DAROCA WEB</title>
  </head>
  <body>
    <?php 
      include "navegacion.php";
    ?>

    <section class="sepa">
      <div class="container">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/hTXPR4sDVe4" title="Video presentaión" frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </section>

    
  </body>
  
</html>
