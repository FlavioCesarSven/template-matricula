<?php 

require_once './fpdf/fpdf.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../images/logo.png', 10, 8, 15);
    $this->SetFont("Arial", "B", 10);
    // Titulo
    $this->Cell(0, 5, utf8_decode("INSTITUTO DE EDUACIÓN SUPERIOR TECNOLÓGICO"), 0, 1 , 'C');
    $this->SetFont("Arial", "B", 12);
    $this->Cell(0, 5, utf8_decode("VÍCTOR RAÚL HAYA DE LA TORRE"), 0, 1 , 'C');
    $this->Cell(0, 10, utf8_decode("FICHA DE ESTUDIANTE"), 0, 1 , 'C');
    // Título
    date_default_timezone_set('America/Lima');
    $this->SetFont("Arial", "", 10);
    $this->Cell(0, 5, "Fecha: ". date("d/m/Y"), 0, 1 , 'R');
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    $this->SetFont('Arial','B',9);
    $this->SetDrawColor(51, 102, 153);
    $this->SetLineWidth(1);
    $this-> Line(10 , $this->GetY()-2, 200, $this->GetY()-2);
    $this->Cell(100,5,utf8_decode('Sistema Académico'),0,0,'I');
    $this->Cell(90,5,utf8_decode('Página').$this->PageNo().'/{nb}',0,1,'R');
}
}

?> 

