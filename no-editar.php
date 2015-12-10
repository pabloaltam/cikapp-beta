<?php
class Agrega_notificacion{
  
function agregarNotificacion($rut){
			include("include/conexion.php");
  $rows=this->traerLaUltimaPublicacion('88888888-8');
  print_r($rows);
			foreach($rows as $row){
        
      }
			$trae_usuarios ="SELECT idUsuario,nombre, apellido FROM  usuario  where areasInteres like '%informatica%' and codigo=1 and experiencia=3 and COMUNA_ID=9101;";
			$resultado = $mysqli->query($trae_usuarios);
			
			
			
		}
  
		function traerLaUltimaPublicacion ($rut){
			include("include/conexion.php");
			$ultima_publicacion ="SELECT * FROM publicaciones WHERE rut='{$rut}' order by id DESC limit 1;";
			$resultado = $mysqli->query($ultima_publicacion);
			$matriz=mysqli_fetch_assoc($resultado);
			return $matriz;
		}
  
}

$OBJ = new Agrega_notificacion();
$OBJ->agregarNotificacion();