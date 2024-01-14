const passwordToggle = document.getElementById('password-toggle');
    const validarInput = document.getElementById('validar');
    const eyeIcon = document.getElementById('eyeIcon');

    passwordToggle.addEventListener('click', function() {
      if (validarInput.type === 'password') {
        validarInput.type = 'text';
        eyeIcon.classList.remove('far', 'fa-eye-slash');
        eyeIcon.classList.add('fas', 'fa-eye');
      } else {
        validarInput.type = 'password';
        eyeIcon.classList.remove('fas', 'fa-eye');
        eyeIcon.classList.add('far', 'fa-eye-slash');
      }
    });