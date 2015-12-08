<?php 
// id,rut,cargo,lugar_trabajo,tipo_contrato,tipo_jornada,fecha_inicio,publicacion,tipo_publicacion,fecha_publicacion
	class publicacion
	{
		function obtienePublicacionesUsuario($rut){
		include("include/conexion.php");
		$consulta_publicaciones ="SELECT * FROM publicaciones WHERE rut='$rut' ORDER BY fecha_publicacion DESC";
		$resultado = $mysqli->query($consulta_publicaciones);
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$arreglo[$i]=array($fila['id'],$fila['cargo'],$fila['lugar_trabajo'],$fila['tipo_contrato'],$fila['tipo_jornada'],$fila['fecha_inicio'],$fila['publicacion'],$fila['tipo_publicacion'],$fila['fecha_publicacion'] );
		$i++;
		}
			$mysqli->close();
			return $arreglo;
		}
	function agregarPublicacion($rut,$cargo,$lugar_trabajo,$tipo_contrato,$tipo_jornada,$fecha_inicio,$publicacion,$tipo_publicacion){
		include("include/conexion.php");
		$hora= date("Y-m-d H:i:s");    
		$agrega_publicacion = "insert into publicaciones(rut,cargo,lugar_trabajo,tipo_contrato,tipo_jornada,fecha_inicio,publicacion,tipo_publicacion,fecha_publicacion)
		values('$rut','$cargo','$lugar_trabajo','$tipo_contrato','$tipo_jornada','$fecha_inicio','$publicacion','$tipo_publicacion','$hora')";
		$resultado = $mysqli->query($agrega_publicacion);
		$mysqli->close();
	}
	
		function eliminarPublicacion($id,$rut){
		include("include/conexion.php");
		$elimina_publicacion ="DELETE FROM publicaciones WHERE id='$id' AND rut='$rut'";
		$resultado = $mysqli->query($elimina_publicacion);
		$mysqli->close();
	}
	
	function editaPublicacion($id,$rut,$cargo,$lugar_trabajo,$tipo_contrato,$tipo_jornada,$fecha_inicio,$publicacion,$tipo_publicacion){
		include("include/conexion.php");
		$edita_publicacion = "UPDATE publicaciones set cargo='$cargo',lugar_trabajo='$lugar_trabajo',tipo_contrato='$tipo_contrato',tipo_jornada='$tipo_jornada',fecha_inicio='$fecha_inicio',publicacion='$publicacion',tipo_publicacion='$tipo_publicacion' WHERE id='$id' AND rut='$rut'";
		$resultado = $mysqli->query($edita_publicacion );
		$mysqli->close();
	}
	
	function compruebaPass($rut,$tipo,$pass){
		include("include/conexion.php");
		if ($tipo=="persona") $tipo="usuario";
		$pass = sha1(md5($pass));
		$compara_pass = "SELECT * from $tipo WHERE rut='$rut' AND password='$pass';";
		$resultado = $mysqli->query($compara_pass);
		while($fila = $resultado->fetch_assoc()){
		return ("true");
		}
		$mysqli->close();
		
	}
	
	function obtieneUnaPublicacion($id,$rut){
		include("include/conexion.php");
		$consulta_publicacion ="SELECT * FROM publicaciones WHERE id='$id' AND rut='$rut'";
		$resultado = $mysqli->query($consulta_publicacion);
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$arreglo[$i]=array($fila['id'],$fila['cargo'],$fila['lugar_trabajo'],$fila['tipo_contrato'],$fila['tipo_jornada'],$fila['fecha_inicio'],$fila['publicacion'],$fila['tipo_publicacion'],$fila['fecha_publicacion'] );
		$i++;
		}
			$mysqli->close();
			return $arreglo;
		}
	}
	
	class trabajos
	{
		
		function obtieneUltimosTrabajos(){
		include("include/conexion.php"); // WHERE activo='1'
		$consulta_trabajos ="SELECT * FROM publicaciones ORDER BY fecha_publicacion DESC LIMIT 25;";
		$resultado = $mysqli->query($consulta_trabajos);
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$arreglo[$i]=array($fila['id'],$fila['cargo'],$fila['lugar_trabajo'],$fila['tipo_contrato'],$fila['tipo_jornada'],$fila['fecha_inicio'],$fila['publicacion'],$fila['tipo_publicacion'],$fila['fecha_publicacion'] );
		$i++;
		}
			return $arreglo;
		}
		
	function obtieneUnAviso($id){
		include("include/conexion.php");
		$consulta_publicacion ="SELECT * FROM publicaciones WHERE id='$id'";
		$resultado = $mysqli->query($consulta_publicacion);
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$arreglo[$i]=array($fila['id'],$fila['cargo'],$fila['lugar_trabajo'],$fila['tipo_contrato'],$fila['tipo_jornada'],$fila['fecha_inicio'],$fila['publicacion'],$fila['tipo_publicacion'],$fila['fecha_publicacion'] );
		$i++;
		}
			return $arreglo;
		}

	}
	?>