<?php

class OperacionesMYSQL {

    function traerDatos() {

        require 'conexion.php';
        $query = "SELECT * FROM usuario";
        print("<table>");

        $resultado = $mysqli->query($query);

        while ($rows = $resultado->fetch_assoc()) {

            print("<tr>");
            print("<td>" . $rows["idUsuario"] . "</td>");
            print("<td>" . $rows["nombre"] . "</td>");
            print("<td>" . $rows["apellido"] . "</td>");
            print("<td>" . $rows["rut"] . "</td>");
            print("<td>" . $rows["password"] . "</td>");
            print("</tr>");
        }
        print("</table>");
    }

    function actualizarDatos() {

        require("conexion.php");

        $sql = "UPDATE usuario SET nombre='admin' WHERE idUsuario=1";

        try {

            $count = $con->exec($sql);
            $con = null;
            print($count . " Filas afectadas");
        } catch (PDOException $e) {

# QUE HACER EN CASO DE ERROR
        }
    }

    function crearUsuario($rut, $email, $password1, $password2, $codigo) {
        $pass = sha1(md5($password1));
        include("conexion.php");
        $rut = str_replace('.', '', $rut);        
        if ($this->RutValidate($rut)) {
            if ($this->emailValidate($email)) {
                if ($this->passwordValidate($password1, $password2)) {
                  $cad = "INSERT INTO usuario (rut, email, password, codigo) VALUES ('$rut','$email','$pass','$codigo');";
                    if ($mysqli->query($cad) == TRUE) {
                      return TRUE;
                    } else {
                        return FALSE;
                    }
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Validador de RUT con digito verificador 
     *
     * @param string $rut
     * @return boolean
     */
    function RutValidate($rut) {
        $rut = str_replace('.', '', $rut);
            $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';
    if($dvr == strtoupper($dv))
        return true;
    else
        return false;
    }

    function RutValidateLoginUser($rut) {
        $rut = str_replace('.', '', $rut);
            $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';
    if($dvr == strtoupper($dv))
        return true;
    else
        return false;
    }

    function RutValidateLoginEnterprise($rut) {
       $rut = str_replace('.', '', $rut);
            $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';
    if($dvr == strtoupper($dv))
        return true;
    else
        return false;
    }

    /**
     * Validador de RUT con digito verificador 
     *
     * @param string $rut
     * @return boolean
     */
    function RutEmpresaValidate($rut) {
         $rut = str_replace('.', '', $rut);
      $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';
    if($dvr == strtoupper($dv))
        return true;
    else
        return false;
    }

    function emailValidate($email) {
        require 'conexion.php';
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT email FROM usuario WHERE email='{$email}'";
            $resultado = $mysqli->query($query);
            while ($rows = $resultado->fetch_assoc()) {
                if ($rows["email"] === $email) {
                    return FALSE;
                }
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function emailEmpresaValidate($email) {
        require 'conexion.php';
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT email FROM empresa WHERE email='{$email}'";
            $resultado = $mysqli->query($query);
            while ($rows = $resultado->fetch_assoc()) {
                if ($rows["email"] === $email) {
                    return FALSE;
                }
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function passwordValidate($password1, $password2) {
        if (trim($password1) == TRUE && trim($password2) == TRUE) {
            if ($password1 === $password2) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function crearEmpresa($rut, $email, $password1, $password2, $codigo) {
# Insertando en la Base de Datos con PDOStatement
        $pass = sha1(md5($password1));
        include("conexion.php");
        $rut = str_replace('.', '', $rut);
        $sql = "INSERT INTO empresa (rut, email, password, codigo) VALUES ('$rut','$email','$pass','$codigo');";
        if ($this->RutEmpresaValidate($rut)) {
            if ($this->emailEmpresaValidate($email)) {
                if ($this->passwordValidate($password1, $password2)) {
                    if ($mysqli->query($sql) == TRUE) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            
            return FALSE;
        }
    }

    function validarCodigo($codigo) {

        include 'conexion.php';
        $query = "SELECT * FROM usuario where codigo={$codigo};";
        $resultado = $mysqli->query($query);
        while ($rows = $resultado->fetch_assoc()) {
            if (count($rows) != 0) {
                $sqlUpdate = "Update usuario SET codigo='1' WHERE idUsuario={$rows['idUsuario']}";
                if ($mysqli->query($sqlUpdate)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
        return NULL;
    }

    function validarCodigoEmpresa($codigo) {

        require 'conexion.php';
        $query = "SELECT * FROM empresa where codigo={$codigo};";
        $resultado = $mysqli->query($query);
        while ($rows = $resultado->fetch_assoc()) {
            if (count($rows) != 0) {
                $sqlUpdate = "UPDATE empresa SET codigo='1' WHERE idEmpresa='{$rows['idEmpresa']}'";
                if ($mysqli->query($sqlUpdate)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
        return NULL;
    }

    function editarUsuario($idUsuario, $nombre, $apellido, $apellidoM, $email, $skype, $COMUNA_ID, $experiencia, $areasInteres, $idIngles, $video, $tituloprof) {
        include("conexion.php");
        $video = substr($video, 32);
        $actualizaUsuario = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', apellidoM='$apellidoM',email='$email', skype='$skype', COMUNA_ID=$COMUNA_ID, experiencia='$experiencia', areasInteres='$areasInteres', idIngles=$idIngles, video='$video', tituloprof='$tituloprof' WHERE idUsuario='$idUsuario';";
        $resultado = $mysqli->query($actualizaUsuario);
        $mysqli->close();
        return $resultado;
    }

    function editarImagenUsuario($idUsuario, $rutaImagen) {
        include("conexion.php");
        $actualizaUsuario = "UPDATE usuario SET rutaImagen='$rutaImagen' WHERE idUsuario='$idUsuario';";
        $resultado = $mysqli->query($actualizaUsuario);
        $mysqli->close();
        if ($resultado) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function esIgual($val, $val2) {
        include 'conexion.php';
        $query = "SELECT password FROM usuario where idUsuario=$val";
        $resultado = $mysqli->query($query);
        while ($rows = $resultado->fetch_assoc()) {
            if ($rows['password'] === sha1(md5($val2))) {
                return TRUE;
            }
        }
        return FALSE;
    }
    function esIgualE($val, $val2) {
        include 'conexion.php';
        $query = "SELECT password FROM empresa where idEmpresa=$val";
        $resultado = $mysqli->query($query);
        while ($rows = $resultado->fetch_assoc()) {
            if ($rows['password'] === sha1(md5($val2))) {
                return TRUE;
            }
        }
        return FALSE;
    }

    function agregarEstudios($idUsuario, $idEstudio) {
        include("conexion.php");
        $actualizaUsuario = "INSERT INTO usuario_educacion (usuario_id, educacion_id) VALUES ($idUsuario, $idEstudio);";
        $resultado = $mysqli->query($actualizaUsuario);
        $mysqli->close();
        return $resultado;
    }
    
    
    function actualizarEstudios($idUsuario, $idEstudio) {
        include("conexion.php");
        $actualizaUsuario = "UPDATE usuario_educacion set educacion_id=$idEstudio WHERE usuario_id={$idUsuario};";
        $resultado = $mysqli->query($actualizaUsuario);
        $mysqli->close();
        return $resultado;
    }

    function comprobarUsuarioEducacion($usuarioID, $educacionID) {
        include ("conexion.php");
        $sql = "SELECT * FROM usuario_educacion where usuario_id={$usuarioID} and educacion_id={$educacionID}";
      echo $sql;
        $resultado = $mysqli->query($sql);
        while ($rows = $resultado->fetch_assoc()) {
            if ($rows['usuario_id'] == $usuarioID and $rows['educacion_id']== $educacionID) {

                return TRUE;
            }
        }
        return FALSE;
    }
    
    function comprobarUsuario($usuarioID) {
        include ("conexion.php");
        $sql = "SELECT *FROM usuario_educacion where usuario_id={$usuarioID}";
        $resultado = $mysqli->query($sql);
        while ($rows = $resultado->fetch_assoc()) {
            if ($rows['usuario_id'] == $usuarioID) {

                return FALSE;
            }
        }
        return TRUE;
    }

    function editarImagenEmpresa($id, $rutaImagen) {
        include("conexion.php");
        $actualizar = "UPDATE empresa SET rutaImagen='$rutaImagen' WHERE idEmpresa='$id';";
        $resultado = $mysqli->query($actualizar);
        $mysqli->close();
        if ($resultado) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function editarEmpresa($rut, $email, $cargo, $razonSocial, $faxEmpresa, $fonoEmpresa, $websiteEmpresa, $emailEmpresa, $nombre, $apellido, $apellidoM, $idTipoEmpresa, $COMUNA_ID, $direccionEmpresa) {
        include("conexion.php");
        $actualizaEmpresa = "UPDATE empresa SET email='$email', cargo='$cargo', razonSocial='$razonSocial', faxEmpresa='$faxEmpresa', fonoEmpresa='$fonoEmpresa', websiteEmpresa='$websiteEmpresa', emailEmpresa='$emailEmpresa', nombre='$nombre', apellido='$apellido', apellidoM='$apellidoM', idTipoEmpresa='$idTipoEmpresa', COMUNA_ID='$COMUNA_ID', direccionEmpresa='$direccionEmpresa' WHERE rut='$rut';";
        $resultado = $mysqli->query($actualizaEmpresa);
        $mysqli->close();
        return $resultado;
    }

    function mostrarUsuarios($noRutActual) {
        include("include/conexion.php");
        $consulta_usuarios = "SELECT * FROM usuario WHERE rut <> '$noRutActual' ORDER BY apellido DESC";
        $resultado = $mysqli->query($consulta_usuarios);
        $i = 0;
        while ($fila = $resultado->fetch_assoc()) {
            $arreglo[$i] = array($fila['nombre'], $fila['apellido'], $fila['email'], $fila['skype'], $fila['areasInteres'], $fila['idUsuario']);
            $i++;
        }
        return $arreglo;
    }

    function recuperarUsuario($idUsuario) {
        include("include/conexion.php");
        $consulta_usuarios = "SELECT * FROM usuario WHERE idUsuario = '$idUsuario' ";
        $resultado = $mysqli->query($consulta_usuarios);
        $mysqli->close();
        return $resultado;
    }

    function enviarMensaje($idUsuario, $mensaje) {
        include("include/conexion.php");
        $insertar_mensaje = "INSERT INTO conversacion (idUsuario, mensaje) VALUES ('$idUsuario', '$mensaje') ";
        $resultado = $mysqli->query($insertar_mensaje);
        $mysqli->close();
        return $resultado;
    }

    function YaPostulo($idUsuario, $idPublicacion) {
        include 'include/conexion.php';
        $sql = "SELECT *FROM usuario_publicaciones where USUARIO_ID={$idUsuario} and PUBLICACION_ID={$idPublicacion}";
        if ($result = $mysqli->query($sql)) {
            if ($result->fetch_assoc()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function postulacionUsuario($idPostulacion, $idUsuario) {
        include 'include/conexion.php';
        $sql = "INSERT INTO usuario_publicaciones (PUBLICACION_ID,USUARIO_ID) VALUES ($idPostulacion,$idUsuario)";
        $result = $mysqli->query($sql);
        $mysqli->close();
        return $result;
    }
      function cantidadAvisos($rutEmpresa) {
        include("include/conexion.php");
        $consulta_empresa = "SELECT * FROM publicaciones WHERE rut = '$rutEmpresa' AND activo='si'";
        $resultado = $mysqli->query($consulta_empresa);
        $mysqli->close();
        return $resultado;
    }
  
  function cantidadAvisosFinalizados($rut) {
        include("include/conexion.php");
        $consulta_empresa = "SELECT * FROM publicaciones WHERE rut = '$rut' AND activo='no'";
        $resultado = $mysqli->query($consulta_empresa);
        $mysqli->close();
        return $resultado;
    }
  
   function finalizaPublicacion($rut) {
        include("include/conexion.php");
        $consulta = "SELECT id FROM publicaciones WHERE fecha_publicacion rut = '$rut' AND activo='si'";
        $resultado = $mysqli->query($consulta);
        $mysqli->close();
        return $resultado;
    }

}