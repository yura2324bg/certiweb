<?php include('../templates/cabecera.php'); ?> 


<div class="p-5 bg-light">
  <div class="container">
    <h1 class="fw-bold">Sistema de Gestión de Certificados de los Cursos Aprobados</h1>
    <p class="lead">Plataforma web que permite generar, administrar y validar certificados académicos y profesionales de forma rápida, segura y eficiente. Este sistema ha sido desarrollado para instituciones educativas, empresas u organizaciones que necesitan emitir certificados digitales con respaldo y autenticidad.</p>
    <hr class="my-2">
    <p class="lead">
      
    </p>
  </div>
</div>
<div style="display: flex; justify-content: center; gap: 40px; margin: 30px 0;">
  <img src="../src/certi.jpeg" alt="Imagen 1" style="width: 140px; height: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
  <img src="../src/images.png" alt="Imagen 2" style="width: 140px; height: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
  <img src="../src/images-1 copia.jpeg" alt="Imagen 3" style="width: 160px; height: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
  <img src="../src/Unknown-1.png" alt="Imagen 3" style="width: 140px; height: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
  <img src="../src/images-1.jpeg" alt="Imagen 3" style="width: 140px; height: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
</div>

<!-- Beneficios -->
<div class="row text-center mt-5 mb-4">
  <div class="col-md-4">
    <i class="bi bi-file-earmark-check fs-1"></i>
    <h5 class="mt-2">Generación Rápida</h5>
    <p>Crea certificados en pocos clics.</p>
  </div>
  <div class="col-md-4">
    <i class="bi bi-lock fs-1"></i>
    <h5 class="mt-2">Seguridad</h5>
    <p>Tus datos están protegidos y respaldados.</p>
  </div>
  <div class="col-md-4">
    <i class="bi bi-share fs-1"></i>
    <h5 class="mt-2">Fácil Compartir</h5>
    <p>Envía certificados por correo o descárgalos en PDF.</p>
  </div>
</div>

<!-- Certificados de Programación -->
<div class="container mt-5">
  <h3 class="fw-bold mb-3">Certificados de Programación</h3>
  <p>Los certificados de programación son reconocimientos digitales que avalan los conocimientos y habilidades adquiridas en el desarrollo de software, lenguajes de programación y tecnologías relacionadas.</p>

  <ul>
    <li>Desarrollo web (HTML, CSS, JavaScript, PHP, etc.)</li>
    <li>Desarrollo de aplicaciones móviles</li>
    <li>Programación orientada a objetos</li>
    <li>Manejo de bases de datos (MySQL, PostgreSQL)</li>
  </ul>

  <h5 class="mt-4 fw-semibold">¿Por qué son importantes?</h5>
  <ul>
    <li>Validez académica y profesional: Aumenta oportunidades laborales.</li>
    <li>Prueba tu formación: Respaldo de participación en cursos, talleres o diplomados.</li>
  </ul>
</div>

<!-- Detalle de Cursos -->
<div class="container mt-4">
  <h4 class="fw-bold mb-3">Conoce Nuestros Cursos</h4>

  <div class="row">
    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-lightning-charge"></i> Curso de React</h5>
      <p>Aprende a construir interfaces modernas y dinámicas con React, una de las librerías más populares de JavaScript. Ideal para desarrollar aplicaciones web SPA (Single Page Applications).</p>
    </div>

    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-laptop"></i> Curso de Java</h5>
      <p>Explora los fundamentos de la programación orientada a objetos con Java. Aprende a crear aplicaciones robustas y multiplataforma utilizando este poderoso lenguaje backend.</p>
    </div>

    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-code-slash"></i> Curso de HTML, CSS y JavaScript</h5>
      <p>Domina la base del desarrollo web con HTML para la estructura, CSS para el diseño visual y JavaScript para añadir interactividad a tus sitios web.</p>
    </div>

    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-phone"></i> Curso de Aplicaciones Móviles</h5>
      <p>Aprende a crear apps móviles para Android y iOS utilizando frameworks modernos como React Native o Flutter. Ideal para desarrollar proyectos multiplataforma.</p>
    </div>

    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-book"></i> Curso de Bases de Datos</h5>
      <p>Aprende a diseñar, gestionar y optimizar bases de datos relacionales como MySQL y PostgreSQL. Descubre cómo hacer consultas eficientes y estructurar tus datos.</p>
    </div>
    <div class="text-center mb-4">
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#mas-cursos" id="btnVerMasCursos" aria-expanded="false">
    Ver más cursos
  </button>
