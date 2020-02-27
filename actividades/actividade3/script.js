/*
 *Título:¿Que é? ¿para que serve? ¿para que se utiliza?  
 *Autor: Manuel Ángel Calvo Piñeiro
 *Versión: 1.1
 *Modificado: 26/11/2019
*/

/*
 * Utilización de seleccionar(divId,selectId,option): 
 * divId -> id do div contenedor da pregunta
 * selectId -> id do select contenedor das opcións
 * option -> o elemento "option" enviado ao servidor
 *
 * divme = obxecto do div
 * selectme = obxecto do select
 * option = obxecto da opción enviada
*/
function seleccionar(divId, selectId, option){
    var divme = document.getElementById(divId);
    var selectme = document.getElementById(selectId);
    var pai = option.parentElement;
    
    for(x in selectme.childNodes){
        if(selectme.childNodes[x].nodeName == "OPTION"){
            if(selectme.childNodes[x].value == option.getAttribute("value")){
                if(option.className != "opcion seleccionado"){
                    var eliminar = pai.getElementsByClassName("opcion seleccionado");
                    if((eliminar.length) >= 1){
                            if(eliminar[0].attributes["value"].nodeValue != option.getAttribute("value")){
                                eliminar[0].classList.remove("seleccionado");
                                selectme.childNodes[x].selected = true;
                                option.className = "opcion seleccionado";
                            } else {
                                eliminar[0].classList.remove("seleccionado");
                            }
                        
                    } else {
                        selectme.childNodes[x].selected = true;
                        option.className="opcion seleccionado";
                    }
                } else {
                    eliminar2 = pai.getElementsByClassName("opcion seleccionado");
                    selectme.childNodes[x].selected = false;
                    selectme.childNodes[0].selected = true;
                    eliminar2[0].classList.remove("seleccionado")
                }
            }
        }
    }
}
