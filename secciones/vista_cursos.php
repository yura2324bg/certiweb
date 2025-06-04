<?php include('../templates/cabecera.php'); ?> 
<?php include('../secciones/cursos.php'); ?> 

<div class="row">
    <div class="col-12">
        
        <div class="row" id="vista-cursos">

            <!-- Formulario de cursos -->
            <div class="col-12 col-md-5">
                <form id="formCursos" action="" method="post">
                    <div class="card">
                        <div class="card-header">Cursos</div>
                        <div class="card-body">
                            <div class="mb-3 d-none">
                                <label for="" class="form-label">ID</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="id"
                                    id="id"
                                    value=""
                                    placeholder="ID"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="nombre_curso" class="form-label">Nombre</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nombre_curso"
                                    id="nombre_curso"
                                    value=""
                                    placeholder="Nombre del curso"
                                />
                            </div>

                            <div class="btn-group" role="group">
                                <button type="submit" name="accion" value="agregar" class="btn btn-success" id="btnAgregar">Agregar</button>
                                <button type="submit" name="accion" value="editar" class="btn btn-warning" id="btnEditar">Editar</button>
                                <button type="submit" name="accion" value="borrar" class="btn btn-danger" id="btnBorrar">Borrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tabla de cursos -->
            <div class="col-12 col-md-7">
                <div class="table-responsive">
                    <table id="tabla-cursos" class="table tabla-personalizada table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listaCursos as $curso){ ?>
                            <tr data-id="<?php echo $curso['id']; ?>" data-nombre="<?php echo $curso['nombre_curso']; ?>">
                                <td><?php echo $curso['id']; ?></td>
                                <td><?php echo $curso['nombre_curso']; ?></td>
                                <td>
                                    <button class="btn btn-info seleccionar-curso">Seleccionar</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

    
    <script>
     document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("formCursos");
    const nombreInput = document.getElementById("nombre_curso");
    let accion = "agregar"; // acción por defecto
    let idCursoSeleccionado = "";

    // Botones
    document.getElementById("btnAgregar").addEventListener("click", () => accion = "agregar");
    document.getElementById("btnEditar").addEventListener("click", () => accion = "editar");
    document.getElementById("btnBorrar").addEventListener("click", () => accion = "borrar");

    // Cuando se selecciona un curso para editar
    document.querySelector("#tabla-cursos").addEventListener("click", function (e) {
        if (e.target.classList.contains("seleccionar-curso")) {
            const fila = e.target.closest("tr");
            idCursoSeleccionado = fila.dataset.id;
            nombreInput.value = fila.dataset.nombre;
        }
    });

    // Enviar formulario con fetch
    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        const datos = new FormData();
        datos.append("accion", accion);
        datos.append("nombre", nombreInput.value);
        if (idCursoSeleccionado) {
            datos.append("id", idCursoSeleccionado);
        }

        fetch("cursos.php", {
            method: "POST",
            body: datos
        })
        .then(res => res.json())
        .then(respuesta => {
            alert(respuesta.mensaje);
            nombreInput.value = "";
            idCursoSeleccionado = "";
            actualizarTablaCursos(respuesta.cursosDisponibles);
            if (typeof recargarListaCursosTomSelect === 'function') {
        recargarListaCursosTomSelect();
    }
            
        });
        
    });

    function actualizarTablaCursos(cursos) {
        const tbody = document.querySelector("#tabla-cursos tbody");
        tbody.innerHTML = "";

        cursos.forEach(curso => {
            const fila = document.createElement("tr");
            fila.dataset.id = curso.id;
            fila.dataset.nombre = curso.nombre_curso;

            fila.innerHTML = `
                <td>${curso.id}</td>
                <td>${curso.nombre_curso}</td>
                <td><button class="seleccionar-curso btn btn-info">Seleccionar</button></td>
            `;

            tbody.appendChild(fila);
        });
    }
    fetch("cursos.php")
        .then(res => res.json())
        .then(respuesta => {
            actualizarTablaCursos(respuesta.cursosDisponibles);
        });
    
});

        // Scroll al hacer clic en "Ver Cursos"
        document.getElementById("btnVerCursos").addEventListener("click", function() {
            const seccioncursos = document.getElementById("vista-cursos");
            if (seccioncursos) {
                seccioncursos.scrollIntoView({ behavior: "smooth" });
            }
        });

       
    </script>
<?php include('../templates/pie.php'); ?>