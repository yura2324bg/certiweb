<?php
include_once '../configuraciones/bd.php';
$conexionBD = BD::crearInstancia();


$isFetch = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

function enviarRespuesta($mensaje, $alumnos = [], $status = 'ok', $cursosDisponibles = []) {
    global $isFetch;
    if ($isFetch) {
        echo json_encode([
            'status' => $status,
            'mensaje' => $mensaje,
            'alumnos' => $alumnos,
            'cursosDisponibles' => $cursosDisponibles
        ]);
        exit;
    }  
}


$id = $_POST['id'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$cursos = $_POST['cursos'] ?? [];
$accion = $_POST['accion'] ?? '';

switch ($accion) {
    case 'agregar':
        $sql = "INSERT INTO alumnos (id, nombre, apellidos) VALUES (NULL, :nombre, :apellidos)";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->execute();

        $idAlumno = $conexionBD->lastInsertId();

        if (!empty($cursos)) {
            foreach ($cursos as $curso) {
                $sql = "INSERT INTO alumnos_cursos (idalumno, idcurso) VALUES (:idalumno, :idcurso)";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':idalumno', $idAlumno);
                $consulta->bindParam(':idcurso', $curso);
                $consulta->execute();
            }
        }

        break;

    case 'editar':
        $sql = "UPDATE alumnos SET nombre=:nombre, apellidos=:apellidos WHERE id=:id";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        $sql = "DELETE FROM alumnos_cursos WHERE idalumno=:idalumno";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':idalumno', $id);
        $consulta->execute();

        if (!empty($cursos)) {
            foreach ($cursos as $curso) {
                $sql = "INSERT INTO alumnos_cursos (idalumno, idcurso) VALUES (:idalumno, :idcurso)";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':idalumno', $id);
                $consulta->bindParam(':idcurso', $curso);
                $consulta->execute();
            }
        }

        break;

    case 'borrar':
        // Borrar relaciones
        $sql = "DELETE FROM alumnos_cursos WHERE idalumno = :id";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        // Borrar alumno
        $sql = "DELETE FROM alumnos WHERE id = :id";
        $consulta = $conexionBD->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        break;

    // "Seleccionar" se maneja por separado en seleccionar_alumno.php
}

// Obtener todos los alumnos
$sql = "SELECT * FROM alumnos";
$listaAlumnos = $conexionBD->query($sql);
$alumnos = $listaAlumnos->fetchAll();

// Obtener cursos de cada alumno
foreach ($alumnos as $clave => $alumno) {
    $sql = "SELECT * FROM cursos 
            WHERE id IN (SELECT idcurso FROM alumnos_cursos WHERE idalumno=:idalumno)";
    $consulta = $conexionBD->prepare($sql);
    $consulta->bindParam(':idalumno', $alumno['id']);
    $consulta->execute();
    $cursosAlumno = $consulta->fetchAll();
    $alumnos[$clave]['cursos'] = $cursosAlumno;
}



$sql = "SELECT * FROM cursos";
$listaCursos = $conexionBD->query($sql);
$cursos = $listaCursos->fetchAll();
enviarRespuesta("Datos organizados correctamente", $alumnos, 'ok', $cursos);



?> 
