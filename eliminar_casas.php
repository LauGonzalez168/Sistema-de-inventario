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
        $id=$_REQUEST['ID'];
        
       
        mysqli_query($conexion,"DELETE from casas_ciencia where id_casas='$id'") or die ("error al insertar los registro");
        
        mysqli_close($conexion);
       header("location:registros_casas.php"); 
        ?>
    </body>
</html>