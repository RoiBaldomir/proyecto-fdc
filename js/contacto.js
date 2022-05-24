document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("form").addEventListener('submit', validarFormulario)
  });

  function validarFormulario(e) {
    e.preventDefault()
    let nombre = document.getElementById('nombre').value
    if(nombre.length === 0) {
      alert('El campo nombre no puede estar vacío')
      return;
    }
    let email = document.getElementById('email').value
    if (email.length === 0) {
      alert('El campo email no puede estar vacío')
      return
    }
    let mensaje = document.getElementById('mensaje').value
    if (mensaje.length === 0) {
      alert('El campo mensaje no puede estar vacío')
      return
    }
    this.submit()
  }