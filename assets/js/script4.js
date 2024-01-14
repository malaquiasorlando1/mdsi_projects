const passwordToggle = document.getElementById('password-toggle');
const senhaInput = document.getElementById('senha');
const eyeIcon = document.getElementById('eyeIcon');

passwordToggle.addEventListener('click', function() {
  if (senhaInput.type === 'password') {
    senhaInput.type = 'text';
    eyeIcon.classList.remove('fa-eye');
    eyeIcon.classList.add('fa-eye-slash');
  } else {
    senhaInput.type = 'password';
    eyeIcon.classList.remove('fa-eye-slash');
    eyeIcon.classList.add('fa-eye');
  }
});