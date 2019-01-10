<?php
             
$server="localhost";
$usuario="root";
$contrasena="";
$bd ="inventario";
$conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
or die("error en la conexion");


$consulta=mysqli_query($conexion,"SELECT DISTINCT articulo FROM `almacen` GROUP by articulo")
or die ("error al traer los datos");
        
     ?>
<!DOCTYPE>
<html>

<head>
    <title>
        Casas de ciencia
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
    <div class="container ">

        <form action="altas_casas.php" method="post" class="form-horizontal">

            <h3>Insertar casa de ciencia </h3>
            <br>
            <div class="form-group">
                <label for="casa_ciencia" class="col-sm-2 control-label" >Casa de ciencia:</label>
                <div class="col-sm-10">
                    <input type="text" name="casa_ciencia" id="casa_ciencia" required pattern="[a-z]+" title="únicamente minusculas">
                </div>
            </div>
            <div class="form-group">
                <label for="articulos" class="col-sm-2 control-label">Artículo:</label>
                <div class="col-sm-10">
                    <select name="articulos" id="articulos" required>
                        <?php
    while($extraido = mysqli_fetch_array($consulta)){
        echo "<option value='".$extraido['articulo']."'";
        
        echo ">";
        echo $extraido['articulo'];
        echo "</option>";
                
    }
            ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="cantidad" class="col-sm-2 control-label">Cantidad:</label>
                <div class="col-sm-10">
                    <input type="text" name="cantidad" id="cantidad" required pattern="[0-9]+" title="únicamente números"><br>
                </div>
            </div>
            <div class="form-group">
                <label for="fecha_entrega" class="col-sm-2 control-label" required>Fecha entrega:</label>
                <div class="col-sm-10">
                    <input type="date" name="fecha_entrega" id="fecha_entrega" required></div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Registrar" name="btnRegistrar" class="btn btn-dafault">
                </div>
            </div>
        </form>
    </div>

</body>

</html>
