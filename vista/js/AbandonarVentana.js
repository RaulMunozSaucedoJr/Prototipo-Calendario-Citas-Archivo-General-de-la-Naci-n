function addEvent(obj, evt, fn) {
    if (obj.addEventListener) {
        obj.addEventListener(evt, fn, false);
    } else if (obj.attachEvent) {
        obj.attachEvent("on" + evt, fn);
    }
}
addEvent(window, "load", function (e) {
    addEvent(document, "mouseout", function (e) {
        e = e ? e : window.event;
        var from = e.relatedTarget || e.toElement;
        if (!from || from.nodeName == "HTML") {
            swal({
                title: "¡Espere!.",
                text: "¡¿Ya no desea realizar la cita con nosotros?!",
                icon: "warning",
                timer: 2500,
                closeOnClickOutside: true,
                button: false,
                closeOnEsc: true,
            });
        }
    });
});