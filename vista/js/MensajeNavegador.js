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
                text: "¡Espere!. ¡Si se tiene que mover de su puesto de trabajo cierre sesión o bloqueé la computadora para mayor seguridad!",
                icon: "warning",
                timer: 5000,
                closeOnClickOutside: false,
                button: false,
                closeOnEsc: true,
            });
        }
    });
});