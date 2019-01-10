<!DOCTYPE>
<html>
    <head> 
<title>
    registros totales casas de ciencia  
    </title>
          <link rel="stylesheet" href="css/bootstrap.css">
        <style type="text/css">
			
		
			
			#header {
				margin:auto;
				width:1100px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 60px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
		</style>
    </head>
    
    <body>
    <div id="header">
			<ul class="nav">
				<li><a href="menu_base.php">Inicio</a></li>
				<li><a href="registros_almacen.php">Almacen</a>
					<ul>
                        
						<li><a href="menu_almacen.php">Agregar producto</a></li>
						<li><a href="registros_almacen.php">Registros de almacen</a></li>
						<li><a href="totales_almacen.php">Total por producto</a></li>
						
					</ul>
				</li>
				<li><a href="registros_casas.php">Casas de ciencia</a>
					<ul>
						<li><a href="menu_casas.php">Agregar nuevo registro</a></li>
						<li><a href="registros_casas.php">Registros de casas de ciencia</a></li>
						<li><a href="totales_casas.php">Total por producto</a></li>
						
					</ul>
				</li>
                <li><a href="generar_reportes.php">Generar reportes</a></li>
				<li><a href="index.html">Salir</a></li>
			</ul>
		</div>
        <br><br>
       <?php 
       
        $server="localhost";
        $usuario="root";
        $contrasena="";
        $bd ="inventario";
        $conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
            or die("error en la conexion");
        
        $consulta=mysqli_query($conexion,"SELECT nombre, articulo, sum(cantidad) total FROM `casas_ciencia` GROUP BY nombre,articulo ORDER by nombre,articulo")
            or die ("error al traer los datos");
        
           
       
       
 ?>    <div class="container">
           <br><br>
           <h3>Tabla de totales</h3>
       <table class="table table-bordered">
        <tr>
        
          <td>CASA DE CIENCIA</td>
            <td>ARTICULO</td>
          
            <td>TOTAL</td>
          
      
        </tr>
        <?php
        while($filas= mysqli_fetch_array($consulta)){
         
        
        ?>
        <tr>
          <td><?php echo $filas['nombre']; ?></td>
            <td><?php echo $filas['articulo']; ?></td>
            <td><?php echo $filas['total']; ?></td>
       
            
            <?php
        }
            ?>
        </tr>
        </table>
        </div>
        
        
    </body>
</html>