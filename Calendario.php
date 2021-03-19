<?php 
require_once("AccionesRecepcion\LoadRecepcion.php")
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
        maximum-scale=3.0, minimum-scale=1.0, user-scalable=yes, shrink-to-fit=no viewport-fit=cover">

    <!-- NO BORRAR, NO QUITAR, NO MODIFICAR NI MOVER DE LUGAR NINGUNO DE ESTOS SCRIPT´S -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/moment.min.js"></script>

    <!-- NO BORRAR, NO QUITAR, NO MODIFICAR NI MOVER DE LUGAR NINGUNO DE ESTOS SCRIPT´S FULL CALENDAR -->
    <link rel="stylesheet" href="/css/fullcalendar.min.css">
    <script src="/js/fullcalendar.min.js"></script>
    <script src="/js/es.js"></script>
    <script src="/vista/js/FullCalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!------------------->
    <!-- HOJA DE ESTILO PERSONALIZADA PARA FULL CALENDAR -->
    <link rel="stylesheet" href="/vista/css/FullCalendarPersonalizado.css">
    <link rel="stylesheet" href="/vista/css/materialize.min.css">
    <!----------------------------------------------------->
    <!--CLOCK PICKER -->
    <script src="/clockpicker-gh-pages/dist/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" href="/clockpicker-gh-pages/dist/bootstrap-clockpicker.css">
    <!----------------->
    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!----------------->
    <!-- REDES SOCIALES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-------------------->
    <!-- MATERIALIZE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <!----------------->
    <!-- SCRIPT PARA REALIZAR SUBMIT DEL FORMULARIO QUE SE ENCUENTRA A UN COSTADO DEL CALENDARIO -->
    <script src="/vista/js/Submit.js"></script>
    <!--------------------------------------------------------------------------------------------->
    <!-- ENVIAR CORREO A PARTIR DEL FORMULARIO -->
    <script src="/vista/js/EnviarCorreo.js"></script>
    <!------------------------------------------->
    <!-- Bloqueador de Addblock -->
    <script src="/vista/js/blockadblock.js"></script>
    <script src="/vista/js/adblockDetected.js"></script>
    <!---------------------------->

    <link rel="shortcut icon" href="#" />

    <!-- SCRIPT PARA ABRIR MODAL AUTOMATICAMENTE -->
    <!--<script>
    $(document).ready(function() {
        /** ABRE EL MODAL AUTOMATICAMENTE AL INGRESAR A LA PAGINA **/
        $("#modal_automatico").modal('show')
        /** DETIENE LA REPRODUCCIÓN DEL VIDEO AL CERRAR EL MODAL **/
        $("#modal_automatico").on('hidden.bs.modal', function(e) {
            $("#modal_automatico iframe").attr("src", $("#modal_automatico iframe").attr("src"));
        });
    });
    </script>-->
    <!--------------------------------------------->

</head>

