<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1>Maquinaria Santana</h1>
        <h2>
          <?php
            echo $titulo;
          ?>
          </h2>
			</div>

			<nav class="menu">
				<a href="index.php">Inicio</a>
				<a href="#">Nosotros</a>
				<a href="#">Contacto</a>
			</nav>
		</div>
	</header>

<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
  <nav >
        
        <div class="container">

        <ul >
          <li >
        <a href="index.php"> HOME</a>
          </li>

          <?php
            if (isset($_SESSION['Tipo_usuario'])) {
              $Tipo_usuario = $_SESSION['Tipo_usuario'];
              if($Tipo_usuario == "End"){

              }else{
              if($Tipo_usuario == "Administrador"){ 
                //Esta parte del menu se muestra cuando hay una sesion tipo administrador abierta

                //menu para el administrador de ususarios
                echo '<li>';
                echo "<a href='usuario.php'>Administrar usuarios</a>";
                if ($submenus) {
                  echo '<ul>';
                echo '<li><a href="usuarionuevo.php" target="formularios">Nuevo usuario</a></li>';
                echo '<li><a href="usuarioElimMod.php" target="formularios">Eliminar o modificar usuario</a></li>';
                
                echo '</ul>'; 
                }
                echo '</li>';

                //menu para el administrador de productos
                echo '<li>';
                echo "<a href='producto.php'>Administrar productos</a>";
                if ($submenus) {
                  echo '<ul>';
                  echo '<li><a href="productonuevo.php" target="formularios">Agregar producto</a></li>';
                  echo '<li><a href="productoElimMod.php" target="formularios">Eliminar o modificar productos</a></li>';
                  echo '</ul>';
                } 
                echo '</li>';

                //menu para el administrador de materiales
                echo '<li>';
                echo "<a href='materiales.php'>Administrar Materiales</a>";
                if ($submenus) {
                  echo '<ul>';
                  echo '<li><a href="materialnuevo.php" target="formularios">Agregar material</a></li>';
                  echo '<li><a href="materialElimMod.php" target="formularios">Eliminar o modificar material</a></li>';
                  echo '</ul>';
                } 
                echo '</li>';
   
              }elseif($Tipo_usuario == "Empleado"){
                //Esta parte del menu se muestra cuando hay una sesion tipo empelado abierta

              }else{
                //Esta parte del menu se muestra cuando hay una sesion del tipo cliente abierta
                echo '<li >';  
                echo "<a  href='catalogoClien.php'>Ver catalogo. </a>";
                echo '</li>';
              }

              echo '<li >';
              echo "<a href='cerrarsesion.php'>Cerrar sesión. </a>";
              echo '</li>';
            }
 
            }else{
              //Este menu se muestra cuando no hay sesion iniciada.
              echo '<li >';                
              echo '<a  href="logv.php">Iniciar sesión</a>';
              echo '</li>';

            }

          ?>

          </ul>
          </div>
      </nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>

