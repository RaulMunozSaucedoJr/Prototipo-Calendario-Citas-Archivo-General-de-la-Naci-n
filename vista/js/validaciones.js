$(document).ready(function () {
    $('#alertavalidacion').hide();
    $('#idcargando').hide();

    console.log('validaciones');

    $("#Noinvestigador").change(function () {



        Noinvestigador = $("#Noinvestigador").val();
        console.log(Noinvestigador);



        $.ajax({
            method: "GET",
            url: "controlador/catalogoinvestigador.php",
            data: {
                Noinvestigador: Noinvestigador
            },
        }).done(function (datossalida) {
            datosjson = datossalida;
            console.log(datosjson);
            $.each(datosjson, function (key, value) {
                console.log(datosjson[key].amaterno);
                //  $('#selecthorario').append("<option value=" + datosjson[key].id_horario + ">" + datosjson[key].horario + "</option>)");
                $('#Nombre').val(datosjson[key].nombre);
                $('#Paterno').val(datosjson[key].apaterno);
                $('#Materno').val(datosjson[key].amaterno);
                $('#Correo').val(datosjson[key].email);
            });
        });
    });









});








/////FUNCION - AGREGAR REFERENCIAS





var i = 1;

function agregarREF() {
    console.log("boton referencias")
    idarea = $('#selectarea').children("option:selected").val();

    i = $('#numreferencias').val();


    i = parseInt(i) + 1;

    if (i <= 12) {
        $('#addreferencia').append(' <div  class="row filareferenciadinamica" style="background-color:#DCEAD5;  padding: 7px;">' +
            '<div id="DIVFondoColeccionGrupo' + i + '" class="col-md-2"> ' +
            ' <label>Fondo/Colecciòn :</label>' +
            ' <input id="FondoColeccionGrupo' + i + '" class="form-control" type="text" placeholder="" name="FondoColeccionGrupo' + i + '">' +
            ' </div>' +
            ' <div id="DIVSeccionSerie' + i + '" class="col-md-2">' +
            '   <label>Secciòn/Serie :</label>' +
            '    <input  id="SeccionSerie' + i + '" class="form-control" type="text" placeholder="" name="SeccionSerie' + i + '">' +
            ' </div>' +
            '<div id="DIVCajaSobre' + i + '" class="col-md-2">' +
            '  <label>Caja/Sobre/Expediente :</label>' +
            ' <input id="CajaSobre' + i + '"  class="form-control" type="text" placeholder="" name="CajaSobre' + i + '">' +
            ' </div>' +
            ' <div id="DIVVolumen' + i + '" class="col-md-2">' +
            '   <label>Volumen :</label>' +
            '  <input id="Volumen' + i + '" class="form-control" type="text" placeholder="" name="Volumen' + i + '">' +
            ' </div>' +
            '<div id="DIVExpediente' + i + '" class="col-md-2">' +
            ' <label>Expediente/Legajo :</label>' +
            '<input id="Expediente' + i + '" class="form-control" type="text" placeholder="" name="ExpedienteLegajo' + i + '">' +
            ' </div>' +
            ' <div id="DIVFotografiaPieza' + i + '" class="col-md-2">' +
            '   <label>No. Fotografìa/Pieza :</label>' +
            '<input  id="FotografiaPieza' + i + '" class="form-control" type="text" placeholder="" name="FotografiaPieza' + i + '">' +
            '</div>' +
            ' <div id="DIVTema' + i + '" class="col-md-2">' +
            ' <label>Tema :</label>' +
            ' <input id="Tema' + i + '" class="form-control" type="text" placeholder="" name="Tema' + i + '">' +
            ' </div>' +
            '<div id="DIVMicrofoto' + i + '" class="col-md-2">' +
            '  <label>No. de Microfoto :</label>' +
            '<input id="Microfoto' + i + '" class="form-control" type="text" placeholder="" name="Microfoto' + i + '">' +
            '</div>' +
            '<div id="DIVEstado' + i + '" class="col-md-2">' +
            ' <label>Estado :</label>' +
            ' <input id="Estado' + i + '" class="form-control" type="text" placeholder="" name="Estado' + i + '">' +
            ' </div>' +
            '</div>' +
            '<br class="row filareferenciadinamica>');
        console.log(i);
    }

    if (i <= 12) {
        $('#numreferencias').val(i);
    }


    numeroreferencias = $("#numreferencias").val();

    //console.log(numeroreferencias);

    j = 0;
    if (idarea == 1) {
        for (j = 2; j <= numeroreferencias; j++) {
            $('#DIVFondoColeccionGrupo' + j).show();
            $('#DIVSeccionSerie' + j).show();
            $('#DIVCajaSobre' + j).show();
            $('#DIVVolumen' + j).show();
            $('#DIVExpediente' + j).show();
            $('#DIVFotografiaPieza' + j).hide();
            $('#DIVTema' + j).hide();
            $('#DIVMicrofoto' + j).hide();
            $('#DIVEstado' + j).hide();

        }


    } else if (idarea == 2) {
        for (j = 2; j <= numeroreferencias; j++) {
            $('#DIVFondoColeccionGrupo' + j).show();
            $('#DIVSeccionSerie' + j).show();
            $('#DIVCajaSobre' + j).show();
            $('#DIVVolumen' + j).hide();
            $('#DIVExpediente' + j).hide();
            $('#DIVFotografiaPieza' + j).show();
            $('#DIVTema' + j).show();
            $('#DIVMicrofoto' + j).hide();
            $('#DIVEstado' + j).hide();
        }


    } else if (idarea == 3) {
        for (j = 2; j <= numeroreferencias; j++) {
            $('#DIVFondoColeccionGrupo' + j).show();
            $('#DIVSeccionSerie' + j).show();
            $('#DIVCajaSobre' + j).hide();
            $('#DIVVolumen' + j).hide();
            $('#DIVExpediente' + j).hide();
            $('#DIVFotografiaPieza' + j).show();
            $('#DIVTema' + j).show();
            $('#DIVMicrofoto' + j).hide();
            $('#DIVEstado' + j).hide();
        }

    } else if (idarea == 4) {
        for (j = 2; j <= numeroreferencias; j++) {
            $('#DIVFondoColeccionGrupo' + j).show();
            $('#DIVSeccionSerie' + j).hide();
            $('#DIVCajaSobre' + j).hide();
            $('#DIVVolumen' + j).hide();
            $('#DIVExpediente' + j).hide();
            $('#DIVFotografiaPieza' + j).hide();
            $('#DIVTema' + j).hide();
            $('#DIVMicrofoto' + j).show();
            $('#DIVEstado' + j).show();
        }
    }






};


