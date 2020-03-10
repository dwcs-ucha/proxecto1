{*
 * @versión 1.3
 * @data 07/03/2020
 * @descripción Cabeceira do sitio web.
*}
<nav class="navbar sticky-top container-fluid navbar-expand-lg bg-primary navbar-dark cabeceira">
    <a id="logo-xogoteca" class="navbar-brand" href="{$rutaRootHTML}index.php"><img src="{$rutaRootHTML}Vista/imaxes/logo2.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent,#navbarSupportedContent2,#navbarSupportedContent3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con palabras
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{$rutaRootHTML}actividades/actividade1">Completar sílabas ou palabras</a>
            <a class="dropdown-item" href="{$rutaRootHTML}actividades/actividade3">Que é? Para que serve? Como se utiliza?</a>
            <a class="dropdown-item" href="{$rutaRootHTML}actividades/actividade10">Sinónimos e antónimos</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent2">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con imaxes
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{$rutaRootHTML}actividades/actividade11/proxecto11_index.php">Emparellar</a>
            <a class="dropdown-item" href="{$rutaRootHTML}actividades/actividade4">Ordenar obxetos por categoría</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent3">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con números
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{$rutaRootHTML}actividades/actividade6">Caderno de sumas</a>
        </div>
    </div>
</nav>

