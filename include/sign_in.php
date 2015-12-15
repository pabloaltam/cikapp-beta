<?php
    function loginUsuario($user, $pass) {
        include('ejecutar_en_db.php');
        $obj = new OperacionesMYSQL();
        $user = str_replace('.', '', $user);
        if($obj->RutValidateLoginUser($user)) {
            require('conexion.php'); //Incluimos la conexion a la base de datos.
                $pass_encriptada = sha1(md5($pass));
            $sql = "SELECT * FROM usuario WHERE rut='$user' and password='$pass_encriptada'";
            if($result = $mysqli->query($sql)){
                if ($rows = $result->fetch_assoc()) {
                    if($rows['codigo'] == 1){
                        @session_start();
                        if(sesion_iniciada()){
                            logout();
                        }
                        $_SESSION['id'] = $rows['idUsuario'];
                        $_SESSION['rut'] = $rows['rut'];
                        $_SESSION['nombre'] = $rows['nombre'];//Le damos el valor del nombre de usuario a la sesion usuario.
                        $_SESSION['apellido'] = $rows['apellido'];
                        $_SESSION['apellidoM'] = $rows['apellidoM'];
                        $_SESSION['email'] = $rows['email'];
                        $_SESSION['COMUNA_ID'] = $rows['COMUNA_ID'];
                        $_SESSION['rutaImagen']=$rows['rutaImagen'];
                        $_SESSION['skype'] = $rows['skype'];
                        $_SESSION['interes'] = $rows['areasInteres'];
                        $_SESSION['tituloprof'] = $rows['tituloprof'];
                        $_SESSION['tipo'] = 'persona';
                      
                      if (!empty($rows['nombre'])) {
                         header("Location: panel.php");
                      }else{
                         header("Location: editar-perfil.php");
                      }
                        
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable">
                              Antes de acceder debe confirmar el registro en su email</div>';
                        return FALSE;
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissable">
                          Su rut y contraseña no coinciden, intente nuevamente</div>';
                    return FALSE;
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissable">
                      Su usuario no se encuentra, por favor regístrese primero</div>';
                return FALSE;
            }
            $mysqli->close();
        }else{
            echo '<div class="alert alert-danger alert-dismissable">
                  Rut no valido, ingreselo correctamente</div>';
            return FALSE;
        }
    }
    
    
    function loginUsuarioCon($user, $pass) {
        include_once('ejecutar_en_db.php');
        $obj = new OperacionesMYSQL();
        $user = str_replace('.', '', $user);
        if($obj->RutValidateLoginUser($user)) {
            require('conexion.php'); //Incluimos la conexion a la base de datos.
            $sql = "SELECT * FROM usuario WHERE rut='$user' and password='$pass'";
            if($result = $mysqli->query($sql)){
                if ($rows = $result->fetch_assoc()) {
                        @session_start();
                        if(sesion_iniciada()){
                            logout();
                        }
                        $_SESSION['id'] = $rows['idUsuario'];
                        $_SESSION['rut'] = $rows['rut'];
                        $_SESSION['nombre'] = $rows['nombre'];//Le damos el valor del nombre de usuario a la sesion usuario.
                        $_SESSION['apellido'] = $rows['apellido'];
                        $_SESSION['apellidoM'] = $rows['apellidoM'];
                        $_SESSION['email'] = $rows['email'];
                        $_SESSION['COMUNA_ID'] = $rows['COMUNA_ID'];
                        $_SESSION['rutaImagen']=$rows['rutaImagen'];
                        $_SESSION['tipo'] = 'persona';
                  return TRUE;
                    
                } else {
                    echo '<p>No ha podido iniciar sesion, intente mas tarde</p>';
                    return FALSE;
                }
            } else {
                echo '<p>Su usuario no se encuentra, por favor regístrese primero</p>';
                return FALSE;
            }
            $mysqli->close();
        }else{
            echo '<p>Rut no valido, ingreselo correctamente</p>';
            return FALSE;
        }
    }
    
    
    function loginEmpresaCon($user, $pass) {
        include_once('ejecutar_en_db.php');
        $obj = new OperacionesMYSQL();
        $user = str_replace('.', '', $user);
        if($obj->RutEmpresaValidate($user)) {
            require('conexion.php'); //Incluimos la conexion a la base de datos.
            $sql = "SELECT * FROM empresa WHERE rut='$user' and password='$pass'";
            if($result = $mysqli->query($sql)){
                if ($rows = $result->fetch_assoc()) {
                        @session_start();
                        if(sesion_iniciada()){
                            logout();
                        }
                        $_SESSION['id'] = $rows['idEmpresa'];
                        $_SESSION['rut'] = $rows['rut'];
                        $_SESSION['nombre'] = $rows['nombre'];//Le damos el valor del nombre de usuario a la sesion usuario.
                        $_SESSION['apellido'] = $rows['apellido'];
                        $_SESSION['apellidoM'] = $rows['apellidoM'];
                        $_SESSION['email'] = $rows['email'];
                        $_SESSION['cargo'] = $rows['cargo'];
                        $_SESSION['razonSocial'] = $rows['razonSocial'];
                        $_SESSION['faxEmpresa'] = $rows['faxEmpresa'];
                        $_SESSION['fonoEmpresa'] = $rows['fonoEmpresa'];
                        $_SESSION['websiteEmpresa'] = $rows['websiteEmpresa'];
                        $_SESSION['emailEmpresa'] = $rows['emailEmpresa'];
                         $_SESSION['rutaImagen']=$rows['rutaImagen'];
                         $_SESSION['idTipoEmpresa']=$rows['idTipoEmpresa'];
                        $_SESSION['direccionEmpresa'] = $rows['direccionEmpresa'];
                        $_SESSION['COMUNA_ID'] = $rows['COMUNA_ID'];
                        $_SESSION['tipo'] = 'empresa';
                       return TRUE;
                } else {
                    echo '<p>No ha podido iniciar sesión, intente más tarde</p>';
                    return FALSE;
                }
            } else {
                echo '<p>Su empresa no se encuentra en nuestra base de datos, por favor regístrese primero</p>';
                return FALSE;
            }
            $mysqli->close();
        }else{
            echo '<p>Rut no válido, ingréselo correctamente</p>';
            return FALSE;
        }
    }
    
    
    function loginEmpresa($user, $pass) {
        include('ejecutar_en_db.php');
        $obj = new OperacionesMYSQL();
        $user = str_replace('.', '', $user);
        if($obj->RutEmpresaValidate($user)) {
            require('conexion.php'); //Incluimos la conexion a la base de datos.
            $pass_encriptada = sha1(md5($pass));
            $sql = "SELECT * FROM empresa WHERE rut='$user' and password='$pass_encriptada'";
          echo $sql;
            if($result = $mysqli->query($sql)){
                if ($rows = $result->fetch_assoc()) {
                    if($rows['codigo'] == 1){
                        @session_start();
                        if(sesion_iniciada()){
                            logout();
                        }
                        $_SESSION['id'] = $rows['idEmpresa'];
                        $_SESSION['rut'] = $rows['rut'];
                        $_SESSION['nombre'] = $rows['nombre'];//Le damos el valor del nombre de usuario a la sesion usuario.
                        $_SESSION['apellido'] = $rows['apellido'];
                        $_SESSION['apellidoM'] = $rows['apellidoM'];
                        $_SESSION['email'] = $rows['email'];
                        $_SESSION['cargo'] = $rows['cargo'];
                        $_SESSION['razonSocial'] = $rows['razonSocial'];
                        $_SESSION['faxEmpresa'] = $rows['faxEmpresa'];
                        $_SESSION['fonoEmpresa'] = $rows['fonoEmpresa'];
                        $_SESSION['websiteEmpresa'] = $rows['websiteEmpresa'];
                        $_SESSION['emailEmpresa'] = $rows['emailEmpresa'];
                         $_SESSION['rutaImagen']=$rows['rutaImagen'];
                        $_SESSION['direccionEmpresa'] = $rows['direccionEmpresa'];
                        $_SESSION['COMUNA_ID'] = $rows['COMUNA_ID'];
                      $_SESSION['idTipoEmpresa']=$rows['idTipoEmpresa'];
                        $_SESSION['tipo'] = 'empresa';
                        
                        header("Location: panel.php");
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable">
                              Antes de acceder debe confirmar el registrode su cuenta en su email</div>';
                        return FALSE;
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissable">
                           No ha podido iniciar sesión, intente más tarde</div>';
                    return FALSE;
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissable">
                       Su empresa no se encuentra en nuestra base de datos, por favor regístrese primero</div>';
                return FALSE;
            }
            $mysqli->close();
        }else{
            echo '<div class="alert alert-danger alert-dismissable">
                   Rut no válido, ingréselo correctamente</div>';
            return FALSE;
        }
    }

    function sesion_iniciada () { //comprueba si la sesion esta abierta
        @session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)

        if (!isset($_SESSION['id'])){
            if (!isset($_SESSION['nombre'])){
                if (!isset($_SESSION['email'])){
                    if (!isset($_SESSION['rut'])){
                        if (!isset($_SESSION['apellido'])){
                            if (empty($_SESSION['rut'])){
                                if (empty($_SESSION['id'])){
                                    if (empty($_SESSION['rut'])){
                                        if (empty($_SESSION['nombre'])){
                                            if (empty($_SESSION['apellido'])){
                                                if (empty($_SESSION['apellidoM'])){
                                                    if (empty($_SESSION['email'])){
                                                        if (empty($_SESSION['cargoEmpleado'])){
                                                            if (empty($_SESSION['razonSocial'])){
                                                                if (empty($_SESSION['faxEmpresa'])){
                                                                    if (empty($_SESSION['fonoEmpresa'])){
                                                                        if (empty($_SESSION['websiteEmpresa'])){
                                                                            if (empty($_SESSION['emailEmpresa'])){
                                                                                if (empty($_SESSION['direccionEmpresa'])){
                                                                                    if(empty($_SESSION['COMUNA_ID'])){
                                                                                        return false;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } 
                            }
                        }
                    }
                }
            }
        }
        //cumple las condiciones anteriores, entonces es un usuario validado
        return true;
    }

    function logout() {
        @session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)
        session_destroy();
    }
    
    function recuperar_claveEmpresa($email, $rut){
        require('conexion.php'); //Incluimos la conexion a la base de datos.
        $sql = "SELECT * FROM empresa WHERE rut='$rut' and emailEmpresa='$email'";
        if($result = $mysqli->query($sql)){
            if ($rows = $result->fetch_assoc()) {
                if($rows['codigo'] == 1){ //revisar otra vez
                    $clave_nueva = clave_aleatoria(6);
                    $clave_nueva_encriptada = sha1(md5($clave_nueva));
                    $sql2="UPDATE empresa SET password = '$clave_nueva_encriptada' WHERE rut = '$rut' and emailEmpresa = '$email'";
                    if($res = $mysqli->query($sql2)){
                        $headers = "From: admin@cikapp.com";
                        $mensaje = '
                        Estos son sus datos  '.$rows['razonSocial'].' 
                        
                        SU RUT: '.$rows['rut'].'
                        SU EMAIL : '.$rows['emailEmpresa'].'
                        SU NUEVA CONTRASEÑA : '.$clave_nueva.' 
                        
                        POR FAVOR CAMBIE A UNA NUEVA CONTRASEÑA AL ENTRAR LA PRIMERA VEZ, PARA MAYOR SEGURIDAD.
                        
                        GRACIAS POR CONFIAR EN CIKAPP.
                        ';
                        if (!mail("$email", "Nueva clave para acceder a su cuenta de cikapp.", "$mensaje", "$headers")) {
                            echo '<div class="alert alert-danger alert-dismissable">
                                   No se pudo enviar el email</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable">
                                   Se ha enviado un correo con su nueva contraseña a su direccion de email, al ingresar con ella a su cuenta por favor cambiela para una mayor seguridad</div>';
                        }
                    }  else {
                        echo '<div class="alert alert-danger alert-dismissable">
                              OOPS...No se puede realizar esta accion en estos momentos, intente nuevamente. Si los problemas persisten contacte con nosotros</div>';
                    }
                }else{
                    echo '<div class="alert alert-danger alert-dismissable">
                           No puede ingresar hasta que valide su cuenta con el email que se ha enviado a su correo, por favor revíselo nuevamente en su bandeja de entrada</div>';
                }
            }else{
                echo '<div class="alert alert-danger alert-dismissable">
                       Los datos no coinciden, intente nuevamente</div>';
            }
        }
    }
    function recuperar_claveUsuario($email, $rut){
        require('conexion.php'); //Incluimos la conexion a la base de datos.
        $sql = "SELECT * FROM usuario WHERE rut='$rut' and email='$email'";
        if($result = $mysqli->query($sql)){
            if ($rows = $result->fetch_assoc()) {
                if($rows['codigo'] == 1){ //revisar otra vez
                    $clave_nueva = clave_aleatoria(6);
                    $clave_nueva_encriptada = sha1(md5($clave_nueva));
                    $sql2="UPDATE usuario SET password = '$clave_nueva_encriptada' WHERE rut = '$rut' and email = '$email'";
                    if($res = $mysqli->query($sql2)){
                        $headers = "From: admin@cikapp.com";
                        $mensaje = '
                        Estos son sus datos  '.$rows['nombre'].'
                        RUT: '.$rows['rut'].'
                        SU EMAIL : '.$rows['email'].'
                        SU NUEVA CONTRASEÑA : '.$clave_nueva.'
                        POR FAVOR CAMBIE A UNA NUEVA CONTRASEÑA AL ENTRAR LA PRIMERA VEZ, PARA MAYOR SEGURIDAD. 
                        GRACIAS POR CONFIAR EN CIKAPP.
                          ';
                        if (!mail("$email", "Nueva clave para acceder a su cuenta de cikapp.", "$mensaje", "$headers")) {
                            echo "<p>No se pudo enviar el email.</p>";
                        } else {
                            echo "<p>Se ha enviado un correo con su nueva contraseña a su direccion de email, al ingresar con ella a su cuenta por favor cambiela para una mayor seguridad<p>";
                        }
                    }  else {
                        echo "<p>OOPS...No se puede realizar esta accion en estos momentos, intente nuevamente. Si los problemas persisten contacte con nosotros.</p>";
                    }
                }else{
                    echo "<p>No puede ingresar hasta que valide su cuenta con el email que se ha enviado a su correo, por favor revíselo nuevamente en su bandeja de entrada.</p>";
                }
            }else{
                echo '<p>Los datos no coinciden, intente nuevamente.</p>';
            }
        }
    }
    
    function clave_aleatoria($largo) {   //FUNCION PARA CREAR UNA CLAVE ALEATORIA 
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena = strlen($cadena);
        $pass = "";
        $longitudPass = $largo;
        for($i=1 ; $i<=$longitudPass ; $i++){
            $pos=rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass; 
    }
    function esEmpresa($rut){
        $res = substr($rut,0,2);
        if($res >= '50'){
            return TRUE; 
        } else {
            return FALSE;
        }
    }
      function actualizarContraseña($idUser,$nueva){
        include("conexion.php");
        $clave_nueva_encriptada = sha1(md5($nueva));
        $sql2="UPDATE usuario SET password = '$clave_nueva_encriptada' WHERE idUsuario = '$idUser'";
        if($res = $mysqli->query($sql2)){
          return true;
          //echo"<p>Actualizado</p>";
        }else{
          return false;
          //echo"<p>No se ha podido actualizar su clave</p>";
        }
      }
function actualizarContraseñaE($idUser,$nueva){
        include("conexion.php");
        $clave_nueva_encriptada = sha1(md5($nueva));
        $sql2="UPDATE empresa SET password = '$clave_nueva_encriptada' WHERE idEmpresa = '$idUser'";
        if($res = $mysqli->query($sql2)){
          return true;
          //echo"<p>Actualizado</p>";
        }else{
          return false;
          //echo"<p>No se ha podido actualizar su clave</p>";
        }
      }
?>
