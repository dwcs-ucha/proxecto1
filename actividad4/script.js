function seleccionarAcierto(elemento) {
    if (estaSeleccionado(elemento)) {
        elemento.style.borderColor = "black";
        document.getElementById("aciertos").value--;
    } else {
        elemento.style.borderColor = "green";
        document.getElementById("aciertos").value++;
    }
}
function seleccionar(elemento) {
    if (estaSeleccionado(elemento)) {
        elemento.style.borderColor = "black";
    } else {
        elemento.style.borderColor = "green";
    }
}
function estaSeleccionado(elemento) {
    if (elemento.style.borderColor == "green") {
        return true;
    } else {
        return false;
    }
}