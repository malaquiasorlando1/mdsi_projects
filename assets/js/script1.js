    const passwordToggle = document.getElementById('password-toggle');
    const senhaInput = document.getElementById('senha');
    const eyeIcon = document.getElementById('eyeIcon');

    passwordToggle.addEventListener('click', function() {
      if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        eyeIcon.classList.remove('far', 'fa-eye-slash');
        eyeIcon.classList.add('fas', 'fa-eye');
      } else {
        senhaInput.type = 'password';
        eyeIcon.classList.remove('fas', 'fa-eye');
        eyeIcon.classList.add('far', 'fa-eye-slash');
      }
    });