    const passwordToggle = document.getElementById('password-toggle');
    const senhaInput = document.getElementById('senha');
    const eyeIcon = document.getElementById('eyeIcon');

    passwordToggle.addEventListener('click', function() {
      if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        eyeIcon.classList.remove('far', 'fa-eye');
        eyeIcon.classList.add('fas', 'fa-eye-slash');
      } else {
        senhaInput.type = 'password';
        eyeIcon.classList.remove('fas', 'fa-eye-slash');
        eyeIcon.classList.add('far', 'fa-eye');
      }
    });

    const dataNascimentoInput = document.getElementById('data_nascimento');

    dataNascimentoInput.addEventListener('change', function() {
      const dataNascimento = new Date(this.value);
      const hoje = new Date();
      const idade = hoje.getFullYear() - dataNascimento.getFullYear();

      if (idade < 18) {
        document.getElementById('idadeNaoPermitida').style.display = 'block';
        dataNascimentoInput.setCustomValidity('Idade não permitida');
      } else {
        document.getElementById('idadeNaoPermitida').style.display = 'none';
        dataNascimentoInput.setCustomValidity('');
      }
    });
