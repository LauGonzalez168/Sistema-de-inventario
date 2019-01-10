   <!DOCTYPE>
<html>
    <head> 
<title>
    registros almacen  
    </title>
        <link rel="stylesheet" href="css/tabla.css">
        <style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
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
        $consulta=mysqli_query($conexion,"SELECT * from almacen")
            or die ("error al traer los datos");
 ?>     
        <div>
            <br><br>
       <table class="table-fill">
            <thead>
        <tr>
        
            <th class="text-left">ID</th>
            <th class="text-left">CLASIFICACION</th>
            <th class="text-left">ARTICULO</th>
            <th class="text-left">DESCRIPCION</th>
            <th class="text-left">CANTIDAD</th>
            <th class="text-left">CODIGO</th>
            <th class="text-left">SERIE</th>
            <th class="text-left">MODIFICAR</th>
            <th class="text-left">ELIMINAR</th>
        </tr>
                </thead>
        <?php
        while($filas= mysqli_fetch_array($consulta)){
         
        
        ?>
        <tr>
            <td class="text-left"><?php echo $filas['id_almacen']; ?></td>
            <td class="text-left"><?php echo $filas['clasificacion']; ?></td>
            <td class="text-left"><?php echo $filas['articulo']; ?></td>
            <td class="text-left"><?php echo $filas['descripcion']; ?></td>
            <td class="text-left"><?php echo $filas['cantidad']; ?></td>
            <td class="text-left"><?php echo $filas['codigo']; ?></td>
            <td class="text-left"><?php echo $filas['serie']; ?></td>
            <td class="text-left"><a href="modificar_almacen.php?ID=<?php echo $filas['id_almacen'];?>">modificar </a></td>
            <td class="text-left"><a href="eliminar_almacen.php?ID=<?php echo $filas['id_almacen'];?>">eliminar </a></td>
            <?php
        }
            ?>
        </tr>
        </table>
        </div>
    </body>
</html>