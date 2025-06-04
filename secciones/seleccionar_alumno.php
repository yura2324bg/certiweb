<?php
include("../configuraciones/bd.php");
$conexionBD = BD::crearInstancia();

header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {

    $id = $_POST["id"];

    // Consultar datos del alumno
    try {
        $sentencia = $conexionBD->prepare("SELECT * FROM alumnos WHERE id = :id");
        $sentencia->bindParam(":id", $id);
        $sentencia->execute();
        $alumnos = $sentencia->fetch(PDO::FETCH_ASSOC);

        if ($alumnos) {
            // Consultar cursos del alumno
            $sentenciacursos = $conexionBD->prepare("SELECT idcurso FROM alumnos_cursos WHERE idalumno = :idalumno");
            $sentenciacursos->bindParam(":idalumno", $id);
            $sentenciacursos->execute();
            $cursosalumno = $sentenciacursos->fetchAll(PDO::FETCH_COLUMN); // devuelve solo los IDs de cursos

            // Armar respuesta
            $respuesta = [
                "id" => $alumnos["id"],
                "nombre" => $alumnos["nombre"],
                "apellidos" => $alumnos["apellidos"],
                "cursos" => array_map("intval", $cursosalumno)  // Asegúrate de que sea un array de enteros
            ];

            // Enviar la respuesta como JSON
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        } else {
            echo json_encode(["error" => "Alumno no encontrado"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => "Error en la base de datos: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Solicitud inválida"]);
}
?>

