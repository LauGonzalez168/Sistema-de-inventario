<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Inicio</title>
        
        <link rel="stylesheet" href="css/nivo-slider.css">
	<link rel="stylesheet" href="css/mi-slider.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js"></script>

	<script type="text/javascript"> 
		$(window).on('load', function() {
		    $('#slider').nivoSlider(); 
		}); 
	</script>
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
        <!-- nav-->
         
     <div class="slider-wrapper theme-mi-slider">
		<div id="slider" class="nivoSlider">  
              
		    <img src="img/1.jpg" alt="" title="#htmlcaption1" />    
		    <img src="img/2.jpg" alt="" title="#htmlcaption2" />    
		    <img src="img/3.jpg" alt="" title="#htmlcaption3" />     
		</div> 
		<div id="htmlcaption1" class="nivo-html-caption">     
		    <h1>Bienvenido</h1>
		   
		</div>
		<div id="htmlcaption2" class="nivo-html-caption">     
		    <h1>Bienvenido </h1>
		</div>
		<div id="htmlcaption3" class="nivo-html-caption">     
		    <h1>Bienvenido</h1>
		</div>
	</div>
        
	</body>
</html>