$(document).ready(function () {
    var calendar = $("#calendar").fullCalendar({
        /**
        FIJA LA ALTURA DEL CALENDARIO POR DEFAULT. 
        **/
        height: 800,
        /**
        HACE QUE SE PUEDA REALIZAR ACCIONES DENTRO DEL CALENDARIO. 
        **/
        editable: true,
        /**
         LA OPCION POR DEFAULT QUE MUESTRA EL CALENDARIO
         ES LA OPCION MES.
        **/
        defaultView: 'month',
        /**
          
        **/
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: true,
        weekends: false,
        nowIndicator: true,
        /**
        HEADER DEL CALENDARIO EN EL QUE SE MUESTRA
        EL MES, SEMANA Y DIA EN LA VISTA DE AGENDA. 
        **/
        header: {
            left: 'today,prev,next',
            center: 'title',
            right: 'month'
        },
        events: '/BD/load.php',
        /**
        DESHABILITA LOS BOTONES (PREV & NEXT) PARA LOS SIGUIENTES COMPONENTES:
        -MESES (PASADOS) Y MESES SEGUIDOS DEL DIA ACTUAL DEL CALENDARIO (2 MESES).
        -SEMANAS (PASADAS) Y SEMANAS SEGUIDAS DEL DIA ACTUAL DEL CALENDARIO (2 SEMANAS).
        **/
        viewRender: function (currentView) {
            var minDate = moment(),
                maxDate = moment().add(2, 'weeks');
            // Fechas pasadas (Dias)
            if (minDate >= currentView.start && minDate <= currentView.end) {
                $(".fc-prev-button").prop('disabled', true);
                $(".fc-prev-button").addClass('fc-state-disabled');
            } else {
                $(".fc-prev-button").removeClass('fc-state-disabled');
                $(".fc-prev-button").prop('disabled', false);
            }
            // Fechas Futuras (Dias)
            if (maxDate >= currentView.start && maxDate <= currentView.end) {
                $(".fc-next-button").prop('disabled', true);
                $(".fc-next-button").addClass('fc-state-disabled');
            } else {
                $(".fc-next-button").removeClass('fc-state-disabled');
                $(".fc-next-button").prop('disabled', false);
            }
            /***************************** MESES **************************************/
            var minDatemonth = moment(),
                maxDatemonth = moment().add(2, 'months');
            // Fechas pasadas (Meses)
            if (minDatemonth >= currentView.start && minDatemonth <= currentView.end) {
                $(".fc-prev-button").prop('disabled', true);
                $(".fc-prev-button").addClass('fc-state-disabled');
            } else {
                $(".fc-prev-button").removeClass('fc-state-disabled');
                $(".fc-prev-button").prop('disabled', false);
            }
            // Fechas futuras (Meses)
            if (maxDatemonth >= currentView.start && maxDatemonth <= currentView.end) {
                $(".fc-next-button").prop('disabled', true);
                $(".fc-next-button").addClass('fc-state-disabled');
            } else {
                $(".fc-next-button").removeClass('fc-state-disabled');
                $(".fc-next-button").prop('disabled', false);
            }
        },
        /**
        AL REALIZAR CLICK EN DIAS PASADOS Y EN EL ACTUAL(HOY/TODAY),
        NO PERMITE INGRESAR UN EVENTO EN ESE/ESOS DIA(S).
        **/
        selectable: true,
        selectAllow: function (selectInfo) {
            swal({
                title: "¡ATENCIÓN!",
                text: "¡NO se permite realizar citas en dias pasados al actual!.",
                icon: "error",
                timer: 2500,
                closeOnClickOutside: false,
                button: false,
            })
            return moment().diff(selectInfo.start) <= 0
        },
        /** 
        NO PERMITE ARRASTRAR EVENTOS A DIAS PASADOS DEL DIA ACTUAL
        **/
        eventConstraint: {
            start: moment().format('YYYY-MM-DD'),
            end: '2200-01-01'

        },
        /**
         REALIZA LA CONEXION A LA BD(AGENDA) Y A LA TABLA EVENTOS.
        **/
        events: '/Acciones/load.php',
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt("Ingrese la palabra CITA para agendar en el calendario.");

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: "/Acciones/insert.php",
                    type: "POST",
                    data: {
                        title: title,
                        start: start,
                        end: end
                    },
                    success: function () {
                        calendar.fullCalendar('refetchEvents');
                        swal({
                            text: "Cita añadida satisfactoriamente",
                            icon: "success",
                            timer: 2200,
                            closeOnClickOutside: false,
                            button: false,
                        });
                    }
                })
            }
        },
        /**
        REALIZA LA ACCIÓN DE ACTUALIZAR EL EVENTO AL REAJUSTAR
        SU TAMAÑO EN LA SECCIÓN SEMANA, DIA.
        **/
        editable: true,
        eventResize: function (event) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;

            $.ajax({
                url: "/Acciones/update.php",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id
                },
                success: function () {
                    calendar.fullCalendar('refetchEvents');
                    swal({
                        text: "¡Hora del evento actualizado!.",
                        icon: "success",
                        timer: 2200,
                        closeOnClickOutside: false,
                        button: false,
                    });
                }
            })
        },
        /** 
         REALIZA LA ACCION DE ACTUALIZAR EL EVENTO AL MOVERLO
         DEL DÍA EN EL QUE SE ENCUENTRA A OTRO DIA.
        **/
        eventDrop: function (event) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

            var title = event.title;
            var id = event.id;

            $.ajax({
                url: "/Acciones/update.php",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id
                },
                success: function () {
                    calendar.fullCalendar('refetchEvents');
                    swal({
                        text: "Dia del evento actualizado",
                        icon: "success",
                        timer: 2200,
                        closeOnClickOutside: false,
                        button: false,
                    });
                }
            });
        },
        /**
        REALIZA LA ACCIÓN DE ELIMINAR EL EVENTO AL REALIZAR CLICK 
        ENCIMA DE ESTE. 
        **/
        eventClick: function (event) {
            if (confirm("¿Esta seguro que desea eliminar este evento")) {
                var id = event.id;
                $.ajax({
                    url: "/Acciones/delete.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function () {
                        calendar.fullCalendar('refetchEvents');
                        swal({
                            text: "Cita eliminada satisfactoriamente.",
                            icon: "success",
                            timer: 2200,
                            closeOnClickOutside: false,
                            button: false,
                        });
                    }
                })
            }
        },
    });
});