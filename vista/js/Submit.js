$(document).ready(function () {
    $('#submit').click(function () {
        $.ajax({
            url: "/AccionesRecepcion/Submit.php",
            method: "POST",
            data: $('#formulario').serialize()
        })
    });
});