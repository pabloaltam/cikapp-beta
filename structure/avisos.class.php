<?php 
// id,rut,cargo,tipo_contrato,tipo_jornada,fecha_inicio,publicacion,tipo_publicacion,fecha_publicacion,COMUNA_ID,anios_experiencia,area_desempenio
	class publicacion
	{
		function obtienePublicacionesUsuario($rut){
		include("include/conexion.php");
		$consulta_publicaciones ="SELECT * FROM publicaciones WHERE rut='$rut' AND activo='si' ORDER BY fecha_publicacion DESC";
		$resultado = $mysqli->query($consulta_publicaciones);
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$arreglo[$i]=array($fila['id'],$fila['cargo'],$fila['tipo_contrato'],$fila['tipo_jornada'],$fila['fecha_inicio'],$fila['publicacion'],$fila['tipo_publicacion'],$fila['fecha_publicacion'],$fila['COMUNA_ID'],$fila['anios_experiencia'],$fila['area_desempenio'] );
		$i++;
		}
			$mysqli->close();
			return $arreglo;
		}
	function agregarPublicacion($rut, $cargo, $COMUNA_ID, $tipo_contrato, $tipo_jornada, $fecha_inicio, $publicacion, $tipo_publicacion,$aniosExperiencia,$areaDesempenio){
		include("include/conexion.php");
		$hora= date("Y-m-d H:i:s");
		$agrega_publicacion = "insert into publicaciones (rut,cargo,tipo_contrato,tipo_jornada,fecha_inicio,publicacion,tipo_publicacion,fecha_publicacion,COMUNA_ID,anios_experiencia,area_desempenio)
		values('$rut','$cargo','$tipo_contrato','$tipo_jornada','$fecha_inicio','$publicacion','$tipo_publicacion','$hora','$COMUNA_ID','$aniosExperiencia','$areaDesempenio')";
		$resultado = $mysqli->query($agrega_publicacion);
		$mysqli->close();
	}
		
	
		function eliminarPublicacion($id,$rut){
		include("include/conexion.php");
		$elimina_publicacion ="DELETE FROM publicaciones WHERE id='$id' AND rut='$rut'";
		$resultado = $mysqli->query($elimina_publicacion);
		$mysqli->close();
	}
	
	function editaPublicacion($id, $rut, $cargo, $COMUNA_ID, $tipo_contrato, $tipo_jornada, $fecha_inicio, $publicacion, $tipo_publicacion,$aniosExperiencia,$areaDesempenio){
		include("include/conexion.php");
		$edita_publicacion = "UPDATE publicaciones set cargo='$cargo',tipo_contrato='$tipo_contrato',tipo_jornada='$tipo_jornada',fecha_inicio='$fecha_inicio',publicacion='$publicacion',tipo_publicacion='$tipo_publicacion',anios_experiencia='$aniosExperiencia',area_desempenio='$areaDesempenio' WHERE id='$id' AND rut='$rut'";
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
		$arreglo[$i]=array($fila['id'],$fila['cargo'],$fila['tipo_contrato'],$fila['tipo_jornada'],$fila['fecha_inicio'],$fila['publicacion'],$fila['tipo_publicacion'],$fila['fecha_publicacion'],$fila['COMUNA_ID'],$fila['anios_experiencia'],$fila['area_desempenio'] );
		$i++;
		}
			$mysqli->close();
			return $arreglo;
		}
		
		function obtienePublicacionesFinalizadas($rut) {
        include("include/conexion.php");
        $consulta_publicaciones = "SELECT * FROM publicaciones a, comuna b WHERE a.COMUNA_ID=b.COMUNA_ID and a.rut='$rut' AND activo='no'  ORDER BY a.fecha_publicacion DESC ;";
        return $resultado = mysqli_query($mysqli, $consulta_publicaciones);
    }
		
	    function traePostulantes($id) {
        include("../include/conexion.php");
        $consulta_postulantes = "SELECT b.idUsuario,b.nombre,b.apellido,b.apellidoM,b.email,d.COMUNA_NOMBRE FROM publicaciones a, usuario b, usuario_publicaciones c, comuna d WHERE b.idUsuario=c.USUARIO_ID AND a.id=c.PUBLICACION_ID and d.COMUNA_ID=b.COMUNA_ID and a.id={$id};";
        $resultado = mysqli_query($mysqli, $consulta_postulantes);
				$encabezado_tabla="<table id='tabla-dinamica-load'  class='table table-hover table-responsive table-full-width'>
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>E-Mail</th>
                                                        <th>Ciudad</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>";
				$footer_tabla="  </tbody>
                                            </table>";
				$i=0;
        while ($arreglo = mysqli_fetch_assoc($resultado)) {
					if($i===0){
						echo $encabezado_tabla;
					}
            echo "
                                                <tbody id='tabla-dinamica'> 
						<tr>
                        <td>{$arreglo['nombre']}</td>
                        <td>{$arreglo['apellido']}</td>
                        <td>{$arreglo['email']}</td>
                        <td>{$arreglo['COMUNA_NOMBRE']}</td>
                        <td><a class='btn btn-sm btn-info btn-flat' href='persona.php?id={$arreglo['idUsuario']}' role='button' title='Ver el perfil de {$arreglo['nombre']} {$arreglo['apellido']} {$arreglo['apellidoM']}'><i class='fa fa-user'></i> Ver perfil</a></td>
                 </tr>";
					$i++;
        }
        $contador= mysqli_num_rows($resultado);
        if($contador===0){
            echo "<div class='callout callout-info'><h4>Aún no hay postulantes.</h4><p>Puede editar el aviso y quizas más profesionales se interesaran con su publicación.</p></div>";
        } else {
					echo $footer_tabla;
				}
        mysqli_close($mysqli);
    }

    function obtienePublicacionesDeEmpresa($rut) {
        include("include/conexion.php");
        $consulta_publicaciones = "SELECT * FROM publicaciones a, comuna b WHERE a.COMUNA_ID=b.COMUNA_ID and a.rut='$rut'  ORDER BY a.fecha_publicacion DESC ;";
        return $resultado = mysqli_query($mysqli, $consulta_publicaciones);
    }

    ///FIN
}

