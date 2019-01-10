<?php
             
$server="localhost";
$usuario="root";
$contrasena="";
$bd ="inventario";
$conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
or die("error en la conexion");
$id=$_REQUEST['ID'];
$consulta=mysqli_query($conexion,"SELECT * from casas_ciencia where id_casas='$id'")
or die ("error al traer los datos");
$fila=$consulta->fetch_assoc();
?>
<!DOCTYPE>
<html>

<head>
    <title>
        Modificar casas de ciencia
    </title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }

        #header {
            margin: auto;
            width: 1100px;
            font-family: Arial, Helvetica, sans-serif;
        }

        ul,
        ol {
            list-style: none;
        }

        .nav>li {
            float: left;
        }

        .nav li a {
            background-color: #000;
            color: #fff;
            text-decoration: none;
            padding: 10px 60px;
            display: block;
        }

        .nav li a:hover {
            background-color: #434343;
        }

        .nav li ul {
            display: none;
            position: absolute;
            min-width: 300px;
        }

        .nav li:hover>ul {
            display: block;
        }

        .nav li ul li {
            position: relative;
        }

        .nav li ul li ul {
            right: -140px;
            top: 0px;
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
    <br><br><br><br><br>
    <!-- formulario -->
    <form action="actualizar_casas.php" method="post" class="form-horizontal">

        <h3>Modificar casa de ciencia</h3>
        <br>
        <div class="form-group">
            <label for="id_casas" class="col-sm-2 control-label">ID:</label>
            <div class="col-sm-10">
                <input type="text" readonly="readonly" name="id_casas" id="id_casas" value="<?php echo $fila['id_casas']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Casa de ciencia:</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="articulo" class="col-sm-2 control-label">Artículo:</label>
            <div class="col-sm-10">

                <input type="text" name="articulo" id="articulo" value="<?php echo $fila['articulo']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="cantidad" class="col-sm-2 control-label">Cantidad:</label>
            <div class="col-sm-10">
                <input type="text" name="cantidad" id="cantidad" value="<?php echo $fila['cantidad']; ?>"></div>
        </div>
        <div class="form-group">
            <label for="fecha_entrega" class="col-sm-2 control-label">Fecha de entrega:</label>
            <div class="col-sm-10">
                <input type="date" name="fecha_entrega" id="fecha_entrega" value="<?php echo $fila['fecha_entrada']; ?>"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">

                <input type="submit" value="actualizar" name="btnActualizar" class="btn btn-dafault">
            </div>
        </div>
    </form>


</body>

</html>