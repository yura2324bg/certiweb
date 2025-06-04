<!-- Bootstrap JS (con Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const seccionAlumnos = document.getElementById('seccion-alumnos');

  if(seccionAlumnos){
    seccionAlumnos.addEventListener('shown.bs.collapse', function () {
      seccionAlumnos.scrollIntoView({ behavior: 'smooth' });
    });
  }

  // Guardar la posición del scroll al enviar formularios
  document.querySelectorAll('form').forEach(form => {
      form.addEventListener('submit', function () {
          sessionStorage.setItem('scrollPos', window.scrollY);
      });
  });

  // Restaurar la posición del scroll al recargar
  const scrollPos = sessionStorage.getItem('scrollPos');
  if (scrollPos) {
      window.scrollTo({ top: parseInt(scrollPos), behavior: 'instant' });
      sessionStorage.removeItem('scrollPos');
  }
});

</script>

</body>
</html>



