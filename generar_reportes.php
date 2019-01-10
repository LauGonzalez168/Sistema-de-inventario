<?php
             
     $server="localhost";
        $usuario="root";
        $contrasena="";
        $bd ="inventario";
        $conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
            or die("error en la conexion");
        $consulta=mysqli_query($conexion,"SELECT DISTINCT nombre FROM `casas_ciencia` order by nombre")
            or die ("error al traer los datos");
        
     ?>  
<!DOCTYPE>
<html>
    <head>
    <title>
   Generar reportes 
    </title>
        <link rel="stylesheet" href="css/bootstrap.css">
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
				min-width:300px;
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
<!-- insertar productos -->

<br><br><br><br><br>
<div class="container">

    <form action="reportes.php" method="post" class="form-horizontal">
        <h3>Insertar artículo</h3>
        <br>



        <div class="form-group">
            <label for="casa" class="col-sm-2 control-label">Casa de ciencia:</label>
            <div class="col-sm-10">
                 <select name="casa" id="casa">
                        <?php
    while($extraido = mysqli_fetch_array($consulta)){
        echo "<option value='".$extraido['nombre']."'";
        
        echo ">";
        echo $extraido['nombre'];
        echo "</option>";
                
    }
            ?>
                    </select>
            </div>
        </div>

        <div class="form-group">
            <label for="firma" class="col-sm-2 control-label">Encargado:</label>
            <div class="col-sm-10">
                <input type="text" name="firma" id="firma">
            </div>
        </div>
        <div class="form-group">
            <label for="fecha" class="col-sm-2 control-label">Fecha:</label>
            <div class="col-sm-10">
                <input type="date" name="fecha" id="fecha">
            </div>
        </div>





        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">


                <input class="btn btn-dafault" type="submit" value="Generar Reporte" name="btnRegistrar">
            </div>
        </div>
    </form>

</div>

</body>
</html>