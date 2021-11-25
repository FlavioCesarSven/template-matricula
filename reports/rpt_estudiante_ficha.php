<?php 


if( isset($_GET["idest"]) ){

// require_once './fpdf/fpdf.php';
require_once './rpt_plantillaEstudianteFicha.php';

require_once '../controller/cEstudianteC.php';

$pdf = new PDF("P", "mm", "A4");
$pdf ->SetMargins(10,10,10,10);
$pdf ->AddPage();
$pdf ->AliasNbPages();

$pdf -> Cell(20,10, utf8_decode("DNI"),1,0,'C');
$pdf -> Cell(70,10, utf8_decode("APELLIDOS"),1,0,'C');
$pdf -> Cell(70,10, utf8_decode("NOMBRES"),1,0,'C');
$pdf -> Cell(30,10, utf8_decode("FOTO"),1,1,'C');

$oCont = new cEstudianteC();
$row = $oCont->SelecById_Ficha(2);

    $pdf -> Cell(20, 20, $row["ndni_est"], 1,0,'C');
    $pdf -> Cell(70, 20, utf8_decode($row["apel_est"]), 1,0,'C');
    $pdf -> Cell(70, 20, utf8_decode($row["nomb_est"]), 1,0,'L');
    $pdf -> Cell(30, 20,  $pdf->Image('../'.$row['foto_est'], $pdf->GetX()+6, $pdf->GetY()+2, 15), 1,1,'C');
    
	$pdf -> Cell(45,10, utf8_decode("FECHA NAC."),1,0,'C');
	$pdf -> Cell(45,10, utf8_decode("SEXO"),1,0,'C');
	$pdf -> Cell(50,10, utf8_decode("OPERADOR"),1,0,'C');
	$pdf -> Cell(50,10, utf8_decode("N° MOVIL"),1,1,'C');

	$pdf -> Cell(45, 20, $row["fnac_est"], 1,0,'C');
    $pdf -> Cell(45, 20, utf8_decode($row["sexo_est"]), 1,0,'C');
    $pdf -> Cell(50, 20, utf8_decode($row["nomb_ope"]), 1,0,'L');
    $pdf -> Cell(50, 20, utf8_decode($row["ncel_est"]), 1,1,'C');

    $pdf->Output();
}else {
	echo "<script>alert('Seleccione un estudiante');</script>";
}
?> 