<body>

    <!--BANNER DE GOBIERNO DE MÉXICO & ARCHIVO GENERAL DE LA NACIÓN -->
    <img src="/vista/img/fondoGuiaCompleto.jpg" class="img-fluid sticky-top" alt="Gobierno de México">
    <!---------------------------------------------------------------->

    <div class="container-fluid mtp">

        <div class="row">

            <!------------ MENSAJES SOBRE EL CALENDARIO Y SUS OPCIONES -------------->
            <div class="col-sm-11 col-md-11 col-lg-5 col-xl-5 area left" id="calendarios">
                <div class="row">
                    <!--<div class="col-sm-12 col-md-6 col-lg-6 col-xl-12 alert alert-success" role="alert">
                        <label>Dias Disponibles.</label>
                    </div>-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 alert alert-custom" role="alert">
                        <label>Dias pasados.</label>
                    </div>

                    <!-- DIV que contiene el calendario ----------->
                    <!------ NO MODIFICAR NO QUITAR NO MOVER ------>
                    <div id="calendar">
                    </div>
                    <!--------------------------------------------->
                    <!--------------------------------------------->
                </div>
            </div>
            <!---------------------------------- onSubmit="return ValidacionFormulario()"------------------------------------->

            <!-- CAMPOS DE INFORMACIÓN DEL SOLICITANTE -->
            <div class="col-sm-11 col-md-11 col-lg-5 col-xl-5 area right" id="calendarios">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 referncias">
                        <form method="post" id="formulario" name="formulario">
                            <div class="row">

                                <!-- Mensaje sobre campos OBLIGATORIOS -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="alert alert-warning" role="alert">
                                        <a class="alert-link">
                                            Los campos marcados con un <b id="red">*</b> son <b
                                                id="red">OBLIGATORIOS</b>
                                        </a>
                                    </div>
                                </div>

                                <!-- NOMBRE DEL VISITANTE -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                    <label class="control-label"><b id="red">*</b>Nombre(s)</label>
                                    <input class="form-control" type="text" name="nombre" id="nombre"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Nombre ó nombres de el investigador." onfocusout="validarNombre()">
                                    <span class="helper-text"></span>
                                </div>

                                <!-- APELLIDO PATERNO DEL VISITANTE -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Apellido Paterno</label>
                                    <input class="form-control" type="text" name="apellido_paterno"
                                        id="apellido_paterno" data-toggle="tooltip" data-placement="top"
                                        title="Apellido Paterno de el investigador"
                                        onfocusout="validarApellidoPaterno()">
                                    <span class="helper-text"></span>
                                </div>

                                <!-- APELLIDO MATERNO DEL VISITANTE -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Apellido Materno</label>
                                    <input class="form-control" type="text" name="apellido_materno"
                                        id="apellido_materno" data-toggle="tooltip" data-placement="top"
                                        title="Apellido Materno de el investigador"
                                        onfocusout="validarApellidoMaterno()">
                                    <span class="helper-text"></span>
                                </div>

                                <!-- NUMERO DE INVESTIGADOR -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>No. Investigador</label>
                                    <input class="form-control" type="text" name="numero_investigador"
                                        id="numero_investigador" data-toggle="tooltip" data-placement="top"
                                        title="Aquí va su numero de investigador asignado previamente"
                                        onfocusout="validarNumeroInvestigador()">
                                    <span class="helper-text"></span>
                                </div>

                                <!-- INSTITUCIÓN -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Institución</label>
                                    <input class="form-control" type="text" name="institucion" id="institucion"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Institución publica y/o privada" onfocusout="validarInstitucion()">
                                    <span class="helper-text"></span>
                                </div>


                                <!-- NOMBRE DEL EVENTO / CITA -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                    <label class="control-label"><b id="red">*</b>Motivo de cita</label>
                                    <select name="motivo" class="custom-select custom-select-md" data-toggle="tooltip"
                                        data-placement="top" title="Seleccion un Area ó Departamento">
                                        <option value="">Seleccione un Motivo de Cita</option>
                                        <?php foreach ($areas as $area): ?>
                                        <option value="<?=$area['nombre_area']?>">
                                            <?=$area['nombre_area']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- HORA DE ENTRADA -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Hora Entrada</label>
                                    <div class="input-group clockpicker text-center" data-autoclose="true">
                                        <input type="text" id="hora_entrada" name="hora_entrada" class="form-control"
                                            readonly="" data-toggle="tooltip" data-placement="bottom"
                                            title="Formato de Reloj: 24hrs">
                                        <span class="helper-text"></span>
                                    </div>
                                </div>

                                <!-- HORA DE SALIDA -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Hora Salida</label>
                                    <div class="input-group clockpicker text-center" data-autoclose="true">
                                        <input type="text" id="hora_salida" name="hora_salida" class="form-control"
                                            readonly="" data-toggle="tooltip" data-placement="bottom"
                                            title="Formato de Reloj: 24hrs">
                                        <span class="helper-text"></span>
                                    </div>
                                </div>
                                <!------------------>

                                <!-- FONDO | COLECCION -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Fondo|Colección
                                    </label>
                                    <input class="form-control" type="text" id="coleccion" name="coleccion"
                                        data-toggle="tooltip" data-placement="top" title="Nombre de: Fondo ó Colección"
                                        onfocusout="validarFondoColeccion()">
                                    <span class="helper-text"></span>
                                </div>
                                <!-- SECCION | SERIE -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Sección|Serie</label>
                                    <input class="form-control" type="text" id="serie" name="serie"
                                        data-toggle="tooltip" data-placement="top" title="Nombre de: Sección ó Serie"
                                        onfocusout="validarSeccionSerie()">
                                    <span class="helper-text"></span>
                                </div>
                                <!-- CAJA | SOBRE | EXPEDIENTE -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Caja|Sobre|Expediente</label>
                                    <input class="form-control" type="text" id="caja" name="caja" data-toggle="tooltip"
                                        data-placement="top" title="Nombre de: Caja ó Sobre ó Expediente"
                                        onfocusout="validarCajaSobreExpediente()">
                                    <span class="helper-text"></span>
                                </div>
                                <!-- NO. FOTOGRAFIA | NO. PIEZA -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Fotografía & Pieza</label>
                                    <input class="form-control" type="text" id="pieza" name="pieza"
                                        data-toggle="tooltip" data-placement="top" title="Numero de: Fotografía o Pieza"
                                        onfocusout="validarFotografiaPieza()">
                                    <span class="helper-text"></span>
                                </div>
                                <!-- TEMA -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Tema</label>
                                    <input class="form-control" type="text" id="tema" name="tema" data-toggle="tooltip"
                                        data-placement="top" title="Nombre del tema." onfocusout="validarTema()">
                                    <span class="helper-text"></span>
                                </div>
                                <!-- CORREO ELECTRONICO DEL VISITANTE -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                    <label class="control-label"><b id="red">*</b>Correo Electrónico</label>
                                    <input class="form-control" type="text" name="correo" id="correo"
                                        data-toggle="tooltip" data-placement="top" title="Ejemplo:rjumsagn@gmail.com"
                                        onfocusout="validarCorreo()">
                                    <span class="helper-text"></span>
                                </div>

                                <!-- ACCIONES DE BOTONES: REGISTRAR | LIMPIAR -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mpt">
                                    <button type="submit" id="submit" class="btn btn-outline-light btn-block">
                                        Registrar
                                    </button>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mpt">
                                    <button type="reset" id="resetBtn" class="btn btn btn-outline-light btn-block">
                                        Limpiar
                                    </button>
                                </div>
                                <!----------------------------------------------->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!------------------------------------------->


            <!--Botones flotantes de Redes Sociales -->
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <div class="icon-bar fixed">
                    <a href="https://www.facebook.com/ArchivoGeneraldelaNacion/" class="facebook"><i
                            class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/AGNMex" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.youtube.com/user/AGNmx2011/" class="youtube"><i class="fa fa-youtube"></i></a>
                    <a id="button">
                        <i class="fa fa-arrow-up text-white" data-toggle="tooltip" data-placement="bottom"
                            title="Regresar al inicio de la pagina." id="button" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <!---------------------------------------->

        </div>

    </div>

    <!-------- FOOTER -------->
    <!--<footer class="page-footer gmx-465 text-center sticky-bottom">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid footer-copyright text-center py-3"><a class="text-white">© 2020
                    Copyright:</a><br>
                <a href="https://www.gob.mx/agn" class=" footer-link text-white"> Archivo General de la Nación - AGN
                </a>
            </div>
        </div>
    </footer>-->
    <!------------------------>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- VALIDACION DEL FORMULARIO -->
<script src="/vista/js/ValidacionFormulario.js"></script>
<!------------------------------->

<script>
var btn = $('#button');
$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});
btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, '300');
});
</script>

<!-- CLOCKPICKER -->
<script>
$('.clockpicker').clockpicker({
    align: 'bottom',
    placement: 'top',
    vibrate: 'true'
});
</script>

<!--<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>-->

</html>