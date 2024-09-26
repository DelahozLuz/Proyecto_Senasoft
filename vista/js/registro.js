// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('#FormRegistro')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                if (!form.checkValidity()) {
                    event.stopPropagation()
                    form.classList.add('was-validated')
                }else{
                    let nombre = document.getElementById("txtNombre").value;
                    let apellido = document.getElementById("txtApellido").value;
                    let telefono = document.getElementById("txtTelefono").value;
                    let email = document.getElementById("txtEmail").value;
                    let password = document.getElementById("txtPasswords").value;
                    let objData = {"registrarUsuario":"ok","nombre":nombre,"apellido":apellido,"telefono":telefono,"email":email,"password":password};
                    let objRegistrarUsuario = new usuario(objData);
                    objRegistrarUsuario.registrarUsuario();
                }

            }, false)
        })
})()



