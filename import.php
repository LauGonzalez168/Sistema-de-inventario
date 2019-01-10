<?php
//import.php
sleep(3);
$output = '';

if(isset($_FILES['file']['name']) &&  $_FILES['file']['name'] != '')
{
 $valid_extension = array('xml');
 $file_data = explode('.', $_FILES['file']['name']);
 $file_extension = end($file_data);
 if(in_array($file_extension, $valid_extension))
 {
  $data = simplexml_load_file($_FILES['file']['tmp_name']);
  $connect = new PDO('mysql:host=localhost;dbname=inventario','root', '');
  $query = "
  INSERT INTO almacen 
   (clasificacion, articulo, descripcion,cantidad, codigo, serie) 
   VALUES(:clasificacion, :articulo, :descripcion,:cantidad, :codigo, :serie);
  ";
  $statement = $connect->prepare($query);
  for($i = 0; $i < count($data); $i++)
  {
   $statement->execute(
    array(
     ':clasificacion'   => $data->almacen[$i]->clasificacion,
     ':articulo'  => $data->almacen[$i]->articulo,
     ':descripcion'  => $data->almacen[$i]->codigo,
	':cantidad'  => $data->almacen[$i]->cantidad,
     ':codigo' => $data->almacen[$i]->designation,
     ':serie'   => $data->almacen[$i]->serie
    )
   );

  }
  $result = $statement->fetchAll();
  if(isset($result))
  {
   $output = '<div class="alert alert-success">Importando datos Done</div>';
  }
 }
 else
 {
  $output = '<div class="alert alert-warning">Archivo invalido</div>';
 }
}
else
{
 $output = '<div class="alert alert-warning">Por favor elije un archivo XML </div>';
}

echo $output;

?>
