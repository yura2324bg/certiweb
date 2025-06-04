<?php include('../templates/cabecera.php'); ?> 
<?php include('../secciones/alumnos.php'); ?>

<div class="row mi-contenedor">
    <div class="col-5">
    <form id="formularioAlumnos"  method="post">
   
        <div class="card mi-formulario">
                <div class="card-header">Alumnos</div>
                <div class="card-body">
                    <div class="mb-3 d-none">
                        <label for="id" class="form-label">ID</label>
                        <input
                            type="text"
                            class="form-control"
                            name="id" value="<?php echo $id;?>"
                             id="id"
                            aria-describedby="helpId"
                            placeholder="Id"
                        />
                    </div>
                    <div class="mb-3">
                    <input type="text" id="buscadorAlumnos" class="form-control" placeholder="Buscar alumno por nombre o apellido">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nombre"  value="<?php echo $nombre;?>"
                             id="nombre"
                            aria-describedby="helpId"
                            placeholder="Escriba el nombre"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input
                            type="text"
                            class="form-control"
                            name="apellidos" value="<?php echo $apellidos;?>"
                            id="apellidos"
                            aria-describedby="helpId"
                            placeholder="Escriba los apellidos"
                        />
                       
                    </div>
                    <div class="mb-3">
    <label for="listaCursos" class="form-label">Cursos del alumno:</label>
    <button type="button" class="btn btn-outline-secondary" id="btnActualizarCursos" title="Actualizar cursos">🔄</button>
    <select multiple class="form-control"   name="cursos[]" id="listaCursos">

        
        <?php foreach ($cursos as $curso) { ?>

            <option
            <?php 
            if (!empty($arregloCursos)):
                if (in_array($curso['id'], $arregloCursos)):
                    echo 'selected';
                endif;
            endif;
            
            ?>
             value="<?php echo $curso['id']; ?>">
            <?php echo $curso['id']; ?> - <?php echo $curso['nombre_curso']; ?>
            </option>
        <?php } ?>
    </select>
</div>


                    <div class="btn-group" role="group" arial-label="">
                        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                        <button type="submit"  name="accion" value="editar"  class="btn btn-warning">Editar</button>
                        <button type="submit"  name="accion" value="borrar" class="btn btn-danger">Borrar</button>
</div>
                        


                </div>
            </div>
        </form>
    </div>
    <div class="col-7 mi-tabla">
        <div class="table-responsive">
            <table class="table">
                <thead> 
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                  
                </thead>
                <tbody>
                    <?php foreach($alumnos as $alumno): ?>
                    <tr>
                        <td ><?php echo $alumno['id'];?></td>

                        <td>
                            <?php echo $alumno['nombre'];?> <?php echo $alumno['apellidos'];?>
                            <br/>

                            <?php
if (isset($alumno["cursos"]) && is_array($alumno["cursos"])) {
    foreach ($alumno["cursos"] as $curso) {
        if (isset($curso['id']) && isset($curso['nombre_curso'])) {
            ?>
            - <a href="certificado.php?idcurso=<?php echo $curso['id']; ?>&idalumno=<?php echo $alumno['id']; ?>">
                <i class="bi bi-filetype-pdf text-danger "></i> <?php echo $curso['nombre_curso']; ?>
            </a><br/>
            <?php
        }
    }
} else {
    echo "No hay cursos disponibles.";
}
?>

                        
                        </td>

                        <td>
                        <button class="btn btn-info seleccionar-btn" data-id="<?php echo $alumno['id']; ?>">Seleccionar</button>


                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>


<script>

document.addEventListener('DOMContentLoaded', () => {
    const selectCursos = new TomSelect('#listaCursos');
    const formulario = document.getElementById('formularioAlumnos');
    asignarEventosSeleccionar();
    document.getElementById('buscadorAlumnos').addEventListener('input', function() {
    const filtro = this.value.toLowerCase();
    const filas = document.querySelectorAll('table tbody tr');

    filas.forEach(fila => {
        const nombreCompleto = fila.children[1].textContent.toLowerCase();
        fila.style.display = nombreCompleto.includes(filtro) ? '' : 'none';
    

    });

});
document.getElementById('btnActualizarCursos').addEventListener('click', () => {
    recargarListaCursosTomSelect();
});

    // Guardar el valor del botón presionado antes de enviar
    formulario.querySelectorAll('button[type="submit"]').forEach(boton => {
        boton.addEventListener('click', () => {
            formulario.dataset.accion = boton.value;
        });
    });

    formulario.addEventListener('submit', function(event) {
        event.preventDefault();

        const accion = formulario.dataset.accion;

        const formData = new FormData(formulario);
        formData.append('accion', accion);

        fetch('../secciones/alumnos.php', {
    method: 'POST',
    headers: {
        'X-Requested-With': 'XMLHttpRequest'
    },
    body: formData
})
    
.then(res => res.json())
.then(data => {
    alert(data.mensaje || 'Operación realizada correctamente');
    if (data.alumnos) {
        actualizarTablaAlumnos(data.alumnos);
        asignarEventosSeleccionar(); // Aquí dentro del .then
    }
    formulario.reset();
    document.getElementById('id').value = '';
    selectCursos.clear();
   
})
recargarListaCursosTomSelect();
})
})

// Función para actualizar tabla
function actualizarTablaAlumnos(alumnos) {
    const tbody = document.querySelector('table tbody');
    tbody.innerHTML = '';

    alumnos.forEach(alumno => {
        const tr = document.createElement('tr');

        const tdId = document.createElement('td');
        tdId.textContent = alumno.id;

        const tdNombre = document.createElement('td');
        tdNombre.innerHTML = `
            ${alumno.nombre} ${alumno.apellidos}<br/>
            ${alumno.cursos.map(curso => `
                - <a href="certificado.php?idcurso=${curso.id}&idalumno=${alumno.id}">
                    <i class="bi bi-filetype-pdf text-danger"></i> ${curso.nombre_curso}
                </a><br/>
            `).join('')}
        `;

        const tdAcciones = document.createElement('td');
        tdAcciones.innerHTML = `
            <button class="btn btn-info seleccionar-btn" data-id="${alumno.id}">Seleccionar</button>
        `;

        tr.appendChild(tdId);
        tr.appendChild(tdNombre);
        tr.appendChild(tdAcciones);
        tbody.appendChild(tr);
    });

    asignarEventosSeleccionar(); // Reasignar eventos luego de actualizar la tabla
}

// Función para botones de "Seleccionar"
function asignarEventosSeleccionar() {
    document.querySelectorAll('.seleccionar-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');

            fetch('../secciones/seleccionar_alumno.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(id)
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('id').value = data.id;
                document.getElementById('nombre').value = data.nombre;
                document.getElementById('apellidos').value = data.apellidos;

                const selectCursos = document.getElementById('listaCursos');
                [...selectCursos.options].forEach(option => {
                    option.selected = data.cursos.includes(parseInt(option.value));
                });

                selectCursos.tomselect.setValue(data.cursos);
            });
        });
    });
}
function recargarListaCursosTomSelect() {
    fetch('../secciones/cargar_cursos.php')
        .then(res => res.json())
        .then(data => {
            const selectCursos = document.getElementById('listaCursos');
            const tom = selectCursos.tomselect;

            tom.clearOptions();
            data.forEach(curso => {
                tom.addOption({ value: curso.id, text: `${curso.id} - ${curso.nombre_curso}` });
            });
            tom.refreshOptions(false); // importante: false para no abrir el dropdown automáticamente
        });
}

</script>



