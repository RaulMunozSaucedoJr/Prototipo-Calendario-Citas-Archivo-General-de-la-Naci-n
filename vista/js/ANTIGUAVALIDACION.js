function ValidacionFormulario() {

    event.preventDefault();
    /*EXPRESION REGULAR CORREO*/
    expresioncorreo = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])$/;
    /*------>*/

    /*EXPRESION REGULAR LETRAS*/
    expresionletras = /^(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\-_,.´'/#\0-9]\s*)+(\s*)+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\-_,.´'/#\0-9]\s*)+(\s*)+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\-_,.´'/#\0-9]\s*)+(\s*)+$/;
    /*------>*/
    var frm = document.getElementsByName("formulario")[0];
    const nombre = document.getElementById("nombre").value;
    const apellido_paterno = document.getElementById("apellido_paterno").value;
    const apellido_materno = document.getElementById("apellido_materno").value;
    const numero_investigador = document.getElementById("numero_investigador").value;
    const institucion = document.getElementById("institucion").value;
    const hora_entrada = document.getElementById("hora_entrada").value;
    const hora_salida = document.getElementById("hora_salida").value;
    const coleccion = document.getElementById("coleccion").value;
    const serie = document.getElementById("serie").value;
    const caja = document.getElementById("caja").value;
    const pieza = document.getElementById("pieza").value;
    const tema = document.getElementById("tema").value;
    const correo = document.getElementById("correo").value;

    if (nombre.length == "") {
        swal({
            title: "¡Campo: NOMBRE vacio!",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(nombre)) {

        swal({
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "warning",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (apellido_paterno.length == "") {
        swal({
            title: "¡Campo: APELLIDO PATERNO vacio!.",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(apellido_paterno)) {
        swal({
            title: "¡Se encontraron caracteres no aceptados!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (apellido_materno.length == "") {
        swal({
            title: "¡Campo: APELLIDO MATERNO vacio!.",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(apellido_materno)) {
        swal({
            title: "¡Se encontraron caracteres no aceptados!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (numero_investigador.length == "") {
        swal({
            title: "¡Campo: NUMERO INVESTIGADOR vacio!.",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(numero_investigador)) {
        swal({
            title: "¡Se encontraron caracteres no aceptados!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (institucion.length == "") {
        swal({
            title: "¡Campo: INSTITUCIÓN vacio!.",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(institucion)) {
        swal({
            title: "¡Se encontraron caracteres no aceptados!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (hora_entrada.length == "") {
        swal({
            title: "¡Verifique que haya seleccionado una hora de entrada!",
            text: "El formato del reloj es de 24 hrs",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (hora_salida.length == "") {
        swal({
            title: "¡Verifique que haya seleccionado una hora de salida!",
            text: "El formato del reloj es de 24 hrs",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (coleccion.length == "") {
        swal({
            title: "¡Verifique que el campo COLECCIÓN no se encuentre vacio!",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(coleccion)) {
        swal({
            title: "¡Se encontraron caracteres no aceptados en el campo: COLECCIÓN!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados en el campo!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (serie.length == "") {

        swal({
            title: "¡Verifique que el campo SERIE | SECCIÓN no se encuentre vacio!",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(serie)) {

        swal({
            title: "¡Se encontraron caracteres no aceptados en el campo: COLECCIÓN!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (caja.length == "") {

        swal({
            title: "¡Verifique que el campo CAJA no se encuentre vacio!",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(caja)) {

        swal({
            title: "¡Se encontraron caracteres no aceptados en el campo: CAJA!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (pieza.length == "") {

        swal({
            title: "¡Verifique que el campo PIEZA no se encuentre vacio!",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(pieza)) {

        swal({
            title: "¡Se encontraron caracteres no aceptados en el campo: PIEZA!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (tema.length == "") {

        swal({
            title: "¡Verifique que el campo TEMA no se encuentre vacio!",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresionletras.test(tema)) {

        swal({
            title: "¡Se encontraron caracteres no aceptados en el campo: TEMA!.",
            text: "¡Por favor, verifique que ingresa caracteres autorizados!.",
            icon: "warning",
            timer: 6000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (correo.length == "") {

        swal({
            title: "¡Campo: CORREO vacio!",
            text: "¡Por favor, verifique la información ingresada en el campo!.",
            icon: "error",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else if (!expresioncorreo.test(correo)) {
        swal({
            title: "¡El correo ingresado NO es un correo valido!.",
            text: "¡Por favor, verifique que ingresa un correo electrónico valido!.",
            icon: "warning",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    } else {
        swal({
            text: "¡Datos registrados correctamente!.",
            icon: "success",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    }
}