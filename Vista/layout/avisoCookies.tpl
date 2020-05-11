<script>
    function ocultarAvisoCookies() {
        var elemento = document.getElementById("avisoCookies");
        elemento.setAttribute("style", "display: none");
    }
</script>
<div id='avisoCookies' class="avisoCookies fixed-bottom">
    <p>En Xogoteca facemos uso de Cookies. Seguir navegando polo sitio web implica que aceptas o seu uso.
        Podes ver a nosa <a href="{$rutaRootHTML}{'Controlador/politicaCookies.php'}">política de cookies aquí.</a></p>
    <button onclick="ocultarAvisoCookies()">Entendido</button>
</div>
