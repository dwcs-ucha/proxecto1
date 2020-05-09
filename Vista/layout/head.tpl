{*
* @versión 1.1
* @data 07/03/2020
* @descripción Elementos HTML a engadir na etiqueta "<head>" dos distintos arquivos do sitio web.
*}
<meta charset = "UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Coiny&display=swap" rel="stylesheet">
<meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Xogos e actividades para nenos e nenas con trastornos do espectro autista (TEA) e outros problemas psicosociais">
<meta name="author" content="Alumnos e alumnos do módulo de DWCS do Ciclo Superior de Desenvolvemento de aplicacións web, no CIFP Rodolfo Ucha Piñeiro">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
<script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{$rutaRootHTML}Vista/estilos/estilos.css" type="text/css">
{if isset($smarty.cookies.temaOscuro)}
<link rel="stylesheet" href="{$rutaRootHTML}Vista/estilos/temaOscuro.css" type="text/css">
{/if}