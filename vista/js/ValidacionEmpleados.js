function ValidacionEmpleados() {
    event.preventDefault();
    /*EXPRESION REGULAR CORREO*/
    expresioncorreo = /^[A-Za-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[A-Za-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[A-Za-z0-9](?:[A-Za-z0-9-]*[A-Za-z0-9])?\.)+[A-Za-z0-9](?:[A-Za-z0-9-]*[A-Za-z0-9])$/;
    /*------>*/

    /*EXPRESION REGULAR LETRAS*/
    expresionletras = /^([a-zA-ZÀ-ÿ\u00f1\u00d1\0-9])+(\s*)+([a-zA-ZÀ-ÿ\u00f1\u00d1\\0-9])+(\s*)+([a-zA-ZÀ-ÿ\u00f1\u00d1\0-9])+(\s*)+$/;
    /*------>*/

    /** EXPRESIÓN REGULAR TELEFONOS MÉXICO **/
    expresiontelefono = /^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/

    const nombre_empleado = document.getElementById("nombre_empleado").value;
    const ap_empleado = document.getElementById("ap_empleado").value;
    const am_empleado = document.getElementById("am_empleado").value;
    const telefono_fijo_empleado = document.getElementById("telefono_fijo_empleado").value;
    const telefono_movil_empleado = document.getElementById("telefono_movil_empleado").value;
    const numero_empleado = document.getElementById("numero_empleado").value;
    const usuario = document.getElementById("usuario").value;
    const contrasena = document.getElementById("contrasena").value;
    const correo_empleado = document.getElementById("correo_empleado").value;

    nombre_empleado.length == "" ? swal({
        title: "¡Campo: NOMBRE vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : ap_empleado.length == "" ? swal({
        title: "¡Campo: Apellido Paterno vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : am_empleado.length == "" ? swal({
        title: "¡Campo: Apellido Materno vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : telefono_fijo_empleado.length == "" ? swal({
        title: "¡Campo: Telefono Fijo vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : telefono_movil_empleado.length == "" ? swal({
        title: "¡Campo: Telefóno Movil vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : numero_empleado.length == "" ? swal({
        title: "¡Campo: Numero de Empleado vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : usuario.length == "" ? swal({
        title: "¡Campo: Usuario vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : contrasena.length == "" ? swal({
        title: "¡Campo: Contraseña vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : correo_empleado.length == "" ? swal({
        title: "¡Campo: Correo Electrónico vacio!",
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "error",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : !expresionletras.test(nombre_empleado) || !expresionletras.test(ap_empleado) || !expresionletras.test(am_empleado) ? swal({
        text: "¡Por favor, verifique la información ingresada en el campo!.",
        icon: "warning",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : !expresioncorreo.test(correo_empleado) ? swal({
        text: "¡Por favor, verifique el correo ingresado!.",
        icon: "warning",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : !expresiontelefono.test(telefono_fijo_empleado) || !expresiontelefono.test(telefono_movil_empleado) ? swal({
        text: "¡Por favor, verifique el numero telefónico fijo y/o telefóno movil ingresado!.",
        icon: "warning",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    }) : swal({
        text: "¡Datos registrados correctamente!.",
        icon: "success",
        timer: 2500,
        closeOnClickOutside: false,
        button: false,
    });
    var inputs = $("input[type=text]");
    for (var i = 0; i < inputs.length; i++) {
        var aux = $(inputs[i]).val().trim();
        $(inputs[i]).val(aux);
    }
}