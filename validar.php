<?php

$usuario = $_POST['username'];
$pass = $_POST['password'];

if(empty($usuario) || empty($pass)){
header("Location: index.html");
exit();
}

$con=mysqli_connect("localhost","root","") or die("Error al conectar " . mysql_error());
mysqli_select_db($con,'inventario') or die ("Error al seleccionar la Base de datos: " . mysql_error($con));

$result = mysqli_query($con,"SELECT * from login where username='" . $usuario . "'");

if($row = mysqli_fetch_array($result)){
if($row['password'] == $pass){
session_start();
$_SESSION['usuario'] = $usuario;
header("Location: menu_base.php");
}else{
header("Location: index.html");
exit();
}
}else{
header("Location: index.html");
exit();
}


?>