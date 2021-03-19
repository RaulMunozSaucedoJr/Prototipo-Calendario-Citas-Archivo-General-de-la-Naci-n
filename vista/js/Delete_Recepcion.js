$('#delete').click(function () {
    const id = document.getElementById("id");
    $.ajax({
        url: "/AccionesRecepcion/ConexionTabla.php",
        type: "GET",
        data: {
            id: id
        }
    })
});