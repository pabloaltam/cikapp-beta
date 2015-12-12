<?php
include 'structure/navbar.panel.php';
?>        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="box">
                           
                            <div class="content">
<?php 
$compara='esIgual';
$actualiza='actualizarContraseña';                              
if ($tipo=='empresa') { 
$compara='esIgualE';
$actualiza='actualizarContraseñaE';
} ?>
<div class="container-fluid">
                                <?php
                                  if (isset($_POST['actual'])) {
                                    $nueva = $_POST['nueva'];
                                    if($nueva === $_POST['confirmar']){
                                       include 'include/ejecutar_en_db.php';
                                       $obj = new OperacionesMYSQL();

                                       if ($obj->$compara($id, $_POST['actual'])){
                                         include 'include/sign_in.php';
                                         if($actualiza($id,$nueva)){
                                           echo'<div class="alert alert-success">
        <h4><i class="icon fa fa-check"></i>CONTRASEÑA ACTUALIZADA</h4>
Su contraseña se ha actualizado exitosamente.
      </div>';
                                         }else{
                                           echo"<p>Su contraseña no ha podido actualizarse, por favor intente mas tarde</p>";
                                         }
                                       }else{
                                         echo'<div class="alert alert-danger">
        <h4><i class="icon fa fa-ban"></i>CONTRASEÑA INCORRECTA</h4>
Su contraseña actual es incorrecta, por favor ingresela nuevamente
      </div>';
                                       }
                                    }else{
                                      echo '<div class="alert alert-danger">
        <h4><i class="icon fa fa-ban"></i>CONTRASEÑA NO COINCIDE</h4>
Su contraseña nueva no coincide con la confirmación, por favor intente nuevamente.
      </div>';
                                    }
                                  } else {echo '<div class="alert alert-info">
        <h4><i class="icon fa fa-info"></i>CAMBIO DE CONTRASEÑA</h4>
Desde aquí puede cambiar su contraseña, le recomendamos cambiarla cada cierto tiempo para una mejor seguridad.
      </div>';}
                                  ?>
                                <form class="form-horizontal" role="form" action="" method="post" name="formDatos" enctype="multipart/form-data">
                                <div class="content" align="center">
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Contraseña actual:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" required type="password" name="actual">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Contraseña nueva:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" required type="password" name="nueva">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Confirmar contraseña:</label>
                                    <div class="col-md-8">
                                      <input class="form-control" required type="password" name="confirmar">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                      <input class="btn btn-primary" value="Guardar" type="submit">
                                      <span></span>
                                      <input class="btn btn-default" value="Limpiar" type="reset">
                                    </div>
                                  </div>
                                
                                </div>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </section>
        </div>
 <?php include 'structure/footer.panel.php'; ?>
