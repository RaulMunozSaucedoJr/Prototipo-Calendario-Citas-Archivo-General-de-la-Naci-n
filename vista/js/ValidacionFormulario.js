//Inputs
const Nombre = document.getElementById("nombre");
const apellido_paterno = document.getElementById('apellido_paterno');
const apellido_materno = document.getElementById('apellido_materno');
const numero_investigador = document.getElementById('numero_investigador');
const institucion = document.getElementById('institucion');
const hora_entrada = document.getElementById("hora_entrada");
const hora_salida = document.getElementById("hora_salida");
const coleccion = document.getElementById('coleccion');
const serie = document.getElementById('serie');
const caja = document.getElementById('caja');
const pieza = document.getElementById('pieza');
const tema = document.getElementById('tema');
const correo = document.getElementById('correo');
//Formulario
const formulario = document.getElementById('formulario');
//Colores
const verde = '#4caf50';
const rojo = '#f44336';

//Manejador de Formulario
formulario.addEventListener('submit', function (event) {
    event.preventDefault();
    if (
        validarNombre() && validarApellidoPaterno() && validarApellidoMaterno() &&
        validarNumeroInvestigador() && validarInstitucion() && validarFondoColeccion &&
        validarSeccionSerie() && validarCajaSobreExpediente() && validarFotografiaPieza() &&
        validarTema() && validarCorreo()
    ) {
        swal({
            text: "¡Datos registrados correctamente!.",
            icon: "success",
            timer: 3000,
            closeOnClickOutside: true,
            button: false,
            closeOnEsc: true,
        });
    }
});

function validarNombre() {
    //Verificar si esta vacio
    if (verificarVacio(Nombre)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(Nombre)) return;
    if (verificarTamano(Nombre, 4, 50)) return;
    return true;
}

function validarApellidoPaterno() {
    //Verificar si esta vacio
    if (verificarVacio(apellido_paterno)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(apellido_paterno)) return;
    if (verificarTamano(apellido_paterno, 4, 50)) return;
    return true;
}

function validarApellidoMaterno() {
    //Verificar si esta vacio
    if (verificarVacio(apellido_materno)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(apellido_materno)) return;
    if (verificarTamano(apellido_materno, 4, 50)) return;
    return true;
}

function validarNumeroInvestigador() {
    //Verificar si esta vacio
    if (verificarVacio(numero_investigador)) return;
    //Verificar si cumple con la expresion regular
    if (!verificarNoInvestigador(numero_investigador)) return;
    if (verificarTamano(numero_investigador, 4, 50)) return;
    return true;
}

function validarInstitucion() {
    //Verificar si esta vacio
    if (verificarVacio(institucion)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(institucion)) return;
    if (verificarTamano(institucion, 4, 50)) return;
    return true;
}

function validarFondoColeccion() {
    //Verificar si esta vacio
    if (verificarVacio(coleccion)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(coleccion)) return;
    if (verificarTamano(coleccion, 4, 50)) return;
    return true;
}

function validarSeccionSerie() {
    //Verificar si esta vacio
    if (verificarVacio(serie)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(serie)) return;
    if (verificarTamano(serie, 4, 50)) return;
    return true;
}

function validarCajaSobreExpediente() {
    //Verificar si esta vacio
    if (verificarVacio(caja)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(caja)) return;
    if (verificarTamano(caja, 4, 50)) return;
    return true;
}

function validarFotografiaPieza() {
    //Verificar si esta vacio
    if (verificarVacio(pieza)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(pieza)) return;
    if (verificarTamano(pieza, 4, 50)) return;
    return true;
}

function validarTema() {
    //Verificar si esta vacio
    if (verificarVacio(tema)) return;
    //Verificar si solo tiene letras
    if (!verificarSoloLetras(tema)) return;
    if (verificarTamano(tema, 4, 50)) return;
    return true;
}

function validarCorreo() {
    //Verificar si esta vacio
    if (verificarVacio(correo)) return;
    if (verificarTamano(correo, 4, 50)) return;
    if (!contenedorRegEx(correo, 5)) return;
    return true;
}

function verificarVacio(field) {
    if (estaVacio(field.value.trim())) {
        //Regresar Invalido
        ponerInvalido(field, `${field.name} NO debe de estar vacio`);
        return true;
    } else {
        //Regresar Valido
        ponerValido(field);
        return false;
    }
}

function estaVacio(value) {
    if (value === '') return true;
    return false;
}

function ponerInvalido(field, message) {
    field.className = 'invalid';
    field.nextElementSibling.innerHTML = message;
    field.nextElementSibling.style.color = rojo;
}

function ponerValido(field) {
    field.className = 'valid';
    field.nextElementSibling.innerHTML = '';
    //field.nextElementSibling.style.color = verde;
}

function verificarSoloLetras(field) {
    if (/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/.test(field.value)) {
        ponerValido(field);
        return true;
    } else {
        ponerInvalido(field, `${field.name} debe contener SOLO LETRAS con ó sin acentuación`);
        return false;
    }
}

function verificarNoInvestigador(field) {
    if (/^[a-zA-ZÀ-ÿ0-9\u00f1\u00d1\/.#]+$/.test(field.value)) {
        ponerValido(field);
        return true;
    } else {
        ponerInvalido(field, `${field.name} debe contener LETRAS, NUMEROS Y CARACTERES ESPCIALES ESPECIFICADOS`);
        return false;
    }
}

function verificarTamano(field, tamanoMinimo, tamanoMaximo) {
    if (field.value.length >= tamanoMinimo && field.value.length < tamanoMaximo) {
        ponerValido(field);
        return true;
    } else if (field.value.length < tamanoMinimo) {
        ponerInvalido(field, `${field.name} debe de tener al menos ${tamanoMinimo} caracteres.`);
        return false;
    } else {
        ponerInvalido(field, `${field.name} debe de tener menos de ${tamanoMaximo} caracteres.`);
        return false;
    }
}

function contenedorRegEx(field, code) {
    let regEx;
    switch (code) {

        case 1:
            // Email pattern
            regEx = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])$/;
            return coincidirRegEx(regEx, field, '¡Debe ingresar un correo valido!.');
        default:
            return false;
    }
}

function coincidirRegEx(regEx, field, message) {
    if (field.value.match(regEx)) {
        ponerValido(field);
        return true;
    } else {
        ponerInvalido(field, message);
        return false;
    }
}