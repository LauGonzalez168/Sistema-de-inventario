<?php
             
     $server="localhost";
        $usuario="root";
        $contrasena="";
        $bd ="inventario";
        $conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
            or die("error en la conexion");
        $consulta=mysqli_query($conexion,"SELECT * from almacen")
            or die ("error al traer los datos");?>
<!DOCTYPE>
<html>
  <!--  <link rel="stylesheet" href="css/bootstrap.css"> -->
    <head>
    <title>
		
    sistema    
    </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
        
    <!-- insertar productos -->
        
             <br><br><br><br><br>
          <div class="container">
                 
                      <form action="altas_almacen.php" method="post" class="form-horizontal">
                <h3>Insertar artículo</h3>
                          <br>
                   <div class="form-group">
            <label for="id_almacen" class="col-sm-2 control-label">Clasificación:</label>
            <div class="col-sm-10"> 
                        <input type="text" name="clasificacion" id="clasificacion" required pattern="[a-z]+" title="únicamente minusculas">
                    
                       </div></div>
                     <div class="form-group">
            <label for="articulo" class="col-sm-2 control-label">Artículo:</label>
            <div class="col-sm-10"> 
                        <input  type="text" name="articulo" id="articulo" required pattern="[a-z]+" title="únicamente minusculas">
                         </div></div>
                     <div class="form-group">
            <label for="descripcion" class="col-sm-2 control-label">Descripción:</label>
            <div class="col-sm-10"> 
                      <input  type="text" name="descripcion" id="descripcion" required pattern="[a-z]+" title="únicamente minusculas">
                         </div></div>
                      <div class="form-group">
            <label for="cantidad" class="col-sm-2 control-label">Cantidad:</label>
            <div class="col-sm-10">       
                        <input  type="text" name="cantidad" id="cantidad" required pattern="[0-9]+" title="únicamente números">
                          </div></div>
                          
                      <div class="form-group">
            <label for="codigo" class="col-sm-2 control-label">Código:</label>
            <div class="col-sm-10">      
                           <input  type="text" name="codigo" id="codigo" >
                          </div></div>
                      <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Serie:</label>
            <div class="col-sm-10">  
                           <input  type="text" name="serie">
                          </div></div>
                          
           
             
            <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
            
           
            <input class="btn btn-dafault"  type="submit" value="Registrar" name="btnRegistrar">
                </div></div>
        </form>
              
      </div>
		 <!-- insertar productos por xml -->
<span id="message"></span>
     <form method="post" id="import_form" enctype="multipart/form-data">
      <div class="form-group">
       <label>Selecciona archivo xml</label>
       <input type="file" name="file" id="file" />
      </div>
      <br />
      <div class="form-group">
       <input type="submit" name="submit" id="submit" class="btn btn-info" value="Import" />
      </div>
     </form>
    </body>
</html>
<script>
$(document).ready(function(){
 $('#import_form').on('submit', function(event){
  event.preventDefault();

  $.ajax({
   url:"import.php",
   method:"POST",
   data: new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   beforeSend:function(){
    $('#submit').attr('disabled','disabled'),
    $('#submit').val('Importing...');
   },
   success:function(data)
   {
    $('#message').html(data);
    $('#import_form')[0].reset();
    $('#submit').attr('disabled', false);
    $('#submit').val('Import');
   }
  })

  setInterval(function(){
   $('#message').html('');
  }, 5000);

 });
});
</script>