<?php 

require_once './fpdf/fpdf.php';
require_once '../controller/cProgramasC.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../images/logo.png', 10, 10, -600);
    // Arial bold 15
    $this->SetFont("Arial", "B", 14);
    // Movernos a la derecha
    $this->Cell(0, 10, utf8_decode("IESTP VICTOR RAUL HAYA DE LA TORRE"), 0, 1 , 'C');
    // Título
    $this->Cell(0, 20, "PROGRAMAS DE ESTUDIO", 0, 1 , 'C');
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    $this->SetFont("Arial", "", 11);
}
}

$pdf = new PDF("P", "mm", "A4");
$pdf -> SetMargins(20,20,20,20);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$oCont = new cProgramasC();
$result = $oCont->listar();
//190
$pdf -> Cell(20, 10, utf8_decode("Nº"), 1,0,'C');
$pdf -> Cell(70, 10, "NOMBRE", 1,0,'C');
$pdf -> Cell(65, 10, utf8_decode("DESCRIPCION"), 1,0,'C');
$pdf -> Cell(20, 10, utf8_decode("ESTADO"), 1,1,'C');

foreach ($result as $row) {
    
    $pdf -> Cell(20, 10, $row["idprograma"], 1,0,'C');
    $pdf -> Cell(70, 10, utf8_decode($row["nomb_pro"]), 1,0,'L');
    $pdf -> Cell(65, 10, utf8_decode($row["desc_pro"]), 1,0,'L');
    $pdf -> Cell(20, 10, $row["estd_pro"], 1,1,'C');
}
$pdf->Output();


?> 