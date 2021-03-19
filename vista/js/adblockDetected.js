function adblockDetected() {
    swal({
        title: "¡AD-BLOCK DETECTADO!.",
        text: "¡Para un correcto uso de esta pagina, favor de desactivar ADBLOCK mientras se encuentra navegando en el sitio!.",
        icon: "error",
        timer: 100000,
        closeOnClickOutside: false,
        button: false,
        closeOnEsc: false,
    });
}
if (typeof blockAdBlock === "undefined") {
    adblockDetected();
} else {
    blockAdBlock.onDetected(adblockDetected);
}