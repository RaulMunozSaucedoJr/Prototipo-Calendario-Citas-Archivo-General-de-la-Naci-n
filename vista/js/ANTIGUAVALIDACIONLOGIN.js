function ValidacionLogin() {

    /*EXPRESION REGULAR LETRAS*/
    expresionletras = /^([a-zA-ZÀ-ÿ\u00f1\u00d1])+([a-zA-ZÀ-ÿ\u00f1\u00d1])+([a-zA-ZÀ-ÿ\u00f1\u00d1])+$/;
    /*------>*/

    const usuario = document.getElementById("usuario").value;
    const contrasena = document.getElementById("contrasena").value;

    if (usuario.length == "" || usuario.length <= 0 || contrasena.length == "" || contrasena.length <= 0) {
        event.preventDefault();
        swal({
            title: "¡Usuario y/o Contraseña vacios!.",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 2000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresioncorreo.test(usuario) || !expresioncorreo.test(contrasena)) {
        swal({
            title: "¡Se encontrarón caracteres NO validos!.",
            text: "¡Por favor, verifique la información ingresada!.",
            icon: "warning",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    }
}