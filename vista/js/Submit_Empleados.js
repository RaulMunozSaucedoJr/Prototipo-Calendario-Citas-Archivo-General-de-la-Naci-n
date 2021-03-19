$(document).ready(function () {
    $('#submit').click(function () {
        $.ajax({
            url: "/AccionesEmpleados/SubmitEmpleados.php",
            method: "POST",
            data: $('#formulario_empleados').serialize()
        })
    });
});