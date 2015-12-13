<?php
require 'structure/navbar.panel.php';
require 'structure/avisos.class.php';
$obj_publicacion = new publicacion();
$obj_trabajo = new trabajos();
?>
<section class="content">
    <div class="container-fluid">
        <?php
        if ($_GET['accion'] == 'postulantes') {
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header"><a href="avisos.php?accion=nuevo" class="btn btn-primary pull-right" data-toggle="tooltip" title="Agregar un Nuevo Aviso de Trabajo"><b>+</b> Nuevo Aviso</a>
                            <h4 class="box-title">Últimos Avisos Publicados</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table  class="table table-hover table-striped">
                                <thead>
                                <th>Cargo</th>
                                <th>Descripcion</th>
                                <th>Contrato</th>
                                <th>Jornada laboral</th>                            
                                <th>Tipo</th>   
                                <th>Ciudad</th>
                                <th>Años experiencia</th>
                                <th>Area desempeño</th>
                                <th>Fecha inicio</th>
                                <th>Publicado el</th>
                                <th>Acciones</th>
                                </thead>
                                <?php
                                $resultado = $obj_publicacion->obtienePublicacionesDeEmpresa($rut);
                                ?>
                                <?php
                                while ($var_publicaciones = mysqli_fetch_assoc($resultado)) {
                                    ?>
                                    <tr>
                                        <td>

                                            <?php echo $var_publicaciones['cargo'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones['publicacion'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones['tipo_contrato'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones['tipo_jornada'];
                                            ?>
                                        </td>                                       
                                        <td>
                                            <?php echo $var_publicaciones['tipo_publicacion'];
                                            ?>
                                        </td>

                                        <td>
                                            <?php echo $var_publicaciones['COMUNA_NOMBRE'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones['anios_experiencia'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones['area_desempenio'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones['fecha_inicio'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones['fecha_publicacion'];
                                            ?>
                                        </td>

                                        <td><button href="" class="btn btn-info btn-xs btn-dinamico" value="<?php echo $var_publicaciones['id'] ?>" cargo="<?php echo $var_publicaciones['cargo'] ?>" title="Ver que personas postularon a este aviso" data-toggle="modal" data-target="#myModal"><span class="fa fa-pencil fa-eye"></span> Ver postulantes</button>&nbsp;

                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            <!--
          //////////////////////////////////////////
                            -->
                            <div id="myModal<?php echo $var_publicaciones['id'] ?>" class="modal">
                                <div  class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Estos son los los postulantes para el cargo de <span id="cargo"></span></h4>
                                        </div>
                                        <div id="resp" class="modal-body">
                                            
                                            
                                              
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!--
                            //////////////////////////////////////////
                            -->

                        </div>
                    </div>
                </div>
            </div>


        <?php
        } elseif ($_GET['accion'] == 'editar') {
            $var_publicacion = $obj_publicacion->obtieneUnaPublicacion($_GET['id'], $rut);
            ?>
            <div>
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Editar Aviso &numero; <?php echo $var_publicacion[0][0]; ?></h4> </div>
                    <div class="content">
                        <form method="post" action="avisos.php">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" class="form-control" name="nombreCargo" required value="<?php echo $var_publicacion[0][1]; ?>" placeholder="Nombre Puesto o Cargo del Trabajo"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Úbicacion</label>
                                        <select id="txtCiudad" class="form-control" required name="COMUNA_ID">
                                            <option value="">Seleccione...</option>
    <?php
    require 'include/conexion.php';
    $query = "SELECT * FROM comuna ORDER BY COMUNA_NOMBRE";
    $resultado = $mysqli->query($query);
    while ($rows = $resultado->fetch_assoc()) {
        $esta = "";
        if ($rows['COMUNA_ID'] == $var_publicacion[0][8])
            $esta = "selected";
        print("<option " . $esta . " value='" . $rows['COMUNA_ID'] . "' >" . $rows['COMUNA_NOMBRE'] . "</option>");
    }
    ?>
                                        </select> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo de Contrato</label>
                                        <select name="tipoContrato" reqired class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="1">A Plazo Fijo </option>
                                            <option value="2">A Plazo Indefinido</option>
                                            <option value="3">Por Faena</option>
                                        </select> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Tipo de Jornada Laboral</label>
                                        <select name="tipoJornadaLaboral" required class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="1">Free lance</option>
                                            <option value="2">Part time (20 hrs semanales)</option>
                                            <option value="3">Part time (30 hrs semanales)</option>
                                            <option value="4">Full time (45 ó mas horas semanales)</option>
                                        </select> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha de Inicio </label>
                                        <input type="datetime-local" class="form-control" name="fechaInicio" step="1" min="<?php echo date("Y-m-d\TH:i:s"); ?>" max="<?php echo date("Y-m-d\TH:i:s", strtotime("+3 years")); ?>" required value="<?php echo date("Y-m-d\TH:i:s"); ?>"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo del Plan</label>
                                        <select name="tipoPublicacion" required class="form-control">
    <?php
    $planes = array(1 => 'A', 'AA', 'AAA', 'Nicho');
    foreach ($planes as $i => $plan) {
        echo '<option value="' . $planes[$i] . '"';
        if ($var_publicacion[0][6] == $planes[$i]) {
            echo " selected";
        }
        echo ">$planes[$i]</option>";
    }
    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Años de Experiencia</label>
                                        <select name="aniosExperiencia" required class="form-control">
                                             <option value="">Seleccione...</option>
                                            <option value="1">1 a 3 años</option>
                                            <option value="2">4 a 6 años</option>
                                            <option value="3">7 a 9 años</option>
                                            <option value="4">Más de 10 años</option>
                                        </select> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Área de Desempeño</label>
                                        <select name="areaDesempenio" required class="form-control"><option value="">Seleccione...</option><?php
                                        $areas = array(1 => 'Actividades profesionales científicas y técnicas', 'Acuícula y pesquero', 'Administración pública', 'Agrícola y ganadero', 'Arte, entretenimiento y recreación', 'Comercio', 'Contrucción', 'Educación', 'Elaboración de alimentos y bebidas', 'Gastronomía hotelería y turismo', 'Información y comunicaciones', 'Manufactura metálica', 'Manufactura no metálica', 'Minería metálica', 'Minería no metálica', 'Servicios para el hogar', 'Servicios de salud y asistencia social', 'Suministro de gas electricidad y agua', 'Transporte y logística');
                                        foreach ($areas as $i => $area) {
                                            echo '<option ';
                                            if ($var_publicacion[0][10] == $areas[$i]) {
                                                echo "selected ";
                                            }
                                            echo 'value="' . $areas[$i] . '">' . $areas[$i] . '</option>';
                                        }
    ?></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Publicación</label>
                                        <textarea RNAMEows="" 5="publicacion" class="form-control" name="publicacion" required placeholder="Descripcion breve y funciones"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="pass" class="form-control" required placeholder="Clave"> </div>
                                </div>
                            </div>
                            <input type="hidden" name="accion" value="actualizar" />
                            <input type="hidden" name="id" value="<?php echo $var_publicacion[0][0]; ?>" />
                            <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar Aviso</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
    <?php
} else if ($_GET['accion'] == 'eliminar') {
    try {
        $obj_publicacion->eliminarPublicacion($_GET['id'], $rut);
    } catch (Exception $e) {
        echo "Se ha producido un error : " . $e->getMessage();
    }
    echo "La Publicacion " . $_GET['id'] . " ha sido eliminada";
} else if ($_GET['accion'] == 'nuevo') {
    ?>
            <div>
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Agregar Aviso</h4> </div>
                    <div class="content">
                        <form method="post" action="avisos.php">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" class="form-control" name="nombreCargo" required placeholder="Nombre Puesto o Cargo del Trabajo"> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Úbicacion</label>
                                        <select id="txtCiudad" class="form-control" required name="COMUNA_ID">
                                            <option value="">Seleccione...</option>
    <?php
    require 'include/conexion.php';
    $query = "SELECT * FROM comuna ORDER BY COMUNA_NOMBRE";
    $resultado = $mysqli->query($query);
    while ($rows = $resultado->fetch_assoc()) {
        print("<option value='" . $rows['COMUNA_ID'] . "'>" . $rows['COMUNA_NOMBRE'] . "</option>");
    }
    ?>
                                        </select> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo de Contrato</label>
                                        <select name="tipoContrato" reqired class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="1">A Plazo Fijo </option>
                                            <option value="2">A Plazo Indefinido</option>
                                            <option value="3">Por Faena</option>
                                        </select> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Tipo de Jornada Laboral</label>
                                        <select name="tipoJornadaLaboral" required class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="1">Free lance</option>
                                            <option value="2">Part time (20 hrs semanales)</option>
                                            <option value="3">Part time (30 hrs semanales)</option>
                                            <option value="4">Full time (45 ó mas horas semanales)</option>
                                        </select> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha de Inicio </label>
                                        <input type="datetime-local" class="form-control" name="fechaInicio" step="1" min="<?php echo date("Y-m-d\TH:i:s"); ?>" max="<?php echo date("Y-m-d\TH:i:s", strtotime("+3 years")); ?>" required value="<?php echo date("Y-m-d\TH:i:s"); ?>"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo del Plan</label>
                                        <select name="tipoPublicacion" required class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option>A</option>
                                            <option>AA</option>
                                            <option>AAA</option>
                                            <option>Nicho</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Años de Experiencia</label>
                                        <select name="aniosExperiencia" required class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="1">1 a 3 años</option>
                                            <option value="2">4 a 6 años</option>
                                            <option value="3">7 a 9 años</option>
                                            <option value="4">Más de 10 años</option>
                                        </select> </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Área de Desempeño</label>
                                        <select name="areaDesempenio" required class="form-control"><option value="">Seleccione...</option><?php
                                        $areas = array(1 => 'Actividades profesionales científicas y técnicas', 'Acuícula y pesquero', 'Administración pública', 'Agrícola y ganadero', 'Arte, entretenimiento y recreación', 'Comercio', 'Contrucción', 'Educación', 'Elaboración de alimentos y bebidas', 'Gastronomía hotelería y turismo', 'Información y comunicaciones', 'Manufactura metálica', 'Manufactura no metálica', 'Minería metálica', 'Minería no metálica', 'Servicios para el hogar', 'Servicios de salud y asistencia social', 'Suministro de gas electricidad y agua', 'Transporte y logística');
                                        foreach ($areas as $i => $area) {
                                            echo '<option value="' . $areas[$i] . '">' . $areas[$i] . '</option>';
                                        }
    ?></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Publicación</label>
                                        <textarea RNAMEows="" 5="publicacion" class="form-control" name="publicacion" required placeholder="Descripcion breve y funciones"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="pass" class="form-control" required placeholder="Clave"> </div>
                                </div>
                            </div>
                            <input type="hidden" name="accion" value="nuevo" />
                            <button type="submit" class="btn btn-info btn-fill pull-right">Agregar Aviso</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
    <?php
} else if ($_POST['accion'] == 'nuevo') {
    //VARIABLES PARA AGREGAR PUBLICACION
    if (isset($_POST["publicacion"])) {
        $nombreCargo = $_POST["nombreCargo"];
        $COMUNA_ID = $_POST["COMUNA_ID"];
        $tipoContrato = $_POST["tipoContrato"];
        $tipoJornadaLaboral = $_POST["tipoJornadaLaboral"];
        $fechaInicio = $_POST["fechaInicio"];
        $tipoPublicacion = $_POST["tipoPublicacion"];
        $publicacion = $_POST["publicacion"];
        $aniosExperiencia = $_POST["aniosExperiencia"];
        $areaDesempenio = $_POST["areaDesempenio"];
        $pass = $_POST["pass"];
    }
    if ($obj_publicacion->compruebaPass($rut, $tipo, $pass)) {
        if (!isset($publicacion) || trim($publicacion) === '') {
        } else {
            try {
                $obj_publicacion->agregarPublicacion($rut, $nombreCargo, $COMUNA_ID, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion, $aniosExperiencia, $areaDesempenio);
                $obj_trabajo->agregarNotificacion($rut);
            } catch (Exception $e) {
                echo "Se ha producido un error : " . $e->getMessage();
            }
            echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Publicación Agregada!</h4>La Publicación "' . $nombreCargo . '" fué Agregada Exitosamente</div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Error!</h4>Contraseña Incorrecta, <a href="javascript:window.history.back();">Intente Nuevamente</a></div>';
    }
} else if ($_POST['accion'] == 'actualizar') {
    //VARIABLES PARA ACTUALIZAR PUBLICACION
    if (isset($_POST["publicacion"])) {
        $id = $_POST['id'];
        $nombreCargo = $_POST["nombreCargo"];
        $COMUNA_ID = $_POST["COMUNA_ID"];
        $tipoContrato = $_POST["tipoContrato"];
        $tipoJornadaLaboral = $_POST["tipoJornadaLaboral"];
        $fechaInicio = $_POST["fechaInicio"];
        $tipoPublicacion = $_POST["tipoPublicacion"];
        $publicacion = $_POST["publicacion"];
        $aniosExperiencia = $_POST["aniosExperiencia"];
        $areaDesempenio = $_POST["areaDesempenio"];
        $pass = $_POST["pass"];
    }
    if ($obj_publicacion->compruebaPass($rut, $tipo, $pass)) {
        if (!isset($publicacion) || trim($publicacion) === '') {
        } else {
            try {
                $obj_publicacion->editaPublicacion($id, $rut, $nombreCargo, $COMUNA_ID, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion, $aniosExperiencia, $areaDesempenio);
            } catch (Exception $e) {
                echo "Se ha producido un error : " . $e->getMessage();
            }
            echo "Publicación Actualizada";
        }
    } else {
        echo "ERROR! Contraseña Erronea, Intente Nuevamente";
    }
}

//GENERAR LISTA DE PUBLICACIONES
if ($tipo == "empresa") {
    ?>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header"><a href="avisos.php?accion=nuevo" class="btn btn-primary pull-right" data-toggle="tooltip" title="Agregar un Nuevo Aviso de Trabajo"><b>+</b> Nuevo Aviso</a>
                            <h4 class="box-title">Últimos Avisos Publicados</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>ID</th>
                                <th>CARGO</th>
                                <th>CONTRATO</th>
                                <th>JORNADA LABORAL</th>
                                <th>FECHA INICIO</th>
                                <th>DESCRIPCION</th>
                                <th>TIPO</th>
                                <th>PUBLICADO EL</th>
                                <th>CIUDAD</th>
                                <th>EXPERIENCIA</th>
                                <th>AREA DESEMPEÑO</th>
                                <th>ACCIONES</th>
                                </thead>
    <?php
    $var_publicaciones = $obj_publicacion->obtienePublicacionesUsuario($rut);
    $var_cantidad_publicaciones = count($var_publicaciones);
    ?>
                                <?php
                                for ($j = 0; $j < $var_cantidad_publicaciones; $j++) {
                                    ?>
                                    <tr>
                                        <td>
                                    <?php echo $var_publicaciones[$j][0];
                                    ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][1];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][2];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][3];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][4];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][5];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][6];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][7];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][8];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][9];
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $var_publicaciones[$j][10];
                                            ?>
                                        </td>
                                        <td><a href="avisos.php?accion=editar&id=<?php echo $var_publicaciones[$j][0]; ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Editar Aviso &numero; <?php echo $var_publicaciones[$j][0]; ?>"><span class="fa fa-pencil fa-fw"></span> Editar</a>&nbsp;
                                            <a onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_publicaciones[$j][0]; ?>?');" href="avisos.php?accion=eliminar&id=<?php echo $var_publicaciones[$j][0]; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Aviso &numero; <?php echo $var_publicaciones[$j][0]; ?>"><span class="fa fa-remove fa-fw"></span> Eliminar</a>
                                        </td>
                                    </tr>
    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<?php } else if ($tipo == "persona") { ?>

            <?php
            if ($_GET['accion'] == 'leer' && $_GET['id'] != '') {
                $var_trabajo = $obj_trabajo->obtieneUnAviso($_GET['id']);
              $var_trabajo=mysqli_fetch_assoc($var_trabajo);
                ?>

                <div class="container col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Se Necesita: <a href="/avisos.php?accion=leer&id=<?php echo $var_trabajo['id']; ?>"><?php echo $var_trabajo['cargo']; ?></a></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6">
                                <dl class="dl-horizontal">
                                    <dt>Aviso &numero;</dt>
                                    <dd><?php echo $var_trabajo['id']; ?></dd>
                                    <dt>Cargo</dt>
                                    <dd><?php echo $var_trabajo['cargo']; ?></dd>
                                    <dt>Tipo de Contrato</dt>
                                    <dd><?php echo $var_trabajo['tipo_contrato']; ?></dd>
                                    <dt>Jornada Laboral</dt>
                                    <dd><?php echo $var_trabajo['tipo_jornada']; ?></dd>
                                    <dt>Fecha de Inicio</dt>
                                    <dd><?php echo $var_trabajo['fecha_inicio']; ?></dd>
                                    <dt>Tipo de Publicacion</dt>
                                    <dd><?php echo $var_trabajo['tipo_publicacion']; ?></dd>
                                    <dt>Años de Experiencia</dt>
                                    <dd><?php echo $var_trabajo['anios_experiencia']; ?></dd>
                                    <dt>Área de Desempeño</dt>
                                    <dd><?php echo $var_trabajo['area_desempenio']; ?></dd>
                                </dl>
                                <h4><?php echo $var_trabajo['publicacion']; ?></h4>
                                <form method="post" action="postulaciones.php">
                                    <input type="hidden" name="accion" value="postular">
                                    <input type="hidden" name="i" value="<?php echo $var_trabajo['id']; ?>">
                                    <button class="btn btn-block btn-info btn-lg" type="submit"><i class="fa fa-paper-plane"></i> Postular al Trabajo</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                              <h4>Ciudad: <?php echo $var_trabajo['COMUNA_ID']; ?></h4>
                                <strong>Publicado el: </strong><?php echo substr($var_trabajo['fecha_publicacion'], 0, 10); ?>
                              <form method="post" action="avisos.php">
                                    <input type="hidden" name="accion" value="guardar-aviso">
                                    <input type="hidden" name="i" value="<?php echo $var_trabajo['id']; ?>">
                                    <button class="btn btn-block btn-danger btn-lg" type="submit"><i class="fa fa-heart"></i> Guardar el Aviso</button>
                                </form>
                            </div>
                        </div>
                    </div>
</div> </div>
 <!-- Info Boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <a href="javascript:Postular(<?php echo $var_trabajo['id']; ?>);"><span class="info-box-icon bg-green"><i class="fa fa-paper-plane"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Postular</span></a>
          <span class="info-box-number" id="cP">14</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <a href="javascript:Guardar(<?php echo $var_trabajo['id']; ?>);"><span class="info-box-icon bg-red"><i class="fa fa-heart"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Guardar</span></a>
          <span class="info-box-number" id="cG">41</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-share"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Compartir</span>
          <span class="info-box-number" id="cC">13</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Leído</span>
          <span class="info-box-number">99</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
<?php
    } else if ($_GET['accion'] == 'avisos-guardados' || $_POST['accion'] == 'guardar-aviso' || $_GET['accion'] == 'borrar-aviso-guardado') {
        if ($_GET['accion'] == 'borrar-aviso-guardado') {
        $idPublicacion = preg_replace('/[^0-9]/', '', $_GET['i']);
        try {
            $obj_trabajo->borraAvisoGuardado($idPublicacion, $id);
        } catch (Exception $e) {
            echo "Se ha producido un error : " . $e->getMessage();
        }
        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <h4><i class="icon fa fa-info"></i>Aviso &numero;
        ' . $idPublicacion . ' eliminado! </h4>El aviso fué eliminado de tu lista de avisos guardados de forma exitosa!.</div>';
    }
        if ($_POST['accion'] == 'guardar-aviso') {
        $idPublicacion = preg_replace('/[^0-9]/', '', $_POST['i']);
        if (($obj_trabajo->compruebaAvisoGuardado($idPublicacion, $id)) == "true") {
            try {
                $obj_trabajo->guardaAviso($_POST['i'], $id);
            } catch (Exception $e) {
                echo "Se ha producido un error : " . $e->getMessage();
            }
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <h4><i class="icon fa fa-info"></i>Aviso Guardado! </h4>Acabas de Guardar el aviso &numero;
            ' . $idPublicacion . ' de forma exitosa!.</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <h4><i class="icon fa fa-ban"></i>Ya Guardado! </h4>El aviso &numero;
            ' . $idPublicacion . ' lo habías guardado anteriormente.</div>';
        }
    }
        $filas = '';
        $resultado = $obj_trabajo->avisosGuardados($id);
              
$cantidad=$resultado->num_rows;
if($cantidad>0){
//IMPRIME INICIO_TABLA
        echo '<div class="box"> <div class="box-header"><h2>Mis Avisos Guardados</h2> <div class="content table-responsive table-full-width"> <table class="table table-hover table-striped"> <thead> <tr>  <th>ID</th><th>CARGO</th> <th>LUGAR DE TRABAJO</th> <th>CONTRATO</th> <th>JORNADA LABORAL</th> <th>DESCRIPCION</th> <th>FECHA PUBLICACIÓN</th> <th>ACCIONES</th> </tr> </thead> <tbody>';
        //INICIO LLENAR TABLA
        while ($rows = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['cargo']; ?></td>
                        <td><?php echo $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
            ?></td> <td><?php echo $rows['tipo_contrato'];
            ?></td> <td><?php echo $rows['tipo_jornada'];
            ?></td> <td><?php echo $rows['publicacion'];
            ?></td> <td><?php echo $rows['fecha_publicacion'];
            ?></td> <td><a href="avisos.php?accion=leer&id=<?php echo $rows['id']; ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Leer Aviso &numero; <?php echo $rows['id']; ?>"><span class="fa fa-eye fa-fw"></span> Leer</a>&nbsp;
                            <a onclick="return confirm('Esta seguro de eliminar el aviso guardado?');" href="avisos.php?accion=borrar-aviso-guardado&i=<?php echo $rows['id']; ?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar aviso guardado"><span class="fa fa-remove fa-fw"></span> Eliminar</a></td> </tr> 
                            <?php
                        } //FIN LLENAR TABLA
                        //IMPRIME FIN_TABLA
                        echo '</tbody> </table> </div> </div></div>';} else {
                        //IMPRIME ADVERTENCIA SI NO HAY DATOS
                            echo '<div class="callout callout-warning"> <h4><i class="icon fa fa-warning"></i> No hay Avisos Guardados</h4> <p>Te invitamos a que <a href="avisos.php">revises los avisos</a> y Guardes tus avisos favoritos.</p> </div>';}
                    } else {
                        $var_trabajo = $obj_trabajo->obtieneUltimosTrabajos();
                        $var_cantidad_trabajos = count($var_trabajo);
                        ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Últimos Avisos de Trabajo</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                    <th>ID</th>
                                    <th>CARGO</th>
                                    <th>CONTRATO</th>
                                    <th>JORNADA LABORAL</th>
                                    <th>FECHA INICIO</th>
                                    <th>DESCRIPCION</th>
                                    <!-- <th>TIPO</th> -->
                                    <th>PUBLICADO EL</th>
                                    <th>CIUDAD</th>
                                    <th>EXPERIENCIA</th>
                                    <th>AREA DESEMPEÑO</th>
                                    <th>ACCIONES</th>
                                    </thead>

        <?php for ($j = 0; $j < $var_cantidad_trabajos; $j++) { ?>
                                        <tr>
                                            <td>
                                        <?php echo $var_trabajo[$j][0]; ?>
                                            </td>
                                            <td>
                                                <?php echo $var_trabajo[$j][1]; ?>
                                            </td>
                                            <td>
                                                <?php echo $var_trabajo[$j][2]; ?>
                                            </td>
                                            <td>
                                                <?php echo $var_trabajo[$j][3]; ?>
                                            </td>
                                            <td>
                                                <?php echo $var_trabajo[$j][4]; ?>
                                            </td>
                                            <td>
                                                <?php echo $var_trabajo[$j][5]; ?>
                                            </td>
                                           <!-- <td>
                                                <?php echo $var_trabajo[$j][6]; ?>
                                            </td> -->
                                            <td>
                                            <?php echo $var_trabajo[$j][7]; ?>
                                            </td>
                                            <td>
                                                <?php echo $var_trabajo[$j][8]; ?>
                                            </td>
                                            <td>
                                                <?php echo $var_trabajo[$j][9]; ?>
                                            </td>
                                            <td>
                                                <?php echo $var_trabajo[$j][10]; ?>
                                            </td>
                                            <td>
                                                <a href="avisos.php?accion=leer&id=<?php echo $var_trabajo[$j][0]; ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Leer Aviso &numero; <?php echo $var_trabajo[$j][0]; ?>"><span class="fa fa-eye fa-fw"></span> Leer</a>&nbsp;
                                                <a href="javascript:guardaAviso(<?php echo $var_trabajo[$j][0]; ?>);" class="btn btn-success btn-xs" data-toggle="tooltip" title="Guardar Aviso &numero; <?php echo $var_trabajo[$j][0]; ?>"><span class="fa fa-star fa-fw"></span> Guardar</a>
                                            </td>
                                        </tr>
        <?php }; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <script language="javascript">
                    function guardaAviso(idAviso) {
                        $.post("avisos.php", {i: idAviso, accion: 'guardar-aviso'})
                        alert("Aviso Guardado");
                    }
                </script>
    <?php } ?>
<?php } ?>
</section>
</div>
        <?php include 'structure/footer.panel.php'; ?>