<!DOCTYPE>
<html>
    <head>
    <title>
    actualizar    
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
        $id_almacen= $_POST['id_almacen'];
        $clasificacion = $_POST['clasificacion'];
        $articulo=$_POST['articulo']; 
        $descripcion=$_POST['descripcion'];
        $cantidad=$_POST['cantidad'];
        $codigo=$_POST['codigo'];
        $serie=$_POST['serie'];
       
        mysqli_query($conexion,"UPDATE  almacen set
        articulo='$articulo',
        clasificacion='$clasificacion',
        descripcion='$descripcion',
        cantidad='$cantidad',
        codigo='$codigo',
        serie='$serie'
        where id_almacen='$id_almacen'")
        or die ("error al actualizar los registro");
        
        mysqli_close($conexion);
        header("location:registros_almacen.php"); 
        ?>
    </body>
</html>