//Noinvestigador
//Nombre
//Paterno
//Correo
//selectarea
//fechadecitaID
//FondoColeccionGrupo
//SeccionSerie
//CajaSobre
//Volumen
//ExpedienteLegajo
//FotografiaPieza
//Microfoto
//Estado

///alertavalidacion
function validar() {



    /*EXPRESION REGULAR CORREO*/

    /*------>*/

    expresioncorreo = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])$/;

    /*EXPRESION REGULAR LETRAS*/

    /*------>*/


    expresionletras = /^(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\-_,.´'/#\0-9]\s*)+(\s*)+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\-_,.´'/#\0-9]\s*)+(\s*)+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1\-_,.´'/#\0-9]\s*)+(\s*)+$/;

    /*EXPRESGN REGULAR CODIGO POSTAL*/

    /*------>*/

    expresioncodigopostal = /^(\s*\d{4,5})$/;

    expresionnumeros = /^([0-9])*$/;

    expressionfondo = /^[0-9a-zA-Z,]+$/;


    var Noinvestigador = document.getElementById("Noinvestigador").value;




    if (!expresionnumeros.test(Noinvestigador) && !Noinvestigador.length == 0) {
        $('#alertavalidacion').show();
        error = "Para el Campo No. investigador solo deben ser numeros.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    }

    var nombre = document.getElementById("Nombre").value;



    if (nombre.length == 0) {
        $('#alertavalidacion').show();
        error = "El campo Nombre no debe estar vacío.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (nombre.length < 1) {
        $('#alertavalidacion').show();
        error = " El campo Nombre no debe tener menos de 1 caracter.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (nombre.length > 50) {
        $('#alertavalidacion').show();
        error = "El campo Nombre no debe tener más de 50 caracteres.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    }
    var Paterno = document.getElementById("Paterno").value;

    if (Paterno.length == 0) {
        $('#alertavalidacion').show();
        error = " El campo Apellido Paterno no debe estar vacío.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (Paterno.length < 1) {
        $('#alertavalidacion').show();
        error = " El campo Apellido Paterno no debe tener menos de 1 caracter.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (Paterno.length > 50) {
        $('#alertavalidacion').show();
        error = "El campo Apellido Paterno no debe tener más de 50 caracteres.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    }


    var correoelectronico = document.getElementById("Correo").value;

    if (correoelectronico.length == 0) {

        $('#alertavalidacion').show();
        error = "El campo correo eletrónico no debe estar vacío.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (correoelectronico.length < 1) {
        $('#alertavalidacion').show();
        error = " El campo correo eletrónico  no debe tener menos de 1 caracteres.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (correoelectronico.length > 50) {
        $('#alertavalidacion').show();
        error = " El campo correo eletrónico no debe tener más de 50 caracteres.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (!expresioncorreo.test(correoelectronico)) {
        $('#alertavalidacion').show();
        error = "La información ingresada en el campo correo eletrónico  no cumple con el formato requerido. Favor de escribir correctamente el correo electrónico.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    }


    var selectarea = document.getElementById("selectarea").value;

    console.log(selectarea);



    /**CONDICIONALES PARA LOS DIFERENTES SELECT? QUE SE ENCUENTRAN DENTRO DEL FORMULARIO**/

    if (selectarea == "") {
        $('#alertavalidacion').show();
        error = "Por favor Seleccione el Ärea que va a visitar";

        document.getElementById("ListaErrores").innerHTML = error;



        return false;

    }

    var fecha = document.getElementById("fechadecitaID").value;

    if (fecha.length == 0) {
        $('#alertavalidacion').show();
        error = "Por favor seleccione una fecha en el calendario";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    }
    var selecthorario = document.getElementById("selecthorario").value;

    console.log(selectarea);



    /**CONDICIONALES PARA LOS DIFERENTES SELECT? QUE SE ENCUENTRAN DENTRO DEL FORMULARIO**/

    if (selecthorario == "") {
        $('#alertavalidacion').show();
        error = "Por favor Seleccione el Horario disponible";

        document.getElementById("ListaErrores").innerHTML = error;



        return false;

    }

    var FondoColeccionGrupo1 = document.getElementById("FondoColeccionGrupo1").value;
    console.log(FondoColeccionGrupo1);
    if (FondoColeccionGrupo1.length == 0) {
        $('#alertavalidacion').show();
        error = "El campo Fondo/Coleccion/Grupo no debe estar vacío";
        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (FondoColeccionGrupo1.length < 1) {
        $('#alertavalidacion').show();
        error = "El campo Fondo/Coleccion/Grupo no debe tener menos de 1 caracter.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (FondoColeccionGrupo1.length > 50) {
        $('#alertavalidacion').show();
        error = "El campo Fondo/Coleccion/Grupo no debe tener más de 50 caracteres.";

        document.getElementById("ListaErrores").innerHTML = error;

        return false;

    } else if (!expressionfondo.test(FondoColeccionGrupo1)) {
        $('#alertavalidacion').show();
        error = " El formato para Fondo/Coleccion/Grupo no es el adecuado. Para mas de un fondo separe por una coma sin espacios ejemplo: 2020,5050";

        document.getElementById("ListaErrores").innerHTML = error;
        return false;
    }
    document.getElementById("Confirmarboton").disabled = true;
    $('#idcargando').show();

}