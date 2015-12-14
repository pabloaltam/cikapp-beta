<?php ini_set("display_errors", 1);
//GUARDA EL NOMBRE DEL ARCHIVO ACTUAL
date_default_timezone_set("America/Santiago");
$estaPagina=\basename($_SERVER["SCRIPT_FILENAME"], '.php');
$estaPagina=str_replace("-"," ",$estaPagina);
//MUESTRA ADVERTENCIA SI SE ACCEDE A ESTE ARCHIVO (sesion.php)
if ($estaPagina=='sesion') {
    echo '<script>alert("Que intentas hacer?");self.location="/index.php"</script>';
    die();
}

session_start();
//Validar si se esta ingresando con sesion correctamente
if (!$_SESSION) {
    //NO HAY SESION
    $tipo='visitante';
}

else {
    //VARIABLES LISTAS PARA USAR EN PLANTILLA empresa o persona
    //ESTAS VARIABLES SE TRASPASAN DEL ARCHIVO include/sign_in.php
    foreach($_SESSION as $key => $value) {
        if (!empty($key)) {
            ${$key} = $_SESSION[$key];
            unset($key);
        }
    }
  if ($rutaImagen=="") {$rutaImagen="uploads/sinFoto.jpg";};
  
}

?>
