<?php

require('../libreria/fpdf186/fpdf.php');
include_once '../configuraciones/bd.php';
$conexionBD = BD::crearInstancia();

function agregarTexto($pdf, $texto, $x, $y, $align = 'L', $fuente, $size = 10, $r = 0, $g = 0, $b = 0) {
    $pdf->SetFont($fuente, "", $size);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($r, $g, $b);
    $pdf->Cell(190, 10, $texto, 0, 0, $align); // Usa un ancho de celda fijo
}

function agregarImagen($pdf, $imagen, $x, $y, $ancho, $alto) {
    $pdf->Image($imagen, $x, $y, $ancho, $alto);
}

$idcurso = isset($_GET['idcurso']) ? $_GET['idcurso'] : '';
$idalumno = isset($_GET['idalumno']) ? $_GET['idalumno'] : '';

$sql = "SELECT alumnos.nombre, alumnos.apellidos, cursos.nombre_curso
        FROM alumnos, cursos 
        WHERE alumnos.id = :idalumno AND cursos.id = :idcurso";

$consulta = $conexionBD->prepare($sql);
$consulta->bindParam(':idalumno', $idalumno);
$consulta->bindParam(':idcurso', $idcurso);
$consulta->execute();

$alumno = $consulta->fetch(PDO::FETCH_ASSOC);

$pdf = new FPDF("L", "mm", array(254, 194)); 
$pdf->AddPage();
$pdf->SetFont("Times", "B", 16);


agregarImagen($pdf, "../src/certificado_.jpg", 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());

// Nombre del estudiante
agregarTexto($pdf, ucwords(utf8_decode($alumno['nombre'] . " " . $alumno['apellidos'])), 90, 70, 'L', "Times", 40, 0, 84, 115);

// Nombre del curso
agregarTexto($pdf, utf8_decode($alumno['nombre_curso']), 35, 125, 'C', "Times", 30, 0, 84, 115);

agregarTexto($pdf, date("d/m/Y"), 55, 159, 'L', "Times", 20, 0, 94, 135);

$pdf->Output();

?>






