<?php //GUARDA EL NOMBRE DEL ARCHIVO ACTUAL
ini_set("display_errors", 1);
$estaPagina=\basename($_SERVER["SCRIPT_FILENAME"], '.php');
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
    //Variables para empresa o persona
    $tipo=$_SESSION['tipo'];
    $id=$_SESSION['id'];
    $email=$_SESSION['email'];
    $nombre=$_SESSION['nombre'];
    $apellido=$_SESSION['apellido'];
    $apellidoM=$_SESSION['apellidoM'];
    $rut=$_SESSION['rut'];
    $direccion=$_SESSION['direccion'];
    $rutaImagen=$_SESSION['rutaImagen'];
    $skype=$_SESSION['skype'];
    $video=$_SESSION['video'];
    $comunaID=$_SESSION['COMUNA_ID'];
    $cargo=$_SESSION['cargo'];
    $razonSocial=$_SESSION['razonSocial'];
    $faxEmpresa=$_SESSION['faxEmpresa'];
    $fonoEmpresa=$_SESSION['fonoEmpresa'];
    $websiteEmpresa=$_SESSION['websiteEmpresa'];
    $emailEmpresa=$_SESSION['emailEmpresa'];
}

?>
