<?php
//03/12/2019 | Versión 1.2
//PROPOSTA DUNHA ESTRUTURA PARA A CABECEIRA DO SITIO CON BootStrap 4.
?>
<nav class="navbar sticky-top container-fluid navbar-expand-sm bg-primary navbar-dark cabeceira">
    <a id="logo-xogoteca" class="navbar-brand" href="<?php echo $directorioRaiz; ?>/index.php"><img src="<?php echo $directorioRaiz; ?>/Vista/imaxes/logo2.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent,#navbarSupportedContent2,#navbarSupportedContent3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con palabras
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade1">Completar sílabas ou palabras</a>
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade15">O xogo das pistas</a>
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade8">Preguntas de estimulación</a>
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade3">Que é? Para que serve? Como se utiliza?</a>
			<a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade10">Sinónimos e antónimos</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent2">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos con imaxes
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade11/proxecto11_index.php">Emparellar</a>
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividad9">Ordenar secuencias temporais</a>
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade4">Ordenar obxetos por categoría</a>
            			<a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade12">Estados de animo</a>
        </div>
    </div>
    <div class="collapse navbar-collapse dropdown" id="navbarSupportedContent3">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xogos varios
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade6">Caderno de sumas</a>
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividade10">Sinónimos e antónimos</a>
            <a class="dropdown-item" href="<?php echo $directorioRaiz;?>/actividades/actividad5">Son visual</a>
        </div>
    </div>
</nav>

