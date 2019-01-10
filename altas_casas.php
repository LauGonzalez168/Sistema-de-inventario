<?php 
        $server="localhost";
        $usuario="root";
        $contrasena="";
        $bd ="inventario";
        $conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
            or die("error en la conexion");
 
        $casa_ciencia=$_POST['casa_ciencia']; 
        $articulo=$_POST['articulos']; 
        $cantidad=$_POST['cantidad']; 
        $fecha_entrega=$_POST['fecha_entrega'];
      
$cantCon=mysqli_query($conexion,"SELECT * FROM `total_articulos` where articulo='$articulo' ")
or die ("error al traer los datos de cantidades");
$cantA=mysqli_query($conexion,"SELECT * FROM `articulos_inventario` where articulo='$articulo' ")
or die ("error al traer los datos de cantidades");
$row = mysqli_fetch_array($cantCon);
$rowA=mysqli_fetch_array($cantA);
$num=$row['total'] ;
if(   $cantidad<$rowA['total'] and $cantidad>0 ){
   if($cantidad>$row['total'] and $cantidad>$rowA['total']){
        echo"<script>alert('La cantidad puesta es mayor  de la que tiene el almacen con $num '); window.location= 'menu_casas.php'</script>";
   }
  else{
        
        $insertar="INSERT into  casas_ciencia values('','$casa_ciencia','$articulo','$cantidad','$fecha_entrega')";
        $resultado= mysqli_query($conexion,$insertar) or die ("error al insertar los registro");
        
        mysqli_close($conexion);
    
       header("location:menu_casas.php"); 
}
}
else{
    $num=$rowA['total']; 
     echo"<script>alert('La cantidad puesta es mayor  de la que tiene el almacen con $num '); window.location= 'menu_casas.php'</script>";
}

        ?>