</div>

  </div>
</div>
<div class="collapse" id="mas-cursos">
  <div class="row">
    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-globe"></i> Curso de Desarrollo Web Avanzado</h5>
      <p>Aprende técnicas avanzadas de desarrollo web como consumo de APIs, AJAX, y arquitectura MVC con frameworks como Laravel o Express.js.</p>
    </div>

    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-brush"></i> Curso de Diseño UX/UI</h5>
      <p>Domina los principios del diseño centrado en el usuario. Aprende herramientas como Figma, Adobe XD y fundamentos de diseño responsivo.</p>
    </div>

    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-bar-chart-line"></i> Curso de Análisis de Datos</h5>
      <p>Aprende a procesar y visualizar datos con herramientas como Python, Pandas, Power BI o Tableau. Ideal para tomar decisiones basadas en datos.</p>
    </div>

    <div class="col-md-6 mb-4">
      <h5 class="text-primary"><i class="bi bi-shield-lock"></i> Curso de Ciberseguridad Básica</h5>
      <p>Conoce las bases de la seguridad informática, protección de datos, amenazas comunes y buenas prácticas para usuarios y desarrolladores.</p>
    </div>
  </div>
</div>



<!-- Botones para mostrar secciones -->
<div class="container mt-5 text-center">
  <button class="btn btn-outline-primary m-2" data-bs-toggle="collapse" data-bs-target="#seccion-alumnos">Registro de alumnos certificados</button>
  <button class="btn btn-outline-secondary m-2" data-bs-toggle="collapse" data-bs-target="#seccion-cursos"id="btnVerCursos">Registro de cursos aprobados</button>
</div>

<!-- Sección Alumnos -->
<div id="seccion-alumnos" class="collapse container mt-4">
  <h4 class="fw-bold mb-3">Alumnos Certificados</h4>
  <?php include('vista_alumnos.php'); ?>
</div>

<!-- Sección Cursos -->
<div id="seccion-cursos" class="collapse container mt-4">
  <h4 class="fw-bold mb-3">Cursos Aprobados</h4>
  <?php include('vista_cursos.php'); ?>
</div>
<form action="../secciones/cerrar.php" method="post" class="text-center my-4">
  <button type="submit" class="btn btn-secondary">Cerrar sesión</button>
</form>

<div style="text-align: center; margin-top: 20px;">
  <a href="#testimonios" style="
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 12px 25px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s;
  " onmouseover="this.style.backgroundColor='#0056b3'" onmouseout="this.style.backgroundColor='#007bff'">
    Opiniones
  </a>
  <!-- Sección de Testimonios -->
<section id="testimonios" class="container mt-5 mb-5">
  <h2 class="text-center fw-bold mb-4">Opiniones de Alumnos</h2>

  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <p class="card-text">"Gracias a este sistema pude obtener mi certificado de manera rápida y sin complicaciones. ¡Excelente herramienta!"</p>
          <h6 class="card-subtitle text-muted mt-3">— Ana Gómez</h6>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <p class="card-text">"La plataforma es muy intuitiva. Generar certificados para mis cursos fue muy fácil y seguro."</p>
          <h6 class="card-subtitle text-muted mt-3">— Carlos López</h6>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <p class="card-text">"Una excelente solución para instituciones educativas. Todo queda registrado y validado."</p>
          <h6 class="card-subtitle text-muted mt-3">— Laura Martínez</h6>
        </div>
      </div>
    </div>
  </div>
</section>

</div>

<?php include('../templates/pie.php'); ?>





 