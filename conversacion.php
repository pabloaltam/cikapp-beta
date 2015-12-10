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
		
		<span class='direct-chat-name pull-left'>" . $rows['nombre'] . " " . $rows['apellido'] "?></span>
                <span class='direct-chat-timestamp pull-right'>23 Jan 2:00 pm</span>
              </div>
              <!-- /.direct-chat-info -->
              <img class='direct-chat-img' src='$rutaImagen' alt='imagen usuario'>
              <!-- /.direct-chat-img -->
              <div class='direct-chat-text'>
                " $rows['mensaje'] "
              </div>
              <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
		
		";
}
?>