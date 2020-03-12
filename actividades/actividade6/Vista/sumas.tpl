<!doctype html>
<html lang="gl">
    <head>
        {include file="../../../Vista/layout/head.tpl"}
        <style>
	.xogo {	margin-left: 40%;
		vertical-align: center;	}
	.error { color: red;}	
	</style>
	<title>Caderno de Sumas</title> 
</head>
<body>
    {include "../../../Vista/layout/cabeceira.tpl"}
    <h2>Dificultade : {$dif}</h2>
	<div class="xogo">	
      <form action="sumas.php" method="post">   
	{foreach from=$partida item=suma}
        <label>{$suma->numa}</label> + <label>{$suma->numb}</label>
        = <input type="text" id="res" name="res[]" size="4">            
        <br>
       {/foreach}
       <span class="error">{if ($errorcampos)}Erro na introdución dos resultados, 
           teñen que ser numeros e estar todos cubertos{/if}
       </span><br>
       <br><input type="submit" id="finalizar" name="finalizar" value="Finalizar">         
     </form>
</div>
   <div class='xogo'>
     <form action="../index.php" method="post">
         <br><input type="submit" id="volver" name="volver" value="Volver ó inicio">
     </form>
</div>
     {include "../../../Vista/layout/pe.php"}
</body>
</html>