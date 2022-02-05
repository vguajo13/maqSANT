<?php
  session_start();
  $titulo = "<br>Registro de Producto";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="dentro.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">

    <title>Registrar producto</title>
</head>
<body>
    <section>
    <h4>Registrar Nuevo producto</h4>
        <form action="productonuevoc.php" id="form2" method="POST" >
            <div >
                <div >
            <div>
                <label for="SKU">SKU: </label>
                <input name="SKU" id="SKU" type="text" maxlength="12" value="" required >
            </div>
            
            <div>
                <label for="nombre">Nombre del producto: </label>
                <input name="nombre" id="nombre" type="text" value="" required >
            </div>

            <div>
                <label for="precio">Precio $</label>
                <input type="number" name="precio" id="precio" value="0.0" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="Alto">Alto (mts.): </label>
                <input type="number" name="alto" id="alto" value="0.0" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="Ancho">Ancho (mts.): </label>
                <input type="number" name="ancho" id="ancho" value="0.0" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="Largo">Largo (mts.): </label>
                <input type="number" name="largo" id="largo" value="0.0" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="Largo">Peso (Kg.): </label>
                <input type="number" name="peso" id="peso" value="0.0" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="caracteristicas">Caracteristicas: </label>
                <textarea name="caracteristicas" id="caracteristicas" cols="40" rows="10"> </textarea>
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

</body>

</html>