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
        
        $id_casas = $_POST['id_casas'];
        $nombre=$_POST['nombre'];
        $articulo=$_POST['articulo']; 
        $cantidad=$_POST['cantidad'];
        $fecha_entrega=$_POST['fecha_entrega'];
       
       mysqli_query($conexion,"UPDATE  casas_ciencia set
       
        nombre='$nombre',
        articulo='$articulo',
        cantidad='$cantidad',
        fecha_entrada='$fecha_entrega'
        where id_casas='$id_casas'")
        or die ("error al actualizar los registro");
        
        mysqli_close($conexion);
       header("location:registros_casas.php"); 
        ?>
    </body>
</html>