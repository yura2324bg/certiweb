<?php
include_once '../configuraciones/bd.php';
$conexionBD = BD::crearInstancia();
$consulta = $conexionBD->prepare("SELECT * FROM cursos");
$consulta->execute();
$listaCursos = $consulta->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $id = $_POST['id'] ?? '';
    $nombre = $_POST['nombre'] ?? '';

    if ($accion === 'agregar') {
        $sql = "INSERT INTO cursos (nombre_curso) VALUES (:nombre)";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();
        $mensaje = "Curso agregado correctamente";

    } elseif ($accion === 'editar') {
        $sql = "UPDATE cursos SET nombre_curso=:nombre WHERE id=:id";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $mensaje = "Curso editado correctamente";

    } elseif ($accion === 'borrar') {
        $sql = "DELETE FROM cursos WHERE id=:id";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $mensaje = "Curso eliminado correctamente";
    }

    // Ahora devolvemos la lista de cursos actualizada
    $consulta = $conexionBD->prepare("SELECT * FROM cursos");
    $consulta->execute();
    $cursos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "mensaje" => $mensaje,
        "cursosDisponibles" => $cursos
    ]);
    exit;
}

?>