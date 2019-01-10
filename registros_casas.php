 <!DOCTYPE>
<html>
    <head> 
<title>
    registros casas de ciencia
    </title>
         <link rel="stylesheet" href="css/bootstrap.css">
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
            //consultas
       $casas=mysqli_query($conexion,"SELECT nombre FROM `casas_ciencia` GROUP by nombre")
            or die ("error al traer los datos");
         $articulos=mysqli_query($conexion,"SELECT  articulo FROM `casas_ciencia` GROUP by articulo")
            or die ("error al traer los datos"); 
 $cantidades=mysqli_query($conexion,"SELECT  cantidad FROM `casas_ciencia` GROUP by cantidad")
            or die ("error al traer los datos");
           $fechas=mysqli_query($conexion,"SELECT  fecha_entrada FROM `casas_ciencia` GROUP by fecha_entrada")
            or die ("error al traer los datos");
       // variables
  $where="";
  $filtro="";
  $variable="";
$casasf=""; 
        $articulosf=""; 
        $cantidadf=""; 
        $fechasf=""; 

   $filtro=mysqli_query($conexion,"SELECT * from casas_ciencia ")
            or die ("error al traer los datos");
//validar filtro

if(isset($_POST['buscar'])){
    $casasf=$_POST['casas']; 
        $articulosf=$_POST['articulos']; 
        $cantidadf=$_POST['cantidad']; 
        $fechasf=$_POST['fechas']; 
    
    // articulo
     if(
        empty($_POST['casas'])and
       empty($_POST['cantidad'])and
       empty($_POST['fechas'])  ){
        
       $variable=$_POST['articulos']; 
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where articulo='$variable'");
         $where="articulo='$variable'";
    }
   
    //cantidad
  
    elseif(
          empty($_POST['articulos']) and
            empty($_POST['casas']) and
            empty($_POST['fechas'])  ){
       $variable=$_POST['cantidad']; 
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where cantidad='$variable'");
        $where="cantidad='$variable'";
    }
    //fechas
 elseif(
     empty($_POST['cantidad']) and
            empty($_POST['articulos']) and
            empty($_POST['casas'])  ){
       $variable=$_POST['fechas']; 
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where fecha_entrada='$variable'");
     $where="fecha_entrada='$variable'";
    }
    //casas
   elseif(
     empty($_POST['articulos']) and
            empty($_POST['cantidad']) and
            empty($_POST['fechas'])  ){
       $variable=$_POST['casas']; 
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where nombre='$variable'") ;
       $where="nombre='$variable'";
    }
   
    //cantidad y fechas
     elseif(empty($_POST['casas']) and
        empty($_POST['articulos'])  ){
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where cantidad='$cantidadf' and fecha_entrada='$fechasf'") ;
         $where="cantidad='$cantidadf' and fecha_entrada='$fechasf'";
    }
    //cantidad y fechas
     elseif(empty($_POST['casas']) and
        empty($_POST['cantidad'])  ){
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where articulo='$articulosf' and fecha_entrada='$fechasf'") ;
         $where="articulo='$articulosf' and fecha_entrada='$fechasf'";
    }
     //cantidad y fechas
     elseif(empty($_POST['casas']) and
        empty($_POST['fecha'])  ){
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where articulo='$articulosf' and cantidad='$cantidadf'") ;
         $where="articulo='$articulosf' and cantidad='$cantidadf'";
    }
    //articulos y cantidad
     elseif(empty($_POST['articulos']) and
        empty($_POST['cantidad'])  ){
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where nombre='$casasf' and fecha_entrada='$fechasf'") ;
         $where="nombre='$casasf' and fecha_entrada='$fechasf'";
    }
   //articulos y fechas
     elseif(empty($_POST['articulos']) and
        empty($_POST['cantidad'])  ){
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where nombre='$casasf' and cantidad='$cantidadf'") ;
    }
    //cantidad y fecha
    elseif(empty($_POST['cantidad']) and
        empty($_POST['fecha'])  ){
        $filtro=mysqli_query($conexion,"select * from casas_ciencia where nombre='$casasf' and articulo='$articulosf'") ;
        $where="nombre='$casasf' and articulo='$articulosf'";
    }
     elseif(empty($_POST['casas'])){
         $filtro=mysqli_query($conexion,"select * from casas_ciencia where  articulo='$articulosf' and cantidad='$cantidadf' and fecha_entrada='$fechasf' ") ;
         $where="articulo='$articulosf' and cantidad='$cantidadf' and fecha_entrada='$fechasf'";
     }
    elseif(empty($_POST['articulos'])){
         $filtro=mysqli_query($conexion,"select * from casas_ciencia where  nombre='$casasf' and cantidad='$cantidadf' and fecha_entrada='$fechasf' ") ;
     }
    elseif(empty($_POST['cantidad'])){
         $filtro=mysqli_query($conexion,"select * from casas_ciencia where  articulo='$articulosf' and nombre='$casasf' and fecha_entrada='$fechasf' ") ;
        $where="articulo='$articulosf' and nombre='$casasf' and fecha_entrada='$fechasf'";
     }
    elseif(empty($_POST['fechas'])){
         $filtro=mysqli_query($conexion,"select * from casas_ciencia where  articulo='$articulosf' and cantidad='$cantidadf' and nombre='$casasf' ") ;
        $where="articulo='$articulosf' and cantidad='$cantidadf' and nombre='$casasf'";
     }
   if(
     empty($_POST['articulos']) and
            empty($_POST['cantidad']) and
            empty($_POST['fechas']) and 
         empty($_POST['casas'])  )
    {
       
        $filtro=mysqli_query($conexion,"select * from casas_ciencia ");
        
    }
    
}

 ?>       
         <!-- filtadro de elementos -->
        <div>
            <form  method="post" class="container">
          
        <h3>Filtadro de elementos</h3>
                
             Casas:   <select name="casas" >
            <option value="" class="form-control"> </option>
            <?php
    while($extraido = mysqli_fetch_array($casas)){
        echo "<option value='".$extraido['nombre']."'";
        
        echo ">";
        echo $extraido['nombre'];
        echo "</option>";
                
    }
            ?>
             </select>
           Artículos:    <select name="articulos" >
          <option value="" class="form-control"> </option>
            <?php
        
    while($extraido2 = mysqli_fetch_array($articulos)){
        echo "<option value='".$extraido2['articulo']."'";
        
        echo ">";
        echo $extraido2['articulo'];
        echo "</option>";
                
    }
            ?>
             </select>   
       Cantidad:    <select name="cantidad" >
        <option value="" class="form-control"> </option>   
            <?php
    while($extrer = mysqli_fetch_array($cantidades)){
        echo "<option value='".$extrer['cantidad']."'";
        
        echo ">";
        echo $extrer['cantidad'];
        echo "</option>";
                
    }
            ?>
             </select>
           Fechas entradas:    <select name="fechas" >
                <option value="" class="form-control"> </option>
            <?php
    while($extraido4 = mysqli_fetch_array($fechas)){
        echo "<option value='".$extraido4['fecha_entrada']."'";
        
        echo ">";
        echo $extraido4['fecha_entrada'];
        echo "</option>";
                
    }
            ?>
             </select>        
            <button name="buscar" type="submit" class="btn btn-dafault">Buscar</button>
            
        <br><br>
       <table class="table-fill" >
       <thead>
           <tr>
        
            <th class="text-left">ID</th>
            <th class="text-left">CASA DE CIENCIA</th>
            <th class="text-left">ARTICULO</th>
            <th class="text-left">CANTIDAD</th>
            <th class="text-left">FECHA DE ENTREGA</th>
            <th class="text-left">MODIFICAR</th>
            <th class="text-left">ELIMINAR</th>
        </tr>
           </thead>
        <?php
        while($filas= mysqli_fetch_array($filtro)){
         
        
        ?>
        <tr>
            <td class="text-left"><?php echo $filas['id_casas']; ?></td>
            <td class="text-left"><?php echo $filas['nombre']; ?></td>
            <td class="text-left"><?php echo $filas['articulo']; ?></td>
            <td class="text-left"><?php echo $filas['cantidad']; ?></td>
            <td class="text-left"><?php echo $filas['fecha_entrada']; ?></td>
            <td class="text-left"><a href="modificar_casas.php?ID=<?php echo $filas['id_casas'];?>">modificar </a></td>
            <td class="text-left"><a href="eliminar_casas.php?ID=<?php echo $filas['id_casas'];?>">eliminar </a></td>
            <?php
        }
            ?>
        </tr>
        </table>
                 
            </form>
           
        </div>
       
    </body>
</html>