<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';
require './ajax.class.php';

if (isset($_POST['txtRut'])) {
    $rut = filter_input(INPUT_POST, "txtRut");
    $query = "SELECT rut FROM usuario WHERE rut='{$rut}';";
    $resultado = $mysqli->query($query);
    while ($rows = $resultado->fetch_assoc()) {
        if (count($rows) != 0) {
            echo TRUE;
            die();
        }
    }
    echo FALSE;
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "select c.COMUNA_ID,c.COMUNA_NOMBRE from region a,provincia b, comuna c WHERE b.PROVINCIA_REGION_ID=a.REGION_ID AND  c.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID AND b.PROVINCIA_REGION_ID='{$id}';";
    $resultado = $mysqli->query($query);
    while ($row = $resultado->fetch_assoc()) {
        $id = $row['COMUNA_ID'];
        $data = $row['COMUNA_NOMBRE'];

        echo '<option value="' . $id . '">' . $data . '</option>';
    }
}elseif(isset($_GET['filtro-persona']) && isset ($_GET['idU'])){
 
    $idU = $_GET['idU'];
    $cadAux;
    $row_cnt = 0;
    $cadFin;
    $idUsuarioRep;
    $unico = TRUE;
    $usuarioRepetido = FALSE;
    $cuantosChecked = 0;
    
    if (isset($_GET['Con'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorConocimientos($_GET['Con']);
        $usuarios = explode("--", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario} and idUsuario <> {$idU}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Est'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorEstudios($_GET['Est']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario} and idUsuario<>{$idU}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Nvi'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorNivelDeIngles($_GET['Nvi']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario} and idUsuario<>{$idU}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Reg'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorRegion($_GET['Reg']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario} and idUsuario<>{$idU}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Ciu'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorCiudad($_GET['Ciu']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario} and idUsuario<>{$idU}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($idUsuarioRep)) {
        $longitud = count($idUsuarioRep);
        if (!$unico) {
            $repetidos = 0;

            for ($i = 0; $i < $longitud; $i++) {
                $counter = 1;
                for ($j = 0; $j < $i; $j++) {
                    if ($idUsuarioRep[$j] === $idUsuarioRep[$i]) {
                        $counter++;
                        $usuarioRepetido = TRUE;
                    }
                }

                if ($counter > 1) {
                    $repetidos++;
                    if ($counter === $cuantosChecked) {
                        $sql = "SELECT * FROM usuario WHERE idUsuario={$idUsuarioRep[$i]} and idUsuario<>{$idU}";
                        if ($result = $mysqli->query($sql)) {
                            while ($rows = $result->fetch_assoc()) {
                                $idUsuario = $rows['idUsuario'];
                                $intereses = $rows['areasInteres'];
                                $nombre = $rows['nombre'];
                                $apellido = $rows['apellido'];
                                $apellidoM = $rows['apellidoM'];
                                $email = $rows['email'];
                                $skype = $rows['skype'];
                                $image = $rows['rutaImagen'];
                                $comuna_ID = $rows['COMUNA_ID'];
                                $locacion ="";
                            $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                            }
                                
                                echo "
                                         <div class='row'>
           <div class='col-md-12'>
                              <!-- About Me Box4 -->
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'></h3>
              <div class='box-tools pull-right'>
                <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
            </div>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
             <!-- Widget: user widget style 1 -->
          <div class='box box-widget widget-user-2'>
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class='widget-user-header bg-primary'>
              <div class='widget-user-image'>
                <img class='img-circle' src='{$image}' alt='User Avatar'>
              </div>
              <!-- /.widget-user-image -->
              <h3 class='widget-user-username'>{$nombre} {$apellido} {$apellidoM}</h3>
              <h4 class='widget-user-desc'>Email: {$email}</h4>
            </div>
            <div class='box-footer'>
              <div class='row'>
                <div class='col-sm-5 border-right'>
                 
                    <h5 class='description-header'><strong><i class='fa fa-book margin-r-5'></i> Áreas de interés</strong></h5>
                    <span class='description-text'>
                     <p class='align-left text-muted'>{$intereses}</p>
                  </span>
                </div>
                <!-- /.col -->
                <div class='col-sm-4 border-right'>
                  
                    <h5 class='description-header'><strong><i class='fa fa-map-marker margin-r-5'></i> Ubicación</strong></h5>
                    <span class='description-text'><p class='text-muted'>{$locacion}</p></span>
                 
                </div>
                <!-- /.col -->
                <div class='col-sm-3'>
<a class='btn btn-sm btn-info btn-flat' href='mensajes.php?usuario={$idUsuario}'   role='button' title='Enviar mensaje'><i class='fa fa-envelope'></i> Mensaje</a>
                <a class='btn btn-sm btn-warning btn-flat' href='persona.php?id={$idUsuario}' role='button' title='Ver perfil'><i class='fa fa-user'></i> Perfil</a>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             </div>
           </div>

                                
               ";
                            }
                        }
                    } else {
                        $repetidos = 0;
                    }
                }
            }
            if ($repetidos !== 0) {
                echo "<h3>Hemos encontrado <span class='badge'>{$repetidos}</span> resultados.</h3>";
            } else {
                echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
            }
        } else {
            if (!$usuarioRepetido) {
                foreach ($idUsuarioRep as $usuario) {
                    $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario} and idUsuario<>{$idU}";
                    if ($result = $mysqli->query($sql)) {
                        while ($rows = $result->fetch_assoc()) {
                            $idUsuario = $rows['idUsuario'];
                            $intereses = $rows['areasInteres'];
                            $nombre = $rows['nombre'];
                            $apellido = $rows['apellido'];
                            $apellidoM = $rows['apellidoM'];
                            $email = $rows['email'];
                            $skype = $rows['skype'];
                            $image = $rows['rutaImagen'];
                            $locacion ="";
                            $comuna_ID = $rows['COMUNA_ID'];
                            $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                            }


                            echo "
                            <div class='row'>
           <div class='col-md-12'>
                              <!-- About Me Box3 -->
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'></h3>
              <div class='box-tools pull-right'>
                <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
            </div>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
             <!-- Widget: user widget style 1 -->
          <div class='box box-widget widget-user-2'>
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class='widget-user-header bg-primary'>
              <div class='widget-user-image'>
                <img class='img-circle' src='{$image}' alt='User Avatar'>
              </div>
              <!-- /.widget-user-image -->
              <h3 class='widget-user-username'>{$nombre} {$apellido} {$apellidoM}</h3>
              <h4 class='widget-user-desc'>Email: {$email}</h4>
            </div>
            <div class='box-footer'>
              <div class='row'>
                <div class='col-sm-5 border-right'>
                 
                    <h5 class='description-header'><strong><i class='fa fa-book margin-r-5'></i> Áreas de interés</strong></h5>
                    <span class='description-text'>
                    <p class='align-left text-muted'>{$intereses}</p>
              </span>
                </div>
                <!-- /.col -->
                <div class='col-sm-4 border-right'>
                  
                    <h5 class='description-header'><strong><i class='fa fa-map-marker margin-r-5'></i> Ubicación</strong></h5>
                    <span class='description-text'><p class='text-muted'>{$locacion}</p></span>
                 
                </div>
                <!-- /.col -->
                <div class='col-sm-3'>

                    <a class='btn btn-sm btn-info btn-flat' href='mensajes.php?usuario={$idUsuario}'   role='button' title='Enviar mensaje'><i class='fa fa-envelope'></i> Mensaje</a>
                <a class='btn btn-sm btn-warning btn-flat' href='persona.php?id={$idUsuario}' role='button' title='Ver perfil'><i class='fa fa-user'></i> Perfil</a>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             </div>
           </div>
                            
               ";
                        }
                    }
                }
                $cantidadDeResultados = count($idUsuarioRep);
                if ($cantidadDeResultados !== 0) {
                    echo "<h3>Hemos encontrado <span class='badge'>{$cantidadDeResultados}</span> resultados.</h3>";
                } else {
                    echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
                }
            } else {
                echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
            }
        }
    } else {
        echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
    }
    
    
}elseif (isset($_GET['Con']) || isset($_GET['Est']) || isset($_GET['Nvi']) || isset($_GET['Reg']) || isset($_GET['Ciu'])) {

    $cadAux;
    $row_cnt = 0;
    $cadFin;
    $idUsuarioRep;
    $unico = TRUE;
    $usuarioRepetido = FALSE;
    $cuantosChecked = 0;
    if (isset($_GET['Con'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorConocimientos($_GET['Con']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
            if (!isset($idUsuarioRep)) {
                echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
                exit();
            }
        }
    }
    if (isset($_GET['Est'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorEstudios($_GET['Est']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Nvi'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorNivelDeIngles($_GET['Nvi']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Reg'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorRegion($_GET['Reg']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($_GET['Ciu'])) {
        $cuantosChecked++;
        if (isset($idUsuarioRep)) {
            $unico = FALSE;
        }
        $ajax = new SelectFiltro();
        $explode = $ajax->traerPorCiudad($_GET['Ciu']);
        $usuarios = explode(" ", $explode);
        foreach ($usuarios as $usuario) {

            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
            if ($result = $mysqli->query($sql)) {
                while ($rows = $result->fetch_assoc()) {
                    $idUsuarioRep[] = $rows['idUsuario'];
                }
            }
        }
    }
    if (isset($idUsuarioRep)) {
        $longitud = count($idUsuarioRep);
        if (!$unico) {
            $repetidos = 0;

            for ($i = 0; $i < $longitud; $i++) {
                $counter = 1;
                for ($j = 0; $j < $i; $j++) {
                    if ($idUsuarioRep[$j] === $idUsuarioRep[$i]) {
                        $counter++;
                        $usuarioRepetido = TRUE;
                    }
                }

                if ($counter > 1) {
                    $repetidos++;
                    if ($counter === $cuantosChecked) {
                        $sql = "SELECT * FROM usuario WHERE idUsuario={$idUsuarioRep[$i]}";
                        if ($result = $mysqli->query($sql)) {
                            while ($rows = $result->fetch_assoc()) {
                                $idUsuario = $rows['idUsuario'];
                                $intereses = $rows['areasInteres'];
                                $nombre = $rows['nombre'];
                                $apellido = $rows['apellido'];
                                $apellidoM = $rows['apellidoM'];
                                $email = $rows['email'];
                                $skype = $rows['skype'];
                                $image = $rows['rutaImagen'];
                                $comuna_ID = $rows['COMUNA_ID'];
                                $locacion ="";
                            $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                            }
                                
                                echo "
                                         <div class='row'>
           <div class='col-md-12'>
                              <!-- About Me Box2 -->
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'></h3>
              <div class='box-tools pull-right'>
                <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
            </div>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
             <!-- Widget: user widget style 1 -->
          <div class='box box-widget widget-user-2'>
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class='widget-user-header bg-primary'>
              <div class='widget-user-image'>
                <img class='img-circle' src='{$image}' alt='User Avatar'>
              </div>
              <!-- /.widget-user-image -->
              <h3 class='widget-user-username'>{$nombre} {$apellido} {$apellidoM}</h3>
              <h4 class='widget-user-desc'>Email: {$email}</h4>
            </div>
            <div class='box-footer'>
              <div class='row'>
                <div class='col-sm-5 border-right'>
                 
                    <h5 class='description-header'><strong><i class='fa fa-book margin-r-5'></i> Áreas de interés</strong></h5>
                    <span class='description-text'>
                     <p class='align-left text-muted'>{$intereses}</p>
                  </span>
                </div>
                <!-- /.col -->
                <div class='col-sm-4 border-right'>
                  
                    <h5 class='description-header'><strong><i class='fa fa-map-marker margin-r-5'></i> Ubicación</strong></h5>
                    <span class='description-text'><p class='text-muted'>{$locacion}</p></span>
                 
                </div>
                <!-- /.col -->
                <div class='col-sm-3'>

                    <h5 class='description-header'><strong><i class='fa fa-skype margin-r-5'></i> Skype</strong></h5>
                    <span class='description-text'><p class='text-muted'>{$skype}</p></span>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             </div>
           </div>

                                
               ";
                            }
                        }
                    } else {
                        $repetidos = 0;
                    }
                }
            }
            if ($repetidos !== 0) {
                echo "<h3>Hemos encontrado <span class='badge'>{$repetidos}</span> resultados.</h3>";
            } else {
                echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
            }
        } else {
            if (!$usuarioRepetido) {
                foreach ($idUsuarioRep as $usuario) {
                    $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
                    if ($result = $mysqli->query($sql)) {
                        while ($rows = $result->fetch_assoc()) {
                            $idUsuario = $rows['idUsuario'];
                            $intereses = $rows['areasInteres'];
                            $nombre = $rows['nombre'];
                            $apellido = $rows['apellido'];
                            $apellidoM = $rows['apellidoM'];
                            $email = $rows['email'];
                            $skype = $rows['skype'];
                            $image = $rows['rutaImagen'];
                            $locacion ="";
                            $comuna_ID = $rows['COMUNA_ID'];
                            $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                            }


                            echo "
                            <div class='row'>
           <div class='col-md-12'>
                              <!-- About Me Box1 -->
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'></h3>
              <div class='box-tools pull-right'>
                <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
            </div>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
             <!-- Widget: user widget style 1 -->
          <div class='box box-widget widget-user-2'>
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class='widget-user-header bg-primary'>
              <div class='widget-user-image'>
                <img class='img-circle' src='{$image}' alt='User Avatar'>
              </div>
              <!-- /.widget-user-image -->
              <h3 class='widget-user-username'>{$nombre} {$apellido} {$apellidoM}</h3>
              <h4 class='widget-user-desc'>Email: {$email}</h4>
            </div>
            <div class='box-footer'>
              <div class='row'>
                <div class='col-sm-5 border-right'>
                 
                    <h5 class='description-header'><strong><i class='fa fa-book margin-r-5'></i> Áreas de interés</strong></h5>
                    <span class='description-text'>
                    <p class='align-left text-muted'>{$intereses}</p>
              </span>
                </div>
                <!-- /.col -->
                <div class='col-sm-4 border-right'>
                  
                    <h5 class='description-header'><strong><i class='fa fa-map-marker margin-r-5'></i> Ubicación</strong></h5>
                    <span class='description-text'><p class='text-muted'>{$locacion}</p></span>
                 
                </div>
                <!-- /.col -->
                <div class='col-sm-3'>

                    <h5 class='description-header'><strong><i class='fa fa-skype margin-r-5'></i> Skype</strong></h5>
                    <span class='description-text'><p class='text-muted'>{$skype}</p></span>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             </div>
           </div>
                            
               ";
                        }
                    }
                }
                $cantidadDeResultados = count($idUsuarioRep);
                if ($cantidadDeResultados !== 0) {
                    echo "<h3>Hemos encontrado <span class='badge'>{$cantidadDeResultados}</span> resultados.</h3>";
                } else {
                    echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
                }
            } else {
                echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
            }
        }
    } else {
        echo "<p>No hemos encontrado resultados. Busque con otros parámetros.</p>";
    }
}elseif (isset($_POST['Con']) || isset($_POST['cargo']) || isset($_POST['Reg']) || isset($_POST['Ciu'])) {
    if ($_POST['es'] == "persona") {
        $cadAux;
        $row_cnt = 0;
        $cadFin;
        $idAvisoRep;
        $unico = TRUE;
        $avisoRepetido = FALSE;
        $cuantosChecked = 0;
        if (isset($_POST['Con'])) {
            $cuantosChecked++;
            if (isset($idAvisoRep)) {
                $unico = FALSE;
            }
            $ajax = new SelectFiltro();
            $explode = $ajax->traerAvisoPorConocimientos($_POST['Con']);
            $avisos = explode(" ", $explode);
            foreach ($avisos as $aviso) {

                $sql = "SELECT * FROM publicaciones WHERE id={$aviso}";
                if ($result = $mysqli->query($sql)) {
                    while ($rows = $result->fetch_assoc()) {
                        $idAvisoRep[] = $rows['id'];
                    }
                }
//            if (!isset($idAvisoRep)) {
//                echo "0";
//                exit();
//            }
            }
        }
        if (isset($_POST['cargo'])) {
            $cuantosChecked++;
            if (isset($idAvisoRep)) {
                $unico = FALSE;
            }
            $ajax = new SelectFiltro();
            $explode = $ajax->traerAvisoPorCargo($_POST['cargo']);
            $avisos = explode(" ", $explode);
            foreach ($avisos as $aviso) {

                $sql = "SELECT * FROM publicaciones WHERE id={$aviso}";
                if ($result = $mysqli->query($sql)) {
                    while ($rows = $result->fetch_assoc()) {
                        $idAvisoRep[] = $rows['id'];
                    }
                }
            }
        }
//    if (isset($_GET['Nvi'])) {
//        $cuantosChecked++;
//        if (isset($idAvisoRep)) {
//            $unico = FALSE;
//        }
//        $ajax = new SelectFiltro();
//        $explode = $ajax->traera($_GET['Nvi']);
//        $usuarios = explode(" ", $explode);
//        foreach ($usuarios as $usuario) {
//
//            $sql = "SELECT * FROM usuario WHERE idUsuario={$usuario}";
//            if ($result = $mysqli->query($sql)) {
//                while ($rows = $result->fetch_assoc()) {
//                    $idUsuarioRep[] = $rows['idUsuario'];
//                }
//            }
//        }
//    }
        if (isset($_POST['Reg'])) {
            $cuantosChecked++;
            if (isset($idAvisoRep)) {
                $unico = FALSE;
            }
            $ajax = new SelectFiltro();
            $explode = $ajax->traerAvisoPorRegion($_POST['Reg']);
            $avisos = explode(" ", $explode);
            foreach ($avisos as $aviso) {

                $sql = "SELECT * FROM publicaciones WHERE id={$aviso}";
                if ($result = $mysqli->query($sql)) {
                    while ($rows = $result->fetch_assoc()) {
                        $idAvisoRep[] = $rows['id'];
                    }
                }
            }
        }
        if (isset($_POST['Ciu'])) {
            $cuantosChecked++;
            if (isset($idAvisoRep)) {
                $unico = FALSE;
            }
            $ajax = new SelectFiltro();
            $explode = $ajax->traerAvisoPorCiudad($_POST['Ciu']);
            $avisos = explode(" ", $explode);
            foreach ($avisos as $aviso) {

                $sql = "SELECT * FROM publicaciones WHERE id={$aviso}";
                if ($result = $mysqli->query($sql)) {
                    while ($rows = $result->fetch_assoc()) {
                        $idAvisoRep[] = $rows['id'];
                    }
                }
            }
        }
        if (isset($idAvisoRep)) {
            $longitud = count($idAvisoRep);
            if (!$unico) {
                $repetidos = 0;

                for ($i = 0; $i < $longitud; $i++) {
                    $counter = 1;
                    for ($j = 0; $j < $i; $j++) {
                        if ($idAvisoRep[$j] === $idAvisoRep[$i]) {
                            $counter++;
                            $avisoRepetido = TRUE;
                        }
                    }

                    if ($counter > 1) {
                        $repetidos++;
                        if ($counter === $cuantosChecked) {
                            $sql = "SELECT * FROM publicaciones WHERE id={$idAvisoRep[$i]}";
                            if ($result = $mysqli->query($sql)) {
                                while ($rows = $result->fetch_assoc()) {
                                    $id = $rows['id'];
                                    $cargo = $rows['cargo'];
                                    $contrato = $rows['tipo_contrato'];
                                    $jornada = $rows['tipo_jornada'];
                                    $fechaInicio = $rows['fecha_inicio'];
                                    $descripcion = $rows['publicacion'];
                                    $fechaPublicacion = $rows['fecha_publicacion'];
                                    $experiencia = $rows['anios_experiencia'];
                                    $comuna_ID = $rows['COMUNA_ID'];
                                    $desempenio = $rows['area_desempenio'];
                                    $locacion = "";
                                    $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                                    $resultado = $mysqli->query($query);
                                    while ($rows = $resultado->fetch_assoc()) {
                                        $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                                    }

                                    echo "<div class='col-md-6'>
	<!-- Box Comment -->
	<div class='box box-widget'>
		<div class='box-header with-border'>
			<div class='user-block'> <img class='img-circle' src='uploads/sinFoto.png' alt='Logo empresa'> <span class='username'><a href='avisos.php?accion=leer&id={$id}' data-toggle='tooltip' title='Leer Aviso &numero; {$id}'>{$cargo}</a></span> <span class='description'>";
                                    echo substr($fechaPublicacion, 0, 10); //fecha_publicacion 
?>
                                    <?php

                                    echo "</span> <span class='description'>{$descripcion}</span></div>
			<!-- /.user-block -->
			<div class='box-tools'>
				<a href='javascript:guardaAviso({$id});' type='button' class='btn btn-box-tool' data-toggle='tooltip' title='Guardar'> <i class='fa fa-heart text-red'></i></a>
				<button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i> </button>
				<button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
			</div>
			<!-- /.box-tools -->
		</div>
		<!-- /.box-header -->
		<div class='box-body'>
			<!-- post text -->
			<div class='box-comment'>
				<div class='box-footer box-comments'>
					<div class='box-comment'> <span class='username'>
                        Àrea
                        <span class='text-muted pull-right'>{$desempenio}</span> </span>
<span class='username'>
                        Ubicación
                        <span class='text-muted pull-right'>{$locacion}</span> </span>
<span class='username'>
                        Experiencia
                        <span class='text-muted pull-right'>{$experiencia}</span> </span>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>";
                                }
                            }
                        } else {
                            $repetidos = 0;
                        }
                    }
                }
                if ($repetidos !== 0) {
                    echo "<div class='col-md-12'><h3>Hemos encontrado <span class='badge'>{$repetidos}</span> resultados.</h3></div>";
                } else {
                    echo "<div class='callout callout-danger lead'>
    <h4>Lo sentimos</h4>
    <p>
      No hemos encontrado avisos para los parametros de busca.    </p>
  </div>";
                }
            } else {
                if (!$avisoRepetido) {
                    foreach ($idAvisoRep as $aviso) {
                        $sql = "SELECT * FROM publicaciones WHERE id={$aviso}";
                        if ($result = $mysqli->query($sql)) {
                            while ($rows = $result->fetch_assoc()) {
                                $id = $rows['id'];
                                $cargo = $rows['cargo'];
                                $contrato = $rows['tipo_contrato'];
                                $jornada = $rows['tipo_jornada'];
                                $fechaInicio = $rows['fecha_inicio'];
                                $descripcion = $rows['publicacion'];
                                $fechaPublicacion = $rows['fecha_publicacion'];
                                $experiencia = $rows['anios_experiencia'];
                                $comuna_ID = $rows['COMUNA_ID'];
                                $desempenio = $rows['area_desempenio'];
                                $locacion = "";
                                $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                                $resultado = $mysqli->query($query);
                                while ($rows = $resultado->fetch_assoc()) {
                                    $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                                }
                                echo "<div class='col-md-6'>
	<!-- Box Comment -->
	<div class='box box-widget'>
		<div class='box-header with-border'>
			<div class='user-block'> <img class='img-circle' src='uploads/sinFoto.png' alt='Logo empresa'> <span class='username'><a href='avisos.php?accion=leer&id={$id}' data-toggle='tooltip' title='Leer Aviso &numero; {$id}'>{$cargo}</a></span> <span class='description'>";
                                echo substr($fechaPublicacion, 0, 10); //fecha_publicacion 
                                    ?>
                                <?php

                                echo "</span> <span class='description'>{$descripcion}</span></div>
			<!-- /.user-block -->
			<div class='box-tools'>
				<a href='javascript:guardaAviso({$id});' type='button' class='btn btn-box-tool' data-toggle='tooltip' title='Guardar'> <i class='fa fa-heart text-red'></i></a>
				<button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i> </button>
				<button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
			</div>
			<!-- /.box-tools -->
		</div>
		<!-- /.box-header -->
		<div class='box-body'>
			<!-- post text -->
			<div class='box-comment'>
				<div class='box-footer box-comments'>
					<div class='box-comment'> <span class='username'>
                        Àrea
                        <span class='text-muted pull-right'>{$desempenio}</span> </span>
<span class='username'>
                        Ubicación
                        <span class='text-muted pull-right'>{$locacion}</span> </span>
<span class='username'>
                        Experiencia
                        <span class='text-muted pull-right'>{$experiencia}</span> </span>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>";
                            }
                        }
                    }
                    $cantidadDeResultados = count($idAvisoRep);
                    if ($cantidadDeResultados !== 0) {
                        echo "<div class='col-md-12'><h3>Hemos encontrado <span class='badge'>{$cantidadDeResultados}</span> resultados.</h3></div>";
                    } else {
                        echo "<div class='callout callout-danger lead'>
    <h4>Lo sentimos</h4>
    <p>
      No hemos encontrado avisos para los parametros de busca.    </p>
  </div>";
                    }
                } else {
                    echo "<div class='callout callout-danger lead'>
    <h4>Lo sentimos</h4>
    <p>
      No hemos encontrado avisos para los parametros de busca.    </p>
  </div>";
                }
            }
        } else {
            echo "<div class='callout callout-danger lead'>
    <h4>Lo sentimos</h4>
    <p>
      No hemos encontrado avisos para los parametros de busca.    </p>
  </div>";
        }
    } else {
        
    }
}