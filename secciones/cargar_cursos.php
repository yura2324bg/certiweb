<?php
include_once '../configuraciones/bd.php';
$conexionBD = BD::crearInstancia();

$sentencia = $conexion->prepare("SELECT id, nombre_curso FROM cursos");
$sentencia->execute();
$cursos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cursos);
