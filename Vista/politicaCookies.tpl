<!doctype html>
<html lang="gl">
    <head>
        <title>
            Política de cookies
        </title>
        {*Inclúense sentenzas do <head> comúns a tódalas páxinas do sitio:*}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
        <script type="text/javascript" src=""></script>
        <style>
            p, ul, h1, h2 {
                margin: 10px 5%;
            }
            h1, h2 {
                text-align: left;
            }
        </style>
    </head>
    <body>
    <wrapper class="d-flex flex-column">
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <h1>Politica de cookies de Xogoteca</h1>
        <p>
            Xogoteca usa cookies que permiten configurar o sitio web ao gusto do usuario.
        </p>
        <h2>Que son as cookies?</h2>
        <p>
            Unha cookie é un arquivo que se descarga no teu ordenador ou equipo ao acceder a determinadas páxinas web. As cookies
            permiten a unha páxina web, entre outras cousas, almacenar e recuperar información sobre os hábitos de navegación do usuario
            ou do seu equipo e, dependendo da información que conteñan e da forma en que utilice teu equipo, poden utilizarse
            para recoñecer ao usuario.
        </p>
        <h2>Que tipo de cookies utiliza Xogoteca?</h2>
        <p>
            Cookies de personalización: Son aquelas que permiten ao usuario acceder ao servizo con algunhas características de
            carácter xeral predefinidas en función de unha serie de criterios no terminal del usuario como por exemplo
            serian o idioma ou o tipo de navegador a través do cal se conecta ao servizo.
        </p>
        <h2>Desactivar as cookies</h2>
        <p>
            As cookies de Xogoteca son creadas e xestionadas desde a páxina de <a href="{$rutaRootHTML}{'Controlador/preferencias.php'}">
                preferencias</a>. En caso de querer deshabilitalas por completo aquí hai algunhas opcións:
        </p>
        <ul>
            <li><a href="https://support.google.com/chrome/answer/95647?hl=es">Configurar cookies en Google Chrome</a></li>
            <li><a href="Configurar%20cookies%20en%20Microsoft%20Internet%20Explorer">Configurar cookies en Microsoft Internet Explorer</a></li>
            <li><a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias?redirectlocale=es&amp;redirectslug=habilitar-y-deshabilitar-cookies-que-los-sitios-we">Configurar cookies en MozillaFirefox</a></li>
            <li><a href="https://support.apple.com/es-es/HT201265">Configurar cookies en Safari (Apple)</a></li>
        </ul>
    </wrapper>
    {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
</body>
</html>
