
  function validarCampos() {
      var campo1 = document.getElementById('campo1');
      var campo2 = document.getElementById('campo2');
      var submitBtn = document.getElementById('submitBtn');
      var valido = campo1.checkValidity() && campo2.checkValidity();

      submitBtn.disabled = !valido;
  }

  document.getElementById('miFormulario').addEventListener('input', function(event) {
      var campo = event.target;
      if (campo.id === 'campo1' ) {
          campo.value = campo.value.replace(/[^A-Za-z0-9@.áÁéÉíÍóÓúÚ]/g, '');
      }
      if (campo.id === 'campo2') {
          campo.value = campo.value.replace(/[^A-Za-z0-9@.*6'-'_+áÁéÉíÍóÓúÚ]/g, '');
      }
      validarCampos();
  });

  

  document.getElementById('miFormulario').addEventListener('submit', function(event) {
      var campo1 = document.getElementById('campo1');
      var campo2 = document.getElementById('campo2');
      var valido = true;

      if (!campo1.checkValidity()) {
          campo1.classList.add('error');
          valido = false;
      } else {
          campo1.classList.remove('error');
      }

      if (!campo2.checkValidity()) {
          campo2.classList.add('error');
          valido = false;
      } else {
          campo2.classList.remove('error');
      }

      if (!valido) {
          event.preventDefault();
      }
  });




