function seleccionar(elemento) {
    var id = elemento.getAttribute("id");
    var numeroId = id.substring(id.indexOf("-") + 1, id.length);
    var idOculto = "enviada" + numeroId;
    var rutaImagen = elemento.getAttribute("src");
    if (estaSeleccionado(elemento)) {
        elemento.style.borderColor = "black";
        document.getElementById(idOculto).value = rutaImagen + "-n";
    } else {
        elemento.style.borderColor = "green";
        document.getElementById(idOculto).value = rutaImagen + "-s";
    }
   // alert(document.getElementById(idOculto).value);
}
function estaSeleccionado(elemento) {
    if (elemento.style.borderColor == "green") {
        return true;
    } else {
        return false;
    }
}