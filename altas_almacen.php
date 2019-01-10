<!DOCTYPE>
<html>
    <head>
    <title>
    registrar    
    </title>
    </head>
    
    <body>
    
       <?php 
        $server="localhost";
        $usuario="root";
        $contrasena="";
        $bd ="inventario";
        $conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
            or die("error en la conexion");
 
        $clasificacion=$_POST['clasificacion']; 
        $articulo=$_POST['articulo']; 
        $descripcion=$_POST['descripcion'];
        $cantidad=$_POST['cantidad']; 
        $codigo=$_POST['codigo'];
        $serie=$_POST['serie']; 
        
        $insertar="INSERT into almacen values ('','$clasificacion','$articulo','$descripcion','$cantidad','$codigo','$serie')";
        $resultado= mysqli_query($conexion,$insertar) or die ("error al insertar los registro");
        
        mysqli_close($conexion);
         header("location:menu_almacen.php"); 
        ?>
    </body>
</html>