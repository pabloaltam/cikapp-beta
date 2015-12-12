<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
include 'structure/navbar.panel.php';
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
            <div class="content">
              
              <?php if ($tipo=='persona' || $tipo='empresa') {?>
                             
                         <?php 
                        include("include/ejecutar_en_db.php");
                        $Usuario = new OperacionesMYSQL();
                        $idUsuarioGet = $_GET['id'];
                        $var_usuario=$Usuario ->recuperarUsuario($idUsuarioGet);
                        
                        while ($rows = $var_usuario->fetch_assoc()) {
                        $nombre = $rows["nombre"];
                        $apellido = $rows["apellido"];
                        $apellidoM = $rows["apellidoM"];
                        $imagen = $rows['rutaImagen'];
                        $fNacimiento = $rows['fechaNacimiento'];
                        $intereses = $rows['areasInteres'];
                        $comuna_ID = $rows['COMUNA_ID'];
                        $skype = $rows['skype'];
                        $locacion ="";
                        }
                            include 'include/conexion.php';
                            $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$comuna_ID};";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                            }
                        ?>
              <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua" style="background: url('../structure/panel/img/bg3.jpg') center center;">
              <h3 class="widget-user-username"><?php echo $nombre ." " . $apellido ." " . $apellidoM ?></h3>
              <h5 class="widget-user-desc"><i class='fa fa-envelope margin-r-5'></i> <?php echo $email ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo $imagen ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class='description-header'><strong><i class='fa fa-thumbs-up margin-r-5'></i> Intereses</strong></h5><br/>
                    <span class='description-text'><p class='text-muted'><?php echo $intereses ?></p></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class='description-header'><strong><i class='fa fa-map-marker margin-r-5'></i> Ubicación</strong></h5><br/>
                    <span class='description-text'><p class='text-muted'><?php echo $locacion ?></p></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class='description-header'><strong><i class='fa fa-skype margin-r-5'></i> Skype</strong></h5><br/>
                    <span class='description-text'><p class='text-muted'><?php echo $skype ?></p></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <hr/>

            </div>
          </div>
           <!-- /.widget-user -->

                  <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  </div>
  <?php include 'structure/footer.panel.php'; ?>