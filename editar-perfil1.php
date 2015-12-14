<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
ini_set("display_errors", 1);
include 'structure/navbar.panel.php';
include 'include/ejecutar_en_db.php';

$Obj_operaciones = new OperacionesMYSQL();
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">Edita tu Perfil</h3>
                  </div>
                  

                    <?php
                    if (empty($nombre)) {
                        echo "
                  <div class='box-content'>
                        <div class='alert alert-info alert-dismissable'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                     
                         <h4><i class='icon fa fa-info'></i>Es tu primer inicio de sesión, edita tu perfil.</h4>
                     </div>
                     ";
                    }
                    ?>


                    <?php if ($tipo == 'empresa') { ?>
                        <div class="container-fluid">
                            <h1 class="page-header">Edite el perfil de su empresa</h1>
                            <?php
                            if (isset($_POST['nombre'])) {


                                if ($Obj_operaciones->esIgualE($id, $_POST['pwd1']) && $_POST['pwd1'] === $_POST['pwd2']) {
                                    $nombre = $_POST['nombre'];
                                    $apellido = $_POST['apellido'];
                                    $apellidoM = $_POST['apellidoM'];
                                    $email = $_POST['email'];
                                    $cargo = $_POST['cargo'];
                                    $razonSocial = $_POST['razonSocial'];
                                    $idTipoEmpresa = $_POST['idTipoEmpresa'];
                                    $COMUNA_ID = $_POST['COMUNA_ID'];
                                    $direccionEmpresa = $_POST['direccionEmpresa'];
                                    $faxEmpresa = $_POST['faxEmpresa'];
                                    $fonoEmpresa = $_POST['fonoEmpresa'];
                                    $websiteEmpresa = $_POST['websiteEmpresa'];
                                    $emailEmpresa = $_POST['emailEmpresa'];
                                    $pwd1 = $_POST['pwd1'];
                                    $pwd1 = $_POST['pwd2'];

                                    //INICIO CODIGO IMAGEN
                                    if ($_FILES["uploadedfile"]["size"] > 0) {
                                        $uploadedfileload = true;
                                        $uploadedfile_size = $_FILES["uploadedfile"]["size"];
                                        $msg = "";
                                        if ($_FILES["uploadedfile"]["size"] > 5000000) {
                                            $msg = $msg . "El archivo es mayor que 5MB, debes reduzcirlo antes de subirlo<BR>";
                                            $uploadedfileload = false;
                                        }
                                        if (!($_FILES["uploadedfile"]["type"] == "image/jpeg" OR $_FILES["uploadedfile"]["type"] == "image/gif" OR $_FILES["uploadedfile"]["type"] == "image/png")) {
                                            $msg = $msg . " Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
                                            $uploadedfileload = false;
                                        }
                                        $file_name = $_FILES["uploadedfile"]["name"];
                                        $add = "uploads/$file_name";
                                        if ($uploadedfileload) {
                                            if (move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $add)) {
                                                if ($Obj_operaciones->editarImagenEmpresa($id, $add)) {
                                                    echo 'ÉXITO: Imagen actualizada, sin embargo la imagen será revisada para ver si cumple con las reglas de Cikapp.<br>';
                                                } else {
                                                    echo 'ERROR: Actualize la imagen más tarde.<br>';
                                                }
                                            } else {
                                                echo "Error al subir el archivo<br>";
                                            }
                                        } else {
                                            echo $msg;
                                        }
                                    }//FIN CODIGO IMAGEN

                                    $test = $Obj_operaciones->editarEmpresa($rut, $email, $cargo, $razonSocial, $faxEmpresa, $fonoEmpresa, $websiteEmpresa, $emailEmpresa, $nombre, $apellido, $apellidoM, $idTipoEmpresa, $COMUNA_ID, $direccionEmpresa);
                                    if ($test) {
                                        $_SESSION['nombre'] = $nombre;
                                        $_SESSION['apellido'] = $apellido;
                                        echo 'ÉXITO: Los datos de la empresa han sido actualizados correctamente.<br>';
                                    } else {
                                        echo 'ERROR: Edite el perfil más tarde por favor.<br>';
                                    }
                                } else {
                                    echo 'Las contraseñas no coinciden';
                                }
                            }

                            include './include/conexion.php';

                            $query = "SELECT * FROM empresa WHERE idEmpresa={$id};";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $nombre = $rows['nombre'];
                                $apellido = $rows['apellido'];
                                $apellidoM = $rows['apellidoM'];
                                $email = $rows['email'];
                                $cargo = $rows['cargo'];
                                $razonSocial = $rows['razonSocial'];
                                $idTipoEmpresa = $rows['idTipoEmpresa'];
                                $COMUNA_IDempresa = $rows['COMUNA_ID'];
                                $direccionEmpresa = $rows['direccionEmpresa'];
                                $faxEmpresa = $rows['faxEmpresa'];
                                $fonoEmpresa = $rows['fonoEmpresa'];
                                $websiteEmpresa = $rows['websiteEmpresa'];
                                $emailEmpresa = $rows['emailEmpresa'];
                                $pass = $rows['password'];
                                $rutaImagen = $rows['rutaImagen'];
                            }
                            ?>
                            <div class="row">
                              
                                <form class="form-horizontal" role="form" action="" method="post" name="formDatos" enctype="multipart/form-data">
                                    <!-- left column -->
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="text-center">
                                            <?php
                                            if ($rutaImagen === "") {
                                                echo '<img src="uploads/sinFoto.jpg" class="avatar img-circle img-thumbnail" alt="Foto" id="fotoEmpresa">';
                                            } else {
                                                echo "<img src='$rutaImagen' class='avatar img-circle img-thumbnail' alt='Foto' id='fotoEmpresa'>";
                                            }
                                            ?>
                                            <div class="alert alert-warning">
                                                <i class="fa fa-folder-open"></i> Elige la foto desde tu equipo.
                                            </div>
                                            <input type="file" class="text-center center-block well well-sm" name="uploadedfile" id="uploadedfile" accept="image/*">
                                        </div>
                                    </div>
                                    <!-- edit form column -->
                                    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                                        <div class="alert alert-info alert-dismissable">
                                            <a class="panel-close close" data-dismiss="alert">×</a>
                                            <i class="fa fa-photo"></i> Su foto debe ser tipo <strong>cédula de identidad</strong>, de lo contrario será eliminada.
                                        </div>
                                        <h3>Información personal</h3>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Nombre:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $nombre ?>" type="text" name="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Apellido paterno:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $apellido ?>" type="text" name="apellido">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Apellido materno:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $apellidoM ?>" type="text" name="apellidoM">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Correo electrónico:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $email ?>" type="text" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Nombre de su cargo:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $cargo ?>" type="text" name="cargo">
                                            </div>
                                        </div>
                                        <h3>Información empresa</h3>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Nombre/Razón social:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $razonSocial ?>" type="text" name="razonSocial">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Tipo de empresa:</label>
                                            <div class="col-lg-3">
                                                <div class="ui-select">
                                                    <select id="tipos" class="form-control" name="idTipoEmpresa">
                                                        <?php
                                                        require 'include/conexion.php';

                                                        $query = "SELECT * FROM tipo_empresa";
                                                        if ($resultado = $mysqli->query($query)) { //usamos la conexion para dar un resultado a la variable
                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                $selected = "";
                                                              print_r($_SESSION);
                                                              echo $idTipoEmpresa."---".$rows['idTipo_empresa'];
                                                                if ($rows['idTipo_empresa'] == $idTipoEmpresa) {
                                                                    $selected = "selected='selected'";
                                                                }
                                                                print(" <option value='" . $rows['idTipo_empresa'] . "' $selected>" . $rows['tipoEmpresa'] . "</option>"); //concatenamos los opciones
                                                            }
                                                        } else {
                                                            print("<option>Seleccione un tipo de empresa</option>");
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Pais:</label>
                                            <div class="col-lg-3">
                                                <div class="ui-select">
                                                    <select id="pais" class="form-control">
                                                        <option value="Chile">Chile</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Región:</label>
                                            <div class="col-lg-3">
                                                <div class="ui-select">
                                                    <select id="region" class="form-control">
                                                        <?php
                                                        require 'include/conexion.php';

                                                        $query = "SELECT * FROM region";
                                                        if ($resultado = $mysqli->query($query)) {
                                                            $regionID = null;
                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                $sql = "select REGION_ID from comuna a, provincia b, region c where COMUNA_PROVINCIA_ID = PROVINCIA_ID and PROVINCIA_REGION_ID = REGION_ID and COMUNA_ID=$COMUNA_IDempresa;";
                                                                $resultado2 = $mysqli->query($sql);
                                                                $selected = null;
                                                                while ($rows2 = $resultado2->fetch_assoc()) {
                                                                    if ($rows['REGION_ID'] === $rows2['REGION_ID']) {
                                                                        $selected = "selected='selected'";
                                                                        $regionID = $rows2['REGION_ID'];
                                                                    }
                                                                }
                                                                print("<option value='" . $rows['REGION_ID'] . "' $selected>" . $rows['REGION_NOMBRE'] . "</option>");
                                                            }
                                                        } else {
                                                            print("<option>Seleccione una region</option>");
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Ciudad:</label>
                                            <div class="col-lg-3">
                                                <div class="ui-select">
                                                    <select id="ciudad" class="form-control" name="COMUNA_ID">
                                                        <?php
                                                        require 'include/conexion.php';

                                                        $query = "SELECT COMUNA_ID, COMUNA_NOMBRE FROM comuna, provincia, region where COMUNA_PROVINCIA_ID=provincia.PROVINCIA_ID and provincia.PROVINCIA_REGION_ID=region.REGION_ID and region.REGION_ID=$regionID;";
                                                        if ($resultado = $mysqli->query($query)) {
                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                $selected = "";
                                                                if ($rows['COMUNA_ID'] === $COMUNA_IDempresa) {
                                                                    $selected = "selected='selected'";
                                                                }
                                                                print("<option value='" . $rows['COMUNA_ID'] . "' $selected>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                                            }
                                                        } else {
                                                            print("<option>Seleccione una ciudad</option>");
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Dirección:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $direccionEmpresa ?>" type="text" name="direccionEmpresa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Fax:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $faxEmpresa ?>" type="text" name="faxEmpresa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Teléfono:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $fonoEmpresa ?>" type="text" name="fonoEmpresa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Sitio web:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $websiteEmpresa ?>" type="text" name="websiteEmpresa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Email:</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="<?php echo $emailEmpresa ?>" type="text" name="emailEmpresa">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="col-md-11">Para que los cambios se apliquen debes ingresar tu contraseña en los campos que se encuentran a continuación.</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Contraseña:</label>
                                            <div class="col-md-8">
                                                <input class="form-control" value="" type="password" name="pwd1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Confirmar contraseña:</label>
                                            <div class="col-md-8">
                                                <input class="form-control" value="" type="password" name="pwd2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-8">
                                                <input class="btn btn-primary" value="Guardar cambios" type="submit">
                                                <span></span>
                                                <input class="btn btn-default" value="Cancelar" type="reset">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    } else if ($tipo == 'persona') {
                        ?>
                             <?php
                                        if (isset($_POST['nombre'])) {


                                            if ($Obj_operaciones->esIgual($id, $_POST['pwd1']) && $_POST['pwd1'] === $_POST['pwd2']) {
                                                $nombre = $_POST['nombre'];
                                                $apellido = $_POST['apellido'];
                                                $apellidoM = $_POST['apellidoM'];
                                                $email = $_POST['email'];
                                                $skype = $_POST['skype'];
                                                $COMUNA_ID = $_POST['COMUNA_ID'];
                                                $experiencia = $_POST['experiencia'];
                                                $video = $_POST['video'];
                                                $tituloprof = $_POST['tituloprof'];
                                                if (isset($_POST['selEducacion'])) {
                                                    $selEducacion = $_POST['selEducacion'];
                                                    if ($Obj_operaciones->comprobarUsuario($id)) {
                                                        $Obj_operaciones->agregarEstudios($id, $selEducacion);
                                                    } else {
                                                        $Obj_operaciones->actualizarEstudios($id, $selEducacion);
                                                    }
                                                }
                                                if (isset($_POST['areasInteres'][0], $_POST['areasInteres'][1], $_POST['areasInteres'][2])) {
                                                    $areaInteres = $_POST['areasInteres'][0] . "," . $_POST['areasInteres'][1] . "," . $_POST['areasInteres'][2];
                                                } elseif (isset($_POST['areasInteres'][0], $_POST['areasInteres'][1])) {
                                                    $areaInteres = $_POST['areasInteres'][0] . "," . $_POST['areasInteres'][1];
                                                } elseif (isset($_POST['areasInteres'][0], $_POST['areasInteres'][2])) {
                                                    $areaInteres = $_POST['areasInteres'][0] . "," . $_POST['areasInteres'][2];
                                                } elseif (isset($_POST['areasInteres'][1], $_POST['areasInteres'][2])) {
                                                    $areaInteres = $_POST['areasInteres'][1] . "," . $_POST['areasInteres'][2];
                                                } elseif (isset($_POST['areasInteres'][0])) {
                                                    $areaInteres = $_POST['areasInteres'][0];
                                                } elseif (isset($_POST['areasInteres'][1])) {
                                                    $areaInteres = $_POST['areasInteres'][1];
                                                } elseif (isset($_POST['areasInteres'][2])) {
                                                    $areaInteres = $_POST['areasInteres'][2];
                                                } else {
                                                    $areaInteres = " ";
                                                }
                                                $idIngles = $_POST['idIngles'];

                                                $pwd1 = $_POST['pwd1'];
                                                $pwd1 = $_POST['pwd2'];

                                                if ($_FILES["uploadedfile"]["size"] > 0) {
                                                    $uploadedfileload = true;
                                                    $uploadedfile_size = $_FILES["uploadedfile"]["size"];
                                                    $msg = "";
                                                    if ($_FILES["uploadedfile"]["size"] > 5000000) {
                                                        $msg = $msg . "El archivo es mayor que 5MB, debes reduzcirlo antes de subirlo<BR>";
                                                        $uploadedfileload = false;
                                                    }
                                                    if (!($_FILES["uploadedfile"]["type"] == "image/jpeg" OR $_FILES["uploadedfile"]["type"] == "image/gif" OR $_FILES["uploadedfile"]["type"] == "image/png")) {
                                                        $msg = $msg . " Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
                                                        $uploadedfileload = false;
                                                    }
                                                    $file_name = $_FILES["uploadedfile"]["name"];
                                                    $add = "uploads/$file_name";
                                                    if ($uploadedfileload) {
                                                        if (move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $add)) {
                                                            if ($Obj_operaciones->editarImagenUsuario($id, $add)) {
                                                                echo 'ÉXITO: Imagen actualizada, sin embargo la imagen será revisada para ver si cumple con las reglas de Cikapp.<br>';
                                                            } else {
                                                                echo 'ERROR: Intentelo más tarde (imagen).<br>';
                                                            }
                                                        } else {
                                                            echo "Error al subir el archivo<br>";
                                                        }
                                                    } else {
                                                        echo $msg;
                                                    }
                                                }
                                                $test = $Obj_operaciones->editarUsuario($id, $nombre, $apellido, $apellidoM, $email, $skype, $COMUNA_ID, $experiencia, $areaInteres, $idIngles, $video, $tituloprof);
                                                if ($test) {
                                                    $_SESSION['nombre'] = $nombre;
                                                    $_SESSION['apellido'] = $apellido;
                                                    echo 'ÉXITO: Los datos del usuario han sido actualizados correctamente.<br>';
                                                } else {
                                                    echo 'ERROR: Intentelo más tarde (editar usuario).<br>';
                                                }
                                            } else {
                                                echo 'INFO: Las contraseñas no coinciden';
                                            }
                                        }
                                        ini_set("display_errors", 1);

                                        include 'include/conexion.php';

                                        $query = "SELECT * FROM usuario WHERE idUsuario={$id};";
                                        $resultado = $mysqli->query($query);
                                        while ($rows = $resultado->fetch_assoc()) {
                                            $nombre = $rows['nombre'];
                                            $apellido = $rows['apellido'];
                                            $apellidoM = $rows['apellidoM'];
                                            $email = $rows['email'];
                                            $skype = $rows['skype'];
                                            $COMUNA_IDusuario = $rows['COMUNA_ID'];
                                            $experiencia = $rows['experiencia'];
                                            $nivelIngles = $rows['idIngles'];
                                            $pass = $rows['password'];
                                            $rutaImagen = $rows['rutaImagen'];
                                            $areaInteres = $rows["areasInteres"];
                                            $video1 = $rows['video'];
                                            $tituloprof = $rows['tituloprof'];
                                        }
                                        ?>
        <div class="row">
         <div class="col-md-5">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
             <h3 class="box-title">Cambia tu foto</h3>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="text-info fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" role="form" action="" method="post" name="formDatos" enctype="multipart/form-data">
                                                <!-- left column -->
                                                
                                                    <div class="text-center">
                                                        <?php
                                                        if ($rutaImagen === "") {
                                                            echo '<img src="uploads/sinFoto.jpg" width="200" height="200" class="avatar img-circle img-thumbnail" alt="Foto" id="fotoUsuario" >';
                                                        } else {
                                                            echo "<img src='$rutaImagen' width='200' height='200' class='img-circle img-responsive img-thumbnail' alt='Foto' id='fotoUsuario'>";
                                                        }
                                                        ?>
                                                        <div class="alert alert-warning">
                                                            <i class="fa fa-folder-open"></i> Elige la foto desde tu equipo.
                                                        </div>
                                                        <input type="file" class="text-center well well-sm" name="uploadedfile" id="uploadedfile" accept="image/*">
                                                    </div>
                                                
             
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
        </div>
         <div class="col-md-7">
          <!-- Box Comment -->
          <div class="box box-widget collapsed-box">
            <div class="box-header with-border">
             <h3 class="box-title">Información personal</h3>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="text-info fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
<!-- form start -->
              <div class="box-body form-horizontal">
                <div class="form-group">
                                                            <label class="col-sm-5 control-label">Nombre:</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" value="<?php echo $nombre ?>" type="text" name="nombre">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Apellido paterno:</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" value="<?php echo $apellido ?>" type="text" name="apellido">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Apellido materno:</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" value="<?php echo $apellidoM ?>" type="text" name="apellidoM">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Correo electrónico:</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" value="<?php echo $email ?>" type="text" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Pais:</label>
                                                            <div class="col-sm-6">
                                                                <div class="ui-select">
                                                                    <select id="pais" class="form-control">
                                                                        <option value="Chile">Chile</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Región:</label>
                                                            <div class="col-sm-6">
                                                                <div class="ui-select">
                                                                    <select id="region" class="form-control">
                                                                        <?php
                                                                        require 'include/conexion.php';

                                                                        $query = "SELECT * FROM region";
                                                                        $resultado = $mysqli->query($query);
                                                                        $regionID = null;
                                                                        while ($rows = $resultado->fetch_assoc()) {
                                                                            $sql = "select REGION_ID from comuna a, provincia b, region c where COMUNA_PROVINCIA_ID = PROVINCIA_ID and PROVINCIA_REGION_ID = REGION_ID and COMUNA_ID=$COMUNA_IDusuario;";
                                                                            $resultado2 = $mysqli->query($sql);
                                                                            $selected = null;
                                                                            if ($resultado2 = $mysqli->query($sql)) {
                                                                                while ($rows2 = $resultado2->fetch_assoc()) {
                                                                                    if ($rows['REGION_ID'] == $rows2['REGION_ID']) {
                                                                                        $selected = "selected='selected'";
                                                                                        $regionID = $rows2['REGION_ID'];
                                                                                    }
                                                                                }
                                                                                print("<option value='" . $rows['REGION_ID'] . "' $selected>" . $rows['REGION_NOMBRE'] . "</option>");
                                                                            } else {
                                                                                print("<option value='" . $rows['REGION_ID'] . "'>" . $rows['REGION_NOMBRE'] . "</option>");
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Ciudad:</label>
                                                            <div class="col-sm-6">
                                                                <div class="ui-select">
                                                                    <select id="ciudad" class="form-control" name="COMUNA_ID">
                                                                        <?php
                                                                        require 'include/conexion.php';

                                                                        $query = "SELECT COMUNA_ID, COMUNA_NOMBRE FROM comuna, provincia, region where COMUNA_PROVINCIA_ID=provincia.PROVINCIA_ID and provincia.PROVINCIA_REGION_ID=region.REGION_ID and region.REGION_ID=$regionID;";
                                                                        if ($resultado = $mysqli->query($query)) {
                                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                                $selected = "";
                                                                                if ($rows['COMUNA_ID'] === $COMUNA_IDusuario) {
                                                                                    $selected = "selected='selected'";
                                                                                }
                                                                                print("<option value='" . $rows['COMUNA_ID'] . "' $selected>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                                                            }
                                                                        } else {
                                                                            print("<option>Seleccione una ciudad</option>");
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
              </div>
              <!-- /.box-body -->


                            
             
            <!-- /.box-body -->
            
          </div>
           <div class="box box-widget collapsed-box">
            <div class="box-header with-border">
             <h3 class="box-title">Información académica y laboral</h3>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="text-info fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
<!-- form start -->
              <div class="box-body form-horizontal">
                                                  <div class="form-group">
                                                            <label class="col-sm-5 control-label">Título profesional:</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" value="<?php echo $tituloprof ?>" type="text" name="tituloprof">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Áreas de intéres:</label>
                                                            <div class="col-sm-6">
                                                                <ul id="myTags" class="form-control input-lg">
                                                                    <!-- Existing list items will be pre-added to the tags -->
                                                                    <?php
                                                                    $areas = explode(",", $areaInteres);
                                                                    foreach ($areas as $area) {
                                                                        print "<li>" . $area . '</li>';
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Nivel de Ingles:</label>
                                                            <div class="col-sm-6">
                                                                <select id="ingles" class="form-control" name="idIngles">
                                                                    <?php
                                                                    require 'include/conexion.php';

                                                                    $query = "SELECT * FROM nivel_ingles";
                                                                    $resultado = $mysqli->query($query);
                                                                    $regionID = null;
                                                                    while ($rows = $resultado->fetch_assoc()) {
                                                                        $selected = null;
                                                                        if ($rows['idIngles'] === $nivelIngles) {
                                                                            $selected = "selected='selected'";
                                                                            $regionID = $rows2['REGION_ID'];
                                                                        }
                                                                        print("<option value='" . $rows['idIngles'] . "' $selected>" . $rows['Nivel'] . "</option>");
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Mi educación:</label>
                                                            <div class="col-sm-6">
                                                                <select id="txtEstudios" class="form-control" name="selEducacion">
                                                                    <?php
                                                                    require 'include/conexion.php';

                                                                    $query = "SELECT * FROM educacion;";
                                                                    $resultado = $mysqli->query($query);
                                                                    while ($rows = $resultado->fetch_assoc()) {
                                                                        $asf = $Obj_operaciones->comprobarUsuarioEducacion($id, $rows['educacion_id']);
                                                                        if ($asf) {
                                                                            print("<option value='" . $rows['educacion_id'] . "' selected='selected'>" . $rows['educacion_nombre'] . "</option>");
                                                                        } else {
                                                                            print("<option value='" . $rows['educacion_id'] . "' >" . $rows['educacion_nombre'] . "</option>");
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label class="col-sm-5 control-label">Experiencia laboral:</label>
                                                            <div class="col-sm-6">
                                                                <select id="experiencia" class="form-control" name="experiencia">
                                                                    <option value="Sin experiencia">Sin experiencia</option>
                                                                    <option value="1 a 3 años" <?php
                                                                    if ($experiencia == "1 a 3 años") {
                                                                        echo "selected";
                                                                    }
                                                                    ?> >1 a 3 años</option>
                                                                    <option value="4 a 6 años" <?php
                                                                    if ($experiencia == "4 a 6 años") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>4 a 6 años</option>
                                                                    <option value="7 a 9 años" <?php
                                                                            if ($experiencia == "7 a 9 años") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>7 a 9 años</option>
                                                                    <option value="Más de 10 años" <?php
                                                                            if ($experiencia == "Más de 10 años") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>Más de 10 años</option>
                                                                </select>
                                                                </ul>
                                                            </div>
                                                        </div>
          
              </div>
              <!-- /.box-body -->


                            
             
            <!-- /.box-body -->
            
          </div>
            <div class="box box-widget collapsed-box">
            <div class="box-header with-border">
             <h3 class="box-title">Información opcional</h3>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="text-info fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body form-horizontal">
                                                            <div class="form-group">
                                                            <label class="col-sm-5 control-label">Skype name:</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" value="<?php echo $skype ?>" type="text" name="skype">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Video de presentación: (URL de youtube) <a href="#" title="Info" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Actualmente solo aceptamos videos provenientes de youtube"></a></label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" value="<?php echo "https://www.youtube.com/watch?v=$video1"; ?>" type="text" name="video" id="video">
                                                                <br/>
                                                                <label class="lblVideo">Ej: https://www.youtube.com/watch?v=0vrdgDdPApQ</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
    <?php
    if ($video1 === NULL) {
        echo '<iframe id="ifrmVideo" class="" src="" frameborder="0" ></iframe>';
    } else {
        echo "<iframe id='ifrmVideo' class='full-video' src='https://www.youtube.com/embed/$video1' frameborder='0' ></iframe>";
    }
    ?>
                                                        </div>
                                                   
                                                    
                                                    </div>                                      
             
            </div>
            <!-- /.box-body -->
              <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                                                     <p class="col-md-11">Para que los cambios se apliquen debes ingresar tu contraseña en los campos que se encuentran a continuación.</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-5 control-label">Contraseña:</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" value="" type="password" name="pwd1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-5 control-label">Confirmar contraseña:</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" value="" type="password" name="pwd2">
                                                        </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-5 control-label"></label>
                                                        <div class="col-sm-6">
                                                            
                                                        </div>
                                                    </div> 
                                                       
           </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input class="btn btn-default" value="Cancelar" type="reset">
               <input class="btn btn-info pull-right" value="Guardar cambios" type="submit">
            </form>
               
              </div>
              <!-- /.box-footer -->
                
                
                                             
                                                   
           
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
           
           
       </div>          
                                           
                                        
                                    
                              
                            
                        
<?php }
?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<?php include 'structure/footer.panel.php'; ?>