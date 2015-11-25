<?php
if (\basename($_SERVER["SCRIPT_FILENAME"], '.php') == 'conexion') { echo '<script>alert("Que intentas hacer?");self.location="/index.php"</script>';die();}
set_time_limit(0);
try {
    // HOSTNAME,USERNAME,PASSWORD,DATABASE
    $mysqli=new mysqli("192.185.67.190", "globaled_cikapp", "Cikapp2015!", "globaled_cikapp1");
}

catch (Exception $ex) {
    echo "Lo sentimos... en estos momentos no podemos procesar su información...por favor inténtelo más tarde";
}

?>
