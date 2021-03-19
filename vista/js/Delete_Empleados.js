$('#delete').click(function () {
    const id = document.getElementById("id");
    $.ajax({
        url: "/AccionesEmpleados/ConexionTablaEmpleados.php",
        type: "GET",
        data: {
            id: id
        }
    })
});