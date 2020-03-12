<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-12 18:57:31
  from '/var/www/html/proxecto/proxecto1/Vista/layout/pe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6a780b290972_96269971',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c59cee84c5d8176eda696e1c78ba35166d2121f' => 
    array (
      0 => '/var/www/html/proxecto/proxecto1/Vista/layout/pe.tpl',
      1 => 1583865966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6a780b290972_96269971 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Aviso sobre política de cookies -->
<?php if (isset($_smarty_tpl->tpl_vars['mostrarAvisoCookies']->value)) {
ob_start();
echo 'Vista/layout/avisoCookies.tpl';
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['rutaRootPHP']->value).$_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
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
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
><?php }
}