//Agregar a este archivo


if (isset($_POST['idPublicacion']) && !empty($_POST['idPublicacion'])) {
    $idPublicacion = $_POST['idPublicacion'];
    $obj = new publicacion();

    $obj->traePostulantes($idPublicacion);
}

//fin
	
	class trabajos
	{
		function avisosGuardados($idUsuario) {
        include 'include/conexion.php';
        $sql = "SELECT * FROM publicaciones,comuna,region,provincia,pais, postulaciones_guardadas,usuario WHERE postulaciones_guardadas.PUBLICACION_ID=publicaciones.id and postulaciones_guardadas.USUARIO_ID=usuario.idUsuario and publicaciones.COMUNA_ID=comuna.COMUNA_ID and provincia.PROVINCIA_ID=comuna.COMUNA_PROVINCIA_ID and provincia.PROVINCIA_REGION_ID=region.REGION_ID and region.REGION_PAIS_ID=pais.PAIS_ID and postulaciones_guardadas.USUARIO_ID={$idUsuario} ORDER BY fecha_publicacion DESC;";
        $result = $mysqli->query($sql);
        return $result;
    }
		
		function borraAvisoGuardado($idPublicacion, $idUsuario) {
        include 'include/conexion.php';
        $sql = "DELETE FROM postulaciones_guardadas WHERE PUBLICACION_ID='$idPublicacion' AND USUARIO_ID='$idUsuario'";
        $result = $mysqli->query($sql);
        return $result;
    }
		
		function guardaAviso($idPublicacion, $idUsuario) {
        include 'include/conexion.php';
        $sql = "insert into postulaciones_guardadas (PUBLICACION_ID,USUARIO_ID) values('$idPublicacion','$idUsuario')";
        $result = $mysqli->query($sql);
        return $result;
    }
		
		function compruebaAvisoGuardado($idPublicacion, $idUsuario){
		include("include/conexion.php");
		$compara_postulacion = "SELECT count(USUARIO_ID) as 'total' from postulaciones_guardadas WHERE PUBLICACION_ID='$idPublicacion' AND USUARIO_ID='$idUsuario';";
		$resultado = $mysqli->query($compara_postulacion);
		$row = $resultado->fetch_row();	
		if($row[0]>=1){
		return ("false");
		}
			else {return ("true");}
		$mysqli->close();
	}
		
		function obtieneAvisosTrabajos() {
        include("include/conexion.php");
        $consulta_publicaciones = "SELECT * FROM publicaciones a, comuna b WHERE a.COMUNA_ID=b.COMUNA_ID and a.activo='si'  ORDER BY a.fecha_publicacion DESC ;";
        return $resultado = mysqli_query($mysqli, $consulta_publicaciones);
    }
		    function postulacionesUsuario($idUsuario) {
        include 'include/conexion.php';
        $sql = "SELECT * FROM publicaciones,comuna,region,provincia,pais, usuario_publicaciones,usuario WHERE usuario_publicaciones.PUBLICACION_ID=publicaciones.id and usuario_publicaciones.USUARIO_ID=usuario.idUsuario and publicaciones.COMUNA_ID=comuna.COMUNA_ID and provincia.PROVINCIA_ID=comuna.COMUNA_PROVINCIA_ID and provincia.PROVINCIA_REGION_ID=region.REGION_ID and region.REGION_PAIS_ID=pais.PAIS_ID and usuario_publicaciones.USUARIO_ID={$idUsuario} ORDER BY fecha_publicacion DESC;";
        $result = $mysqli->query($sql);
        return $result;
    }
		
		function eliminaPostulacion($idPublicacion, $idUsuario) {
        include 'include/conexion.php';
        $sql = "DELETE FROM usuario_publicaciones WHERE PUBLICACION_ID='$idPublicacion' AND USUARIO_ID='$idUsuario'";
        $result = $mysqli->query($sql);
        return $result;
    }
		
		function nuevaPostulacion($idPublicacion, $idUsuario) {
        include 'include/conexion.php';
        $sql = "insert into usuario_publicaciones (PUBLICACION_ID,USUARIO_ID) values('$idPublicacion','$idUsuario')";
        $result = $mysqli->query($sql);
        return $result;
    }
		
		function compruebaPostulacion($idPublicacion, $idUsuario){
		include("include/conexion.php");
		$compara_postulacion = "SELECT count(USUARIO_ID) as 'total' from usuario_publicaciones WHERE PUBLICACION_ID='$idPublicacion' AND USUARIO_ID='$idUsuario';";
		$resultado = $mysqli->query($compara_postulacion);
		$row = $resultado->fetch_row();	
		if($row[0]>=1){
		return ("false");
		}
			else {return ("true");}
		$mysqli->close();
	}
			
		function obtieneUltimosTrabajos(){
		include("include/conexion.php");
		$consulta_trabajos ="SELECT * FROM publicaciones WHERE activo='si' ORDER BY fecha_publicacion DESC LIMIT 25;";
		$resultado = $mysqli->query($consulta_trabajos);
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$arreglo[$i]=array($fila['id'],$fila['cargo'],$fila['tipo_contrato'],$fila['tipo_jornada'],$fila['fecha_inicio'],$fila['publicacion'],$fila['tipo_publicacion'],$fila['fecha_publicacion'],$fila['COMUNA_ID'],$fila['anios_experiencia'],$fila['area_desempenio'] );
		$i++;
		}
			return $arreglo;
		}
		
	function obtieneUnAviso($id){
		include("include/conexion.php");
		$consulta_publicacion ="SELECT * FROM publicaciones WHERE id='$id'";
		return mysqli_query($mysqli, $consulta_publicacion);
		}
		
		function agregarNotificacion($rut) {
        include("include/conexion.php");
        $row = $this->traerLaUltimaPublicacion($rut);
        $razonSocial = $this->traerEmpresa($rut);
        $flag = "";
        if (!empty($row['area_desempenio'])) {
            $areaDesempenio = " areasInteres like '%" . $row['area_desempenio'] . "%'";
        } else {
            $flag = "el área de desempeño";
        }
        if (!empty($row['anios_experiencia'])) {
            $experiencia = " experiencia='" . $row['anios_experiencia']."'";
        } else {
            $flag = "los años de experiencia";
        }
        if (!empty($row['COMUNA_ID'])) {
            $COMUNA_ID = " COMUNA_ID=" . $row['COMUNA_ID'];
        } else {
            $flag = "la comuna";
        }
        if (!empty($row['COMUNA_ID']) && !empty($row['anios_experiencia']) && !empty($row['area_desempenio'])) {
            $trae_usuarios = "SELECT idUsuario,nombre, apellido FROM  usuario  where $areaDesempenio and codigo=1 and $experiencia and $COMUNA_ID;";
            if($Resultado_trae_usuarios = $mysqli->query($trae_usuarios)){
            while ($rows = mysqli_fetch_assoc($Resultado_trae_usuarios)) {
                if (!empty($rows['idUsuario']) && isset($rows['idUsuario'])) {
                    $this->enviarNotificacion($row['id'], $razonSocial['razonSocial'], $rows['idUsuario']);
                    
                }
            }
        }
				}else {
            echo 'Debe seleccionar ' . $flag;
        }
    }

    function traerLaUltimaPublicacion($rut) {
        include("include/conexion.php");
        $ultima_publicacion = "SELECT * FROM publicaciones WHERE rut='{$rut}' order by id DESC limit 1;";
        $resultado = $mysqli->query($ultima_publicacion);
        $matriz = mysqli_fetch_assoc($resultado);
        return $matriz;
    }

    function enviarNotificacion($idAviso, $nombreEmpresa, $idUsuario) {
        include("include/conexion.php");
        $timestamp = date('Y-m-d G:i:s');
        $agrega_notificacion = "INSERT INTO notificaciones (idPublicacion,notificacion_texto,idUsuario,fechaAgregada) values ($idAviso,'$nombreEmpresa ha publicado un aviso que se acomoda con tu perfil profesional.',$idUsuario,'$timestamp');";
        if(mysqli_query($mysqli, $agrega_notificacion))
        {
           
        } else {
               
        }
    }
    function traerEmpresa($rut){
        include ("include/conexion.php");
        $trae_empresa = "SELECT razonSocial FROM empresa WHERE rut='{$rut}'";
        $resultado = $mysqli->query($trae_empresa);
        $matriz=  mysqli_fetch_assoc($resultado);
        return $matriz;
    }

	}
	?>