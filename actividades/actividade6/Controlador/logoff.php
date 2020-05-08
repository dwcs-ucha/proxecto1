<?php

/* * *************************** */
/*  Luis Corral de Cal      	 */
/*  8 Mayo 2020 		 */
/*  Xogoteca->Actividade6        */
/*  Controlador Logoff   	 */
/* 	Version 1	         */
/* * *************************** */
?>
<?php
session_start();
session_unset();
session_destroy();
header('location:../index.php');

?>