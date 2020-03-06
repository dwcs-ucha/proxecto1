{*
// BreoBeceiro:25/11/2019
// PROXECTO 1º AVALIACIÓN | Versión 1.0
// Páxina de Inicio PROVISIONAL para o sitio web do Proxecto da 1ª Avaliación do módulo de 'Desenvolvemento web 
//   en contorno servidor'.
*}
<!doctype html>
<html lang="gl">
    <head>
        {*Inclúense sentenzas do <head> comúns a tódalas páxinas do sitio:*}
        {assign var=directorioRaiz value="."}
        {include file="{$rutaRootPHP}{'/Vista/layout/head.tpl'}"}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script type="text/javascript" src=""></script>
        <style type="text/css">

            h2 { text-align: center;
                 margin-top: 10px; }

            .container p { margin: 5px 1px; }

            .imaxe { display: block;
                     width: 30%;
                     margin: auto; }

        </style>
        <title>
            Proxecto1 | Inicio
        </title>
    </head>

    <body>
    <wrapper class="d-flex flex-column">
        {include file="{$rutaRootPHP}{'/Vista/layout/cabeceira.tpl'}"}
        <main class="container">

            <h2>Proxecto 1ª AvAliAciOn</h2>
            <p>
                Benvid@s ao sitio web de xogos e actividades para nenos e nenas con trastornos do espectro autista (TEA) e outros
                problemas psicosociais.
                <br /><br />
                Este sitio foi desenvolvido polos alumn@s do módulo de <strong>'Desenvolvemento web en contorno servidor'</strong> 
                pertencente ao segundo curso do FP Superior en 'Desenvolvemento de Aplicacións Web', no CIFP Rodolfo Ucha Piñeiro,
                como parte da materia do propio módulo.
                <br /><br />
                Tódolos alumnos do módulo esperamos que disfrutedes moito coas nosas actividades, así que non esperedes máis e 
                comezade xa cos xogos!
            </p>

            <br />
            <img src="http://{$rutaRootHTML}{'/Vista/imaxes/nenos.jpg'}" alt="Globo con cara feliz" class="imaxe" />
            {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}

        </main>
    </wrapper>
</body>
