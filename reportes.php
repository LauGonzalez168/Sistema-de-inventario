<?php 
        $server="localhost";
        $usuario="root";
        $contrasena="";
        $bd ="inventario";
        $conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
            or die("error en la conexion");
$casa=$_POST['casa'];
$nombre=$_POST['firma'];
$fecha=$_POST['fecha'];
$consulta=mysqli_query($conexion,"SELECT * FROM `casas_ciencia` where nombre='$casa' ")
            or die ("error al traer los datos");
 
    


//GENERAR PDF
require 'fpdf/fpdf.php';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Cell(30);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(120,10,utf8_decode('Reporte de artículos'),0,0,'C');
$pdf->Ln(20);
$pdf->Cell(10);
$pdf->SetFont('Arial','',12);

$pdf->Cell(330,5,utf8_decode($fecha),0,0,'C');
$pdf->Ln(20);
$pdf->Cell(20);
$pdf->SetFont('Arial','',14);

$pdf->Cell(20,5,utf8_decode('Nombre de casa de ciencia:'),0,0,'C');

$pdf->Cell(80,6,utf8_decode($casa),0,0,'C');
$pdf->Ln(20);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,6,'ID',1,0,'C',1);
$pdf->Cell(50,6,'Casa de ciencia',1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Artículo'),1,0,'C',1);
$pdf->Cell(30,6,'Cantidad',1,0,'C',1);
$pdf->Cell(40,6,'Fecha de entrega',1,1,'C',1);
while($row = mysqli_fetch_array($consulta)){
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,6,utf8_decode($row['id_casas']),1,0,'C',1);
$pdf->Cell(50,6,utf8_decode($row['nombre']),1,0,'C',1);
$pdf->Cell(50,6,utf8_decode($row['articulo']),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode($row['cantidad']),1,0,'C',1);
$pdf->Cell(40,6,utf8_decode($row['fecha_entrada']),1,1,'C',1);
}
$pdf->SetY(-50);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,utf8_decode($nombre),0,0,'C');
$pdf->SetY(-32);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,10,utf8_decode('Página ').$pdf->PageNo(),0,0,'C');
$pdf->Output();
?>