<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
include 'structure/navbar.panel.php';
?>        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">TITULO PARA AMBOS</h4>
                            </div>
                            <div class="content">
                              
      <div class="alert alert-info alert-dismissable">
                                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i>CAMBIO DE CONTRASEÑA</h4>
Desde aquí puede cambiar su contraseña, le recomendamos cambiarla cada cierto tiempo para una mejor seguridad.
      </div>   
<?php if ($tipo=='empresa') {?>
//TODO LO QUE VA EN EMPRESA
                               <div class="container-fluid">
                                <?php
                                  if (isset($_POST['actual'])) {
                                    $nueva = $_POST['nueva'];
                                    if($nueva === $_POST['confirmar']){
                                       include 'include/ejecutar_en_db.php';
                                       $obj = new OperacionesMYSQL();

                                       if ($obj->esIgualE($id, $_POST['actual'])){
                                         include 'include/sign_in.php';
                                         if(actualizarContraseñaE($id,$nueva)){
                                           echo"<p>Su contraseña se ha actualizado</p>";
                                         }else{
                                           echo"<p>Su contraseña no ha podido actualizarse, por favor intente mas tarde</p>";
                                         }
                                       }else{
                                         echo"<p>Su contraseña actual es incorrecta, por favor ingresela nuevamente</p>";
                                       }
                                    }else{
                                      echo"<p>Su contraseña nueva no coincide con la confirmación, por favor intente nuevamente.</p>";
                                    }
                                  }
                                  ?>
                                <form class="form-horizontal" role="form" action="" method="post" name="formDatos" enctype="multipart/form-data">
                                <div class="content" align="center">
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Contraseña actual:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" value="" type="password" name="actual">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Contraseña nueva:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" value="" type="password" name="nueva">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Confirmar contraseña:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" value="" type="password" name="confirmar">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                      <input class="btn btn-primary" value="Guardar" type="submit">
                                      <span></span>
                                      <input class="btn btn-default" value="Cancelar" type="reset">
                                    </div>
                                  </div>
                                
                                </div>
                                </form>
                              </div>
                              
<?php } else if ($tipo=='persona') { ?>

                              <div class="container-fluid">
                                <?php
                                  if (isset($_POST['actual'])) {
                                    $nueva = $_POST['nueva'];
                                    if($nueva === $_POST['confirmar']){
                                       include 'include/ejecutar_en_db.php';
                                       $obj = new OperacionesMYSQL();

                                       if ($obj->esIgual($id, $_POST['actual'])){
                                         include 'include/sign_in.php';
                                         if(actualizarContraseña($id,$nueva)){
                                           echo"<p>Su contraseña se ha actualizado</p>";
                                         }else{
                                           echo"<p>Su contraseña no ha podido actualizarse, por favor intente mas tarde</p>";
                                         }
                                       }else{
                                         echo"<p>Su contraseña actual es incorrecta, por favor ingresela nuevamente</p>";
                                       }
                                    }else{
                                      echo"<p>Su contraseña nueva no coincide con la confirmación, por favor intente nuevamente.</p>";
                                    }
                                  }
                                  ?>
                                <form class="form-horizontal" role="form" action="" method="post" name="formDatos" enctype="multipart/form-data">
                                <div class="content" align="center">
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Contraseña actual:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" value="" type="password" name="actual">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Contraseña nueva:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" value="" type="password" name="nueva">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Confirmar contraseña:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" value="" type="password" name="confirmar">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                      <input class="btn btn-primary" value="Guardar" type="submit">
                                      <span></span>
                                      <input class="btn btn-default" value="Cancelar" type="reset">
                                    </div>
                                  </div>
                                
                                </div>
                                </form>
                              </div>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </section>
        </div>
 <?php include 'structure/footer.panel.php'; ?>
