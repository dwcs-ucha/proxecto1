 <!DOCTYPE html>
 <html lang="gl">

 <head>
   <?php
   //Cargamos todos los links para utilizarlos en la página
     $directorioRaiz ="../..";
     include '../../layout/head.php';
   ?>
   <title>Xogando con sons</title>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/sonidos.css">
 </head>

 <body>
   <?php
   //Añadimos la cabecera con el menú
       include('../../layout/cabeceira.php');
       ?>
   <div id="inicio">
     <h1>Benvido a xoga con sons.</h1>
     <a href="manualUsuario.php">Manual de Usuario</a>
     <p>O xogo trata de relacionar un son cunha imaxe; poderás elixir entre tres tipos de xogo: animais, situacións e obxectos.
      Terás 10 intentos e despois poderás ver as puntuacións e/ou empezar unha partida nova.
       Pica no 'play' e cando o teñas claro pulsa a icona coa imaxe.</p>
     <img id="ini" src="/proxecto5/imagenes/delfin.gif" />
     <!--Formulario de inicio para el nombre y las opciones-->
     <form action="sonidos.php" method="POST">
       <p>Sorte!!!. Comecemos.</p>
       <br>
       <label>Nome:</label><br>
       <input type="text" name="nombre" value=""><br>
       <label>Elixe unha opción:</label><br>
       <select name="opciones">
         <option value="0">Animais</option>
         <option value="1">Situacións</option>
         <option value="2">Obxectos</option>

       </select><br><br>
       <input class="boton" type="submit" name="jugar" value="Xogar">
     </form>
   </div>
   <?php
   //Añadimos el pie de página
     include '../../layout/pe.php';
   ?>
 </body>

 </html>
