<?php 
require 'structure/navbar.panel.php';
require 'structure/avisos.class.php';
$obj_publicacion = new publicacion();
$obj_trabajo = new trabajos();
?>
  <div class="content">
    <div class="container-fluid">
      <?php if ($_GET['accion']=='editar') {
            $var_publicacion=$obj_publicacion ->obtieneUnaPublicacion($_GET['id'], $rut);
            ?>
        <div>
          <div class="card">
            <div class="header">
              <h4 class="title">Editar Aviso &numero;
            <?php echo $var_publicacion[0][0];
            ?></h4> </div>
            <div class="content">
              <form method="post" action="avisos.php">
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Cargo</label>
                      <input type="text" class="form-control" name="nombreCargo" placeholder="Nombre Puesto o Cargo del Trabajo" value="<?php echo $var_publicacion[0][1];?>"> </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Lugar del trabajo</label>
                      <input type="text" name="lugarTrabajo" value="<?php echo $var_publicacion[0][2];?>" class="form-control" placeholder="Lugar del Trabajo"> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tipo de Contrato</label>
                      <input type="text" name="tipoContrato" value="<?php echo $var_publicacion[0][3];?>" class="form-control" placeholder="Tipo del Contrato del Trabajo"> </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Tipo de Jornada Laboral</label>
                      <input type="text" name="tipoJornadaLaboral" value="<?php echo $var_publicacion[0][4];?>" class="form-control" placeholder="Tipo de Jornada Laboral del Trabajo"> </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Fecha de Inicio</label>
                      <input type="date" class="form-control" value="<?php echo substr($var_publicacion[0][5],0,10);?>" name="fechaInicio"> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tipo del Plan</label>
                      <select name="tipoPublicacion" class="form-control">
                        <?php $planes=array(1=> 'A', 'AA', 'AAA', 'Nicho');
            foreach ($planes as $i=> $plan) {
                echo '<option value="'.$planes[$i].'"';
                if ($var_publicacion[0][7]==$planes[$i]) {
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
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Publicación</label>
                      <textarea RNAMEows="" 5="publicacion" class="form-control" name="publicacion" placeholder="Descripcion breve y funciones">
                        <?php echo $var_publicacion[0][6];
            ?>
                      </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" name="pass" class="form-control" placeholder="Clave"> </div>
                  </div>
                </div>
                <input type="hidden" name="accion" value="actualizar" />
                <input type="hidden" name="rut" value="<?php echo $rut;?>" />
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
            <div class="card">
              <div class="header">
                <h4 class="title">Agregar Aviso</h4> </div>
              <div class="content">
                <form method="post" action="avisos.php">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" class="form-control" name="nombreCargo" placeholder="Nombre Puesto o Cargo del Trabajo"> </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Lugar del trabajo</label>
                        <input type="text" name="lugarTrabajo" class="form-control" placeholder="Lugar del Trabajo"> </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tipo de Contrato</label>
                        <input type="text" name="tipoContrato" class="form-control" placeholder="Tipo del Contrato del Trabajo"> </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Tipo de Jornada Laboral</label>
                        <input type="text" name="tipoJornadaLaboral" class="form-control" placeholder="Tipo de Jornada Laboral del Trabajo"> </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fechaInicio" step="1" min="<?php echo date(" Y-m-d ");?>" max="2018-12-31" value="<?php echo date(" Y-m-d ");?>"> </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tipo del Plan</label>
                        <select name="tipoPublicacion" class="form-control">
                          <option selected>A</option>
                          </option>
                          <option>AA</option>
                          <option>AAA</option>
                          <option>Nicho</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Publicación</label>
                        <textarea RNAMEows="" 5="publicacion" class="form-control" name="publicacion" placeholder="Descripcion breve y funciones"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="pass" class="form-control" placeholder="Clave"> </div>
                    </div>
                  </div>
                  <input type="hidden" name="accion" value="nuevo" />
                  <input type="hidden" name="rut" value="<?php echo $rut;?>" />
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
                $rut=$_POST['rut'];
                $nombreCargo=$_POST["nombreCargo"];
                $lugarTrabajo=$_POST["lugarTrabajo"];
                $tipoContrato=$_POST["tipoContrato"];
                $tipoJornadaLaboral=$_POST["tipoJornadaLaboral"];
                $fechaInicio=$_POST["fechaInicio"];
                $publicacion=$_POST["publicacion"];
                $tipoPublicacion=$_POST["tipoPublicacion"];
                $pass=$_POST["pass"];
            }
            if ($obj_publicacion -> compruebaPass($rut, $tipo, $pass)) {
                if (!isset($publicacion) || trim($publicacion)==='') {
                    die();
                }
                else {
                    try {
                        $obj_publicacion -> agregarPublicacion($rut, $nombreCargo, $lugarTrabajo, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion);
                    }
                    catch(Exception $e) {
                        echo "Se ha producido un error : ".$e->getMessage();
                    }
                    echo "Publicación Agregada Exitosamente";
                }
            }
            else {
                echo "ERROR! Contraseña Erronea, Intente Nuevamente";
            }
        }
        
        else if ($_POST['accion']=='actualizar') {
            //VARIABLES PARA ACTUALIZAR PUBLICACION
            if (isset($_POST["publicacion"])) {
                $id=$_POST['id'];
                $rut=$_POST['rut'];
                $nombreCargo=$_POST["nombreCargo"];
                $lugarTrabajo=$_POST["lugarTrabajo"];
                $tipoContrato=$_POST["tipoContrato"];
                $tipoJornadaLaboral=$_POST["tipoJornadaLaboral"];
                $fechaInicio=$_POST["fechaInicio"];
                $publicacion=$_POST["publicacion"];
                $tipoPublicacion=$_POST["tipoPublicacion"];
                $pass=$_POST["pass"];
            }
            if ($obj_publicacion -> compruebaPass($rut, $tipo, $pass)) {
                if (!isset($publicacion) || trim($publicacion)==='') {
                    die();
                }
                else {
                    try {
                        $obj_publicacion ->editaPublicacion($id, $rut, $nombreCargo, $lugarTrabajo, $tipoContrato, $tipoJornadaLaboral, $fechaInicio, $publicacion, $tipoPublicacion);
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
              <div class="col-md-12">
                <div class="card">
                  <div class="header">
                    <h4 class="title">Últimos Avisos Publicados <a href="avisos.php?accion=nuevo" class="btn btn-primary pull-right" data-toggle="tooltip" title="Agregar un Nuevo Aviso de Trabajo"><b>+</b> Nuevo Aviso</a></h4>
                    <p class="category">Listado de todas las publicaciones realizadas hasta la fecha:</p>
                  </div>
                  <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                      <thead>
                        <th>id</th>
                        <th>cargo</th>
                        <th>lugar de trabajo</th>
                        <th>contrato</th>
                        <th>jornada laboral</th>
                        <th>fecha inicio</th>
                        <th>descripcion</th>
                        <th>tipo</th>
                        <th>publicado el</th>
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

              <?php if ($_GET['id']!=''){ 
        $var_trabajo=$obj_trabajo -> obtieneUnAviso($_GET['id']);
        ?>

                <div class="container col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title"><a href="/avisos.php?id=<?php echo $var_trabajo[0][0];?>"><?php echo $var_trabajo[0][1];?></a></h3>
                    </div>
                    <div class="panel-body">
                      <div class="col-md-6">
                        <?php echo $var_trabajo[0][6]; ?>
                      </div>
                      <div class="col-md-6">
                        <strong>Publicado el: </strong>
                        <?php echo substr($var_trabajo[0][8],0,10);?>
                      </div>
                    </div>
                  </div>
                </div <?php } else { $var_trabajo=$obj_trabajo ->obtieneUltimosTrabajos(); $var_cantidad_trabajos=count($var_trabajo); ?>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="header">
                        <h4 class="title">Últimos Avisos de Trabajo</h4>
                        <p class="category">Listado los últimos avisos realizados hasta la fecha:</p>
                      </div>
                      <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                          <thead>
                            <th>id</th>
                            <th>cargo</th>
                            <th>lugar de trabajo</th>
                            <th>contrato</th>
                            <th>jornada laboral</th>
                            <th>fecha inicio</th>
                            <th>descripcion</th>
                            <th>tipo</th>
                            <th>publicado el</th>
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
                                <a href="trabajos.php?accion=editar&id=<?php echo $var_trabajo[$j][0];?>">
                                  <input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: green;" value="Editar"> </a>&nbsp;
                                <a onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_trabajo[$j][0];?>?');" href="trabajos.php?accion=eliminar&id=<?php echo $var_trabajo[$j][0];?>">
                                  <input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: red;" value="Eliminar"> </a>
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
    </div>
  </div>
  <?php include 'structure/footer.panel.php'; ?>