{*
* @version 1.1
* @data 07/03/2020
* @descripción Index principal do sitio web.
*}
<!doctype html>
<html lang="gl">
    <head>
        {*Inclúense sentenzas do <head> comúns a tódalas páxinas do sitio:*}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        {include file="{$rutaRootPHP}{'Vista/layout/head.tpl'}"}
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
            Xogoteca | Inicio
        </title>
    </head>

    <body>
    <wrapper class="d-flex flex-column">
        {include file="{$rutaRootPHP}{'Vista/layout/cabeceira.tpl'}"}
        <main class="container">
            <h2>XogotecA</h2>
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
            <img src="{$rutaRootHTML}{'Vista/imaxes/nenos.jpg'}" alt="Globo con cara feliz" class="imaxe" />
        </main>
    </wrapper>
    {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
</body>
</html>