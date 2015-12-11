<?php 
require 'structure/navbar.panel.php';
require 'structure/avisos.class.php';
$obj_publicacion = new publicacion();
$obj_trabajo = new trabajos();
?>
  <section class="content">
    <div class="container-fluid">
      <?php if ($_GET['accion']=='editar') {
            $var_publicacion=$obj_publicacion ->obtieneUnaPublicacion($_GET['id'], $rut);
            ?>
        <div>
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">Editar Aviso &numero; <?php echo $var_publicacion[0][0];?></h4> </div>
            <div class="content">
              <form method="post" action="avisos.php">
                <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" class="form-control" name="nombreCargo" required value="<?php echo $var_publicacion[0][1];?>" placeholder="Nombre Puesto o Cargo del Trabajo"></div>
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
                                                              $esta="";
                                                              if ($rows['COMUNA_ID']==$var_publicacion[0][8]) $esta="selected"; 
                                                                print("<option ".$esta." value='" . $rows['COMUNA_ID'] . "' >" . $rows['COMUNA_NOMBRE'] . "</option>");
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
                        <?php $planes=array(1=> 'A', 'AA', 'AAA', 'Nicho');
            foreach ($planes as $i=> $plan) {
                echo '<option value="'.$planes[$i].'"';
                if ($var_publicacion[0][6]==$planes[$i]) {
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
                                                foreach ($areas as $i=> $area) {
                                                    echo '<option value="'.$i.'">'.$areas[$i].'</option>';}?></select>
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
        <?php die();
        }
        
        else if ($_GET['accion']=='eliminar') {
            try {
                $obj_publicacion ->eliminarPublicacion($_GET['id'], $rut);
            }
            catch(Exception $e) {
                echo "Se ha producido un error : ".$e->getMessage();
            }
            echo "La Publicacion ".$_GET['id']." ha sido eliminada";
        }
        
        else if ($_GET['accion']=='nuevo') {
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
                                                foreach ($areas as $i=> $area) {
                                                    echo '<option value="'.$i.'">'.$areas[$i].'</option>';}?></select>
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
          <?php die();
        }
        
        else if ($_POST['accion']=='nuevo') {
            //VARIABLES PARA AGREGAR PUBLICACION
            if (isset($_POST["publicacion"])) {
                $nombreCargo=$_POST["nombreCargo"];
                $COMUNA_ID=$_POST["COMUNA_ID"];
                $tipoContrato=$_POST["tipoContrato"];
                $tipoJornadaLaboral=$_POST["tipoJornadaLaboral"];
                $fechaInicio=$_POST["fechaInicio"];
                $tipoPublicacion=$_POST["tipoPublicacion"];
                $publicacion=$_POST["publicacion"];
                $aniosExperiencia=$_POST["aniosExperiencia"];
                $areaDesempenio=$_POST["areaDesempenio"];
                $pass=$_POST["pass"];
            }
            if ($obj_publicacion -> compruebaPass($rut, $tipo, $pass)) {
                if (!isset($publicacion) || trim($publicacion)==='') {
                    die();
                }
                else {
                    try {
                        $obj_publicacion -> agregarPublicacion($rut, $nombreCargo, $COMUNA_ID, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion,$aniosExperiencia,$areaDesempenio);
                        $obj_trabajo -> agregarNotificacion($rut);
                    }
                    catch(Exception $e) {
                        echo "Se ha producido un error : ".$e->getMessage();
                    }
                    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Publicación Agregada!</h4>La Publicación "'.$nombreCargo.'" fué Agregada Exitosamente</div>';
                }
            }
            else {
                echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Error!</h4>Contraseña Incorrecta, <a href="javascript:window.history.back();">Intente Nuevamente</a></div>';
            }
        }
        
        else if ($_POST['accion']=='actualizar') {
            //VARIABLES PARA ACTUALIZAR PUBLICACION
            if (isset($_POST["publicacion"])) {
                $id=$_POST['id'];
                $nombreCargo=$_POST["nombreCargo"];
                $COMUNA_ID=$_POST["COMUNA_ID"];
                $tipoContrato=$_POST["tipoContrato"];
                $tipoJornadaLaboral=$_POST["tipoJornadaLaboral"];
                $fechaInicio=$_POST["fechaInicio"];
                $tipoPublicacion=$_POST["tipoPublicacion"];
                $publicacion=$_POST["publicacion"];
                $aniosExperiencia=$_POST["aniosExperiencia"];
                $areaDesempenio=$_POST["areaDesempenio"];
                $pass=$_POST["pass"];
            }
            if ($obj_publicacion -> compruebaPass($rut, $tipo, $pass)) {
                if (!isset($publicacion) || trim($publicacion)==='') {
                    die();
                }
                else {
                    try {
                        $obj_publicacion ->editaPublicacion($id, $rut, $nombreCargo, $COMUNA_ID, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion, $aniosExperiencia, $areaDesempenio);
                    }
                    catch(Exception $e) {
                        echo "Se ha producido un error : ".$e->getMessage();
                    }
                    echo "Publicación Actualizada";
                }
            }
            else {
                echo "ERROR! Contraseña Erronea, Intente Nuevamente";
            }
        }
        
        //GENERAR LISTA DE PUBLICACIONES
        if ($tipo=="empresa"){ ?>

            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header"><a href="avisos.php?accion=nuevo" class="btn btn-primary pull-right" data-toggle="tooltip" title="Agregar un Nuevo Aviso de Trabajo"><b>+</b> Nuevo Aviso</a>
                    <h4 class="box-title">Últimos Avisos Publicados</h4>
                  </div>
                  <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                      <thead>
                        <th>id</th>
                        <th>cargo</th>
                        <th>contrato</th>
                        <th>jornada laboral</th>
                        <th>fecha inicio</th>
                        <th>descripcion</th>
                        <th>tipo</th>
                        <th>publicado el</th>
                        <th>ciudad</th>
                        <th>años experiencia</th>
                        <th>area desempeño</th>
                        <th>acciones</th>
                      </thead>
                      <?php $var_publicaciones=$obj_publicacion ->obtienePublicacionesUsuario($rut);
        $var_cantidad_publicaciones=count($var_publicaciones);
        ?>
                        <?php for($j=0;
        $j<$var_cantidad_publicaciones;
        $j++) {
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
                            <td><a href="avisos.php?accion=editar&id=<?php echo $var_publicaciones[$j][0];?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Editar Aviso &numero; <?php echo $var_publicaciones[$j][0];?>"><span class="fa fa-pencil fa-fw"></span> Editar</a>&nbsp;
                              <a onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_publicaciones[$j][0];?>?');" href="avisos.php?accion=eliminar&id=<?php echo $var_publicaciones[$j][0];?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Aviso &numero; <?php echo $var_publicaciones[$j][0];?>"><span class="fa fa-remove fa-fw"></span> Eliminar</a>
                            </td>
                          </tr>
                          <?php } ?>
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <?php } else if ($tipo=="persona") { ?>

              <?php if ($_GET['accion']=='leer' && $_GET['id']!=''){ 
        $var_trabajo=$obj_trabajo -> obtieneUnAviso($_GET['id']);
        ?>

                <div class="container col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Se Necesita: <a href="/avisos.php?accion=leer&id=<?php echo $var_trabajo[0][0];?>"><?php echo $var_trabajo[0][1];?></a></h3>
                    </div>
                    <div class="panel-body">
                      <div class="col-md-6">
                        <dl class="dl-horizontal">
                          <dt>Aviso &numero;</dt>
                          <dd><?php echo $var_trabajo[0][0]; ?></dd>
                          <dt>Cargo</dt>
                          <dd><?php echo $var_trabajo[0][1]; ?></dd>
                          <dt>Lugar de Trabajo</dt>
                          <dd><?php echo $var_trabajo[0][2]; ?></dd>
                          <dt>Tipo de Contrato</dt>
                          <dd><?php echo $var_trabajo[0][3]; ?></dd>
                          <dt>Jornada Laboral</dt>
                          <dd><?php echo $var_trabajo[0][4]; ?></dd>
                          <dd><?php echo $var_trabajo[0][6]; ?></dd>
                          <dd><?php echo $var_trabajo[0][7]; ?></dd>
                          <dd><?php echo $var_trabajo[0][8]; ?></dd>
                        </dl>
                        <h4><?php echo $var_trabajo[0][5]; ?></h4>
                      </div>
                      <div class="col-md-6">
                        <strong>Publicado el: </strong>
                        <?php echo substr($var_trabajo[0][8],0,10);?>
                        <a href="postulaciones.php?accion=postular&i=<?php echo $var_trabajo[0][0]; ?>">Postular al Trabajo</a>
                      </div>
                    </div>
                  </div>
                </div <?php } else { $var_trabajo=$obj_trabajo ->obtieneUltimosTrabajos(); $var_cantidad_trabajos=count($var_trabajo); ?>

                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                      <div class="box-header">
                        <h4 class="box-title">Últimos Avisos de Trabajo</h4>
                      </div>
                      <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                          <thead>
                        <th>id</th>
                        <th>cargo</th>
                        <th>contrato</th>
                        <th>jornada laboral</th>
                        <th>fecha inicio</th>
                        <th>descripcion</th>
                        <th>tipo</th>
                        <th>publicado el</th>
                        <th>ciudad</th>
                        <th>años experiencia</th>
                        <th>area desempeño</th>
                        <th>acciones</th>
                          </thead>

                          <?php for($j=0;$j<$var_cantidad_trabajos;$j++){?>
                            <tr>
                              <td>
                                <?php echo $var_trabajo[$j][0];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][1];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][2];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][3];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][4];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][5];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][6];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][7];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][8];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][9];?>
                              </td>
                              <td>
                                <?php echo $var_trabajo[$j][10];?>
                              </td>
                              <td>
                                <a href="avisos.php?accion=leer&id=<?php echo $var_trabajo[$j][0];?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Leer Aviso &numero; <?php echo $var_trabajo[$j][0];?>"><span class="fa fa-eye fa-fw"></span> Leer</a>&nbsp;
                                <a href="avisos.php?accion=guardar&id=<?php echo $var_trabajo[$j][0];?>" class="btn btn-success btn-xs" data-toggle="tooltip" title="Guardar Aviso &numero; <?php echo $var_trabajo[$j][0];?>"><span class="fa fa-star fa-fw"></span> Guardar</a>
                              </td>
                            </tr>
                            <?php };?>
                              </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
                  <?php } ?>
    </section>
  </div>
  <?php include 'structure/footer.panel.php'; ?>