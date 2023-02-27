<?php
session_start();

if (!$_SESSION['usuario']) {
    header('Location:login.php');
    die();
}

$colegio = $_POST['colegio'];

include('fpdf/fpdf.php');
include('conexion.php');

$sql = "SELECT * FROM `estudiantes` WHERE `eidcol` = '$colegio';";
$resultado = $con->query($sql);

 // CONFIGRACION DE REPORTE PREVIA
 $pdf = new fpdf('P','mm','Letter');
 $pdf->AddPage();
 $pdf->SetMargins(25,20,20);
 $pdf->SetFont('Arial','B',15);
 $pdf->SetTextColor(71,66,142);
 $pdf->SetXY(80,20);
 $pdf->Cell(50,10,utf8_decode('Listado de Alumnos'),0,0,'C');
 $pdf->Ln(15);

$pdf->SetFillColor(210,205,205);
$pdf->SetFont('Arial','i',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(10,10,'No',1,0,'C',true);
$pdf->Cell(10,10,'Id',1,0,'C',true);
$pdf->Cell(50,10,utf8_decode('Estudiante'),1,0,'C',true);
$pdf->Cell(30,10,'Direccion',1,0,'C',true);
$pdf->Cell(25,10,'Celular',1,0,'C',true);
$pdf->Cell(50,10,'Email',1,0,'C',true);
$i=1;

//if ($resultado) echo "Ok";
foreach($resultado as $row) {
$pdf->Ln();
$pdf->Cell(10,10,$i++,1,0,'C');
$pdf->Cell(10,10,$row['idest'],1,0,'C');
$pdf->Cell(50,10,$row['enom'] . ' ' . $row['epal'],1);
$pdf->Cell(30,10,$row['edir'],1,0,'R');
$pdf->Cell(25,10,$row['ecel'],1,0,'R');
$pdf->Cell(50,10,$row['email'],1,0,'R');
}

// PIE DE PAGINA 
$pdf->SetY(249);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,10,'Pag. '.$pdf->PageNo().' Impreso el ' . date("d-m-Y") . ' a las ' . date('h:i:s'),0,0,'C');

// SALIDA
$pdf->Output('Reporte','I');



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/index.css">

    <title>Educación</title>


</head>


<body >
    <div class="container-fluid  ">
        <div class="row ">
            <div class="col-md-3 menu">
                <div class="col-md-12 ">
                    <h1>Menu</h1>
                    <hr>
                </div>
                <div class="col-md-12 opciones">
                    <ul class="nav flex-column ">
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="colegios.php">Colegios</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="estudiantes.php">Estudiantes</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="listado.php">Listados</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="logout.php">Salir</a>
                        </li>

                    </ul>
                </div>

            </div>
            <div class="col-md-9 inicio">
                




            </div>
        </div>
    </div>

</body>

</html>