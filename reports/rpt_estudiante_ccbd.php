<?php 

require_once './fpdf/fpdf.php';
require_once '../controller/cEstudianteC.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../images/logo.png', 10, 10, -600);
    // Arial bold 15
    $this->SetFont("Arial", "B", 14);
    date_default_timezone_set('America/Lima');
    $this->Cell(0, 5, "Fecha: ". date("d/m/Y"), 0, 1, "R");
    // Movernos a la derecha
    $this->Cell(0, 10, utf8_decode("IESTP VICTOR RAUL HAYA DE LA TORRE"), 0, 1 , 'C');
    // Título
    $this->Cell(0, 20, "REPORTES DE ESTUDIANTES", 0, 1 , 'C');
    // Salto de línea
    $this->Ln(5);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',8);
    $this->SetDrawColor(61,174,233);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    $this->SetFont("Arial", "", 11);
}
}

$pdf = new PDF('L', 'mm', 'A4');
$pdf -> SetMargins(7,20,20,20);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);

$oCont = new cEstudianteC();
$result = $oCont->listar();
//190
$pdf -> Cell(10, 10, utf8_decode("Nº"), 1,0,'C');
$pdf -> Cell(20, 10, utf8_decode("DNI"), 1,0,'C');
$pdf -> Cell(80, 10, "NOMBRE Y NOMBRES", 1,0,'C');
$pdf -> Cell(22, 10, utf8_decode("N° MÓVIL"), 1,0,'C');
$pdf -> Cell(70, 10, utf8_decode("DIRECCIÓN"), 1,0,'C');
$pdf -> Cell(42, 10, utf8_decode(" FECHA DE NACIMIENTO"), 1,0,'C');
$pdf -> Cell(38, 10, utf8_decode("FOTOGRAFÍA"), 1,1,'C');

foreach ($result as $row) {
    
    $fecha = $row["fnac_est"];
    $fecha = date("d/m/Y", strtotime($fecha));

    $pdf -> Cell(10, 12, $row["idestudiante"], 1,0,'C');
    $pdf -> Cell(20, 12, $row["ndni_est"], 1,0,'C');
    $pdf -> Cell(80, 12, utf8_decode($row["ESTUDIANTE"]), 1,0,'L');
    $pdf -> Cell(22, 12, utf8_decode($row["ncel_est"]), 1,0,'C');
    $pdf -> Cell(70, 12, utf8_decode($row["dire_est"]), 1,0,'L');
    $pdf -> Cell(42, 12, $fecha, 1,0,'C');
    $pdf -> Cell(38, 12, $pdf->Image('../'.$row['foto_est'], $pdf->GetX()+14, $pdf->GetY()+2, 8), 1,1,'L');

}
$pdf->Output();


?> 