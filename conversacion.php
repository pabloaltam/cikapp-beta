<?php
require('structure/sesion.php');
require('include/conexion.php');

$mi_id = $_SESSION['id'];
$usuario = $_POST['user'];

$cadSQL = "select a.hash, b.id_remitente, b.mensaje, c.nombre, c.apellido 
	from grupo_mensajes a, mensajes b, usuario c WHERE ((a.usuario_uno =$mi_id and a.usuario_dos=$usuario) or (a.usuario_uno=$usuario and a.usuario_dos=$mi_id))
    and (a.hash=b.grupo_hash) and (c.idUsuario=b.id_remitente) and (b.id_remitente=$mi_id or b.id_remitente=$usuario) order by b.fechaEnvio DESC ;";

$resultado = $mysqli->query($cadSQL);
while ($rows = $resultado->fetch_assoc()) {
    echo "
		<p><b>" . $rows['nombre'] . " " . $rows['apellido'] . "</b><br/>"
    . $rows['mensaje'] . "</p>
		
		";
}
?>