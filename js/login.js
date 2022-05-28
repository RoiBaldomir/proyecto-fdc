document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("form").addEventListener('submit', validarFormulario)
  });

  function validarFormulario(e) {
    e.preventDefault()
    let usuario = document.getElementById('usuario').value
    if(usuario.length === 0) {
      alert('El campo usuario no puede estar vacío')
      return;
    }
    let password = document.getElementById('password').value
    if (password.length === 0) {
      alert('El campo contraseña no puede estar vacío')
      return
    }
    this.submit()
  }