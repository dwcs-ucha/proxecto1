<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-06 01:56:01
  from 'D:\xampp\proxecto\Vista\layout\head.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e619fa1922587_48988570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b196f3ee1a0ec7f42bf82b3608d9c6c97bb80d02' => 
    array (
      0 => 'D:\\xampp\\proxecto\\Vista\\layout\\head.php',
      1 => 1583454290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e619fa1922587_48988570 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
// 21/11/2019 | Versión 1.0
// Estrutura do <head> a engadir en cada páxina do sitio.
// Esta estrutura proporciona o xogo de caracteres UTF-8 e a composición da escala dos navegadores para dispositivos móbiles, así 
//   como a biblioteca de BootStrap e o enlace á folla de estilos do sitio.
// O cometido desta páxina é incluírse no interior das etiquetas <head> de cada páxina para aforrar traballo, xa que as seguintes
//   liñas serán comúns a todas elas. Logo de engadirse este arquivo, cada participante poderá engadir a súa propia folla CSS, así
//   como ficheiros JS coa etiqueta <?php echo '<script'; ?>
> e, naturalmente, o título da páxina con <title>.
$directorioRaiz = isset($directorioRaiz) ? $directorioRaiz : "../..";
<?php echo '?>';?>

<meta charset = "UTF-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Xogos e actividades para nenos e nenas con trastornos do espectro autista (TEA) e outros problemas psicosociais">
<meta name="author" content="Alumnos e alumnos do módulo de DWCS do Ciclo Superior de Desenvolvemento de aplicacións web, no CIFP Rodolfo Ucha Piñeiro">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
<?php echo '<script'; ?>
 src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo '<?=';?>
 $directorioRaiz <?php echo '?>';?>
/Vista/estilos/estilos.css" type="text/css">
<?php }
}
