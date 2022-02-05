<?php
    session_start();
    $sku = $_GET['sku'];
    $nombre = $_GET['nombre'] ;
    $precio = $_GET['precio'] ;
    $alto = $_GET['alto'] ; 
    $ancho = $_GET['ancho'] ; 
    $largo = $_GET['largo'] ; 
    $peso = $_GET['peso'] ; 
    $caracteristicas = $_GET['caracteristicas'] ;
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
        <h3>Modificar productos</h3>
    </header>
    <section>
    <form action="productoModCargar.php" id="form2" method="POST" >
            <div >
                <div >
            <div>
                <label for="sku">SKU: </label>
                <input name="sku" id="sku" type="text" maxlength="12" value="<?php echo $sku;?>" readonly >
            </div>
            
            <div>
                <label for="nombre">Nombre del producto: </label>
                <input name="nombre" id="nombre" type="text" value="<?php echo $nombre;?>" required >
            </div>

            <div>
                <label for="precio">Precio $</label>
                <input type="number" name="precio" id="precio" value="<?php echo $precio;?>" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="Alto">Alto (mts.): </label>
                <input type="number" name="alto" id="alto" value="<?php echo $alto;?>" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="Ancho">Ancho (mts.): </label>
                <input type="number" name="ancho" id="ancho" value="<?php echo $ancho;?>" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="Largo">Largo (mts.): </label>
                <input type="number" name="largo" id="largo" value="<?php echo $largo;?>" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="Largo">Peso (Kg.): </label>
                <input type="number" name="peso" id="peso" value="<?php echo $peso;?>" min = "0" step = "0.01" >
            </div>

            <div>
                <label for="caracteristicas">Caracteristicas: </label>
                <textarea name="caracteristicas" id="caracteristicas" cols="40" rows="10"><?php echo $caracteristicas;?> </textarea>
            </div>
    
            <div >
            <button  type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
              </svg>Enviar</button>
                </div>  
            </div>
            </div>
        </form>

        <div>
        <form action="productoElimMod.php">
        <button class="btn btn-primary mt-2" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>Cancelar.</button>
        </form>
        </div>
            
    </section>
</body>
</html>