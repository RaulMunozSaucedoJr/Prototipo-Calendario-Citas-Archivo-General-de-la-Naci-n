$(document).ready(function () {
    $('#submit').click(function () {
        $.ajax({
            url: "/Configuracion_PHPMailer.php",
            method: "POST",
            data: $('#formulario').serialize()
        })
    });
});