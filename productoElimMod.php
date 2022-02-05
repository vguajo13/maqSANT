<?php
    session_start();
    $titulo = "<br>Catalogo Administrador";
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="dentro.css" type="text/css" media="screen">
    <link rel="stylesheet" href="formularios.css" type="text/css" media="screen">
    <link rel="stylesheet" href="tablas.css" type="text/css" media="screen">

    <title>Catalogo productos Administrador</title>
</head>
<body>

    <section>
    <?php
        include "conexion.php";
        

        
        if($dbh != null){
            $stmt = $dbh -> prepare("SELECT sku, nombre, precio, 
            alto, ancho, largo, peso, caracteristicas, detalle
            FROM producto ");

            $stmt->execute();
            $datos = $stmt->fetchALL(PDO::FETCH_ASSOC);

            if(!$datos){
                echo '<h4> catologo vacio </h4>';
                exit();
                
            }else{
                echo '<table >';
                echo "<tr style='text-aling: center'>";
                echo "<td>SKU</td>" ;
                echo "<td>Nombre producto</td>" ;
                echo "<td>Caracteristicas</td>" ;
                echo "<td>Modificar usuario</td>" ;
                echo "<td>Eliminar usuario</td>" ;
                echo "</tr>";
                foreach($datos as $resultado){
                  $sku = $resultado['sku'];
                  $nombre = $resultado['nombre'] ;
                  $precio = $resultado['precio'] ;
                  $alto = $resultado['alto'] ; 
                  $ancho = $resultado['ancho'] ; 
                  $largo = $resultado['largo'] ; 
                  $peso = $resultado['peso'] ; 
                  $caracteristicas = $resultado['caracteristicas'] ;

                  $datosget = "?sku=$sku&nombre=$nombre&precio=$precio&alto=$alto&ancho=$ancho" .
                  "&largo=$largo&peso=$peso&caracteristicas=$caracteristicas";


                    echo "<tr style='text-aling: center'>";
                    echo "<td>" . $resultado['sku'] . "</td>" ;
                    echo "<td>" . $resultado['nombre'] . "</td>" ;
                    echo "<td>" . $resultado['caracteristicas'] . "</td>\n" ;
                    
                    echo "<td>" . "<a href='productoMod.php$datosget" 
                    . '\' onclick = "return confirm(\'Quieres modificar la informacion?\')" >Modificar ' 
                    . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                      </svg>'
                    ."</a></td>\n";
                    
                    echo "<td>" . '<a href="productoEliminar.php?id=' . $resultado['sku'] 
                    . '" onclick = "return confirm(\'Quieres eliminar el producto del catalogo?\')" >Eliminar ' 
                    . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                    <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                  </svg>'
                    ."</a></td>\n";

                    echo "</tr>";
                }
                echo '</table>';
            }
        }
        function enviar($ID_producto){
          

        }
    
    ?>
    </section>
        
</body>
</html>