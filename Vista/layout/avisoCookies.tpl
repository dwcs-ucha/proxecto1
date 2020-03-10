<script>
    function ocultarAvisoCookies() {
        var elemento = document.getElementById("avisoCookies");
        elemento.setAttribute("style", "display: none");
    }
</script>
<div id='avisoCookies' class="avisoCookies fixed-bottom">
    <p>En Xogoteca facemos uso de Cookies. Podes ver a nosa <a href="{$rutaRootHTML}{'Controlador/politicaCookies.php'}">política de cookies aquí.</a></p>
    <button onclick="ocultarAvisoCookies()">Entendido</button>
</div>
