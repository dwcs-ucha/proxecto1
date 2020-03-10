{*
* @autor Manuel Ángel Calvo Piñeiro
* @versión 1.1
* @data 07/03/2020
* @descripción Elementos HTML a engadir no pé da páxina nos distintos arquivos do sitio web.
*}
<!-- Footer -->
<footer class="footer container-fluid">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3"> 
        Esta obra está baixo unha <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" class="copyright-link">licencia de Creative Commons Reconocimiento-NoComercial-CompartirIgual 4.0 Internacional</a>
        <br />
        <span class="copyright"> © 2019 Copyright: </span><a href="https://www.cifprodolfoucha.es/" target="_blank" class="copyright-link" title="Centro educativo"> C.I.F.P. Rodolfo Ucha Piñeiro </a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
<script>
    $(function () {
        (function ($) {
            var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;

            $.fn.attrchange = function (callback) {
                if (MutationObserver) {
                    var options = {
                        subtree: false,
                        attributes: true
                    };

                    var observer = new MutationObserver(function (mutations) {
                        mutations.forEach(function (e) {
                            callback.call(e.target, e.attributeName);
                        });
                    });

                    return this.each(function () {
                        observer.observe(this, options);
                    });

                }
            }
        })(jQuery);

//"Listeners" para detectar cambios nos atributos
        var navegacion = ["navbarSupportedContent", "navbarSupportedContent2", "navbarSupportedContent3"];
        $('body *').attrchange(function (attrName) {
            for (let x in navegacion) {
                $('#' + navegacion[x]).attrchange(function (attrName) {
                    if (attrName == 'class') {
                        //Quérese evitar que o menú despregable desapareza nos dispositivos móbiles. 
                        //Bootstrap elimina a clase "show" e é desta maneira que desaparece.
                        if (($('#' + navegacion[x]).hasClass("show") == false) && ($('button.navbar-toggler').hasClass('collapsed') == false)) {
                            $('#' + navegacion[x]).addClass("show");
                        }
                    } else {
                        //En caso de que outro atributo cambiase...
                    }

                });
            }
        });
    });
</script>