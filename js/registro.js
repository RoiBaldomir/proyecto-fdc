document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form").addEventListener('submit', validarFormulario)
});

function validarFormulario(e) {
  e.preventDefault()
  let nombre = document.getElementById('nombre').value
  if(nombre.length === 0) {
    alert('El campo nombre no puede estar vacío.')
    return;
  }
  let usuario = document.getElementById('usuario').value
  if (usuario.length === 0) {
    alert('El campo usuario no puede estar vacío.')
    return
  }
  let email = document.getElementById('email').value
  if (email.length === 0) {
    alert('El campo email no puede estar vacío.')
    return
  }
  let password = document.getElementById('password').value
  if (password.length === 0) {
    alert('El campo contraseña no puede estar vacío.')
    return
  }
  let cpassword = document.getElementById('cpassword').value
  if (cpassword.length === 0) {
    alert('El campo confirmar contraseña no puede estar vacío.')
    return
  }
  if (password !== cpassword) {
    alert('Las contraseñas no coinciden.')
    return
  }
  this.submit()
}