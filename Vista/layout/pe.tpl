{*
* @autor Manuel Ángel Calvo Piñeiro
* @versión 1.1
* @data 07/03/2020
* @descripción Elementos HTML a engadir no pé da páxina nos distintos arquivos do sitio web.
*}

<!-- Aviso sobre política de cookies -->
{if isset($mostrarAvisoCookies)}
{include file="{$rutaRootPHP}{'Vista/layout/avisoCookies.tpl'}"}
{/if}
<!-- Footer -->
<footer class="footer container-fluid">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3"> 
        Esta obra está baixo unha <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" class="copyright-link">licencia de Creative Commons Reconocimiento-NoComercial-CompartirIgual 4.0 Internacional</a>
        <br />
        <a href="{$rutaRootHTML}Controlador/PoliticaCookies.php" target="_blank" class="copyright-link">Política de Cookies</a>
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