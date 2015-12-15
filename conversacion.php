<?php
require('structure/sesion.php');
require('include/conexion.php');

$usuario = $_POST['user'];

$cadSQL = "select a.hash, b.id_remitente, b.mensaje, b.fechaEnvio, c.nombre, c.apellido 
	from grupo_mensajes a, mensajes b, usuario c WHERE ((a.usuario_uno =$id and a.usuario_dos=$usuario) or (a.usuario_uno=$usuario and a.usuario_dos=$id))
    and (a.hash=b.grupo_hash) and (c.idUsuario=b.id_remitente) and (b.id_remitente=$id or b.id_remitente=$usuario) order by b.fechaEnvio DESC ;";

$resultado = $mysqli->query($cadSQL);

while ($rows = $resultado->fetch_assoc()) {
    echo "<p><b>" . $rows['nombre'] . " " . $rows['apellido'] . "</b><br/>". $mensaje=base64_decode($rows['mensaje']) . "<span class='pull-right'>" . $rows['fechaEnvio'] ."</span></p>";}

?>