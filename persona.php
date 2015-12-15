<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
include 'structure/navbar.panel.php';
?>
  <?php if ($tipo=='persona' || $tipo='empresa') {?>

    <?php 
                        include("include/ejecutar_en_db.php");
                        $Usuario = new OperacionesMYSQL();
                        $idUsuarioGet = $_GET['id'];
                        if ($idUsuarioGet==''){$idUsuarioGet=$id;} //RECUPERA USUARIO ACTUAL SI NO HAY VARIABLE GET
                        $var_usuario=$Usuario ->recuperarUsuario($idUsuarioGet);
                        
                        while ($rows = $var_usuario->fetch_assoc()) {
                        $nombre = $rows["nombre"];
                        $apellido = $rows["apellido"];
                        $apellidoM = $rows["apellidoM"];
                        $imagen = $rows['rutaImagen'];
                        $fNacimiento = $rows['fechaNacimiento'];
                        $areasInteres = $rows['areasInteres'];
                        $comuna_ID = $rows['COMUNA_ID'];
                        $skype = $rows['skype'];
                        $locacion ="";
                        $email = $rows['email'];
                        $ingles = $rows['idIngles'];
                        $experiencia = $rows['experiencia'];
                        $tituloprof = $rows['tituloprof'];
                        $video1 = $rows['video'];
                         
                          if ($ingles == 1) {
                            $valIngles = Básico;
                          } elseif ($ingles == 2) {
                            $valIngles = Intermedio;
                          } elseif ($ingles == 3) {
                            $valIngles = Avanzado;
                          } elseif ($ingles == 4) {
                            $valIngles = Nativo;
                          }
                          
                        }
                            
        if (isset($COMUNA_ID)) {
        include 'include/conexion.php';
                           $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID=$COMUNA_ID;";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                            }
}
                        $interes = explode(' y ' , $areasInteres);
                        ?>

      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo $imagen ?>">

                  <h3 class="profile-username text-center"><?php echo $nombre ." " . $apellido ." " . $apellidoM ?></h3>

                  <p class="text-muted text-center">
                    <?php echo $tituloprof ?>
                  </p>
                  <br/>
                  
                  <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <i class="fa fa-envelope"></i>
                   <a class="pull-right"><?php echo $email ?></a>
                </li>
                <li class="list-group-item">
                  <i class="fa fa-skype"></i>
                  <a class="pull-right"><?php echo $skype ?></a>
                </li>
              </ul>
                   <br/>
                  <?php // SI EL USUARIO ACTUAL ES EL MISMO QUE EL PERFIL MOSTRADO, OCULTA EL BOTON ENVIAR MENSAJE Y MUESTRA OPCIONES PARA EDITAR PERFIL, CAMBIAR CLAVE....
                          if($id==$idUsuarioGet) {echo "<a href='cambiar-clave.php' class='btn btn-info btn-xs pull-left'><i class='fa fa-key'></i> <b>Contraseña</b></a><a href='editar-perfil.php' class='btn btn-info btn-xs pull-right'><i class='fa fa-edit'></i><b> Editar Perfil</b></a>";} elseif($tipo=='persona' ) {echo "<a href='mensajes.php?usuario=$idUsuarioGet' class='btn btn-warning btn-block'><i class='fa fa-envelope'></i><b> Mensaje</b></a>";} ?>
                </div>
                
                <!-- /.box-body -->
              </div>
            </div>
            <!-- About Me Box -->
            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Sobre mi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i> Áreas de interés</strong>
                  <p>
                    <span class="label label-danger"><?php echo $interes[0] ?></span>

                    <span class="label label-success"> <?php echo $interes[1] ?></span>
                    <span class="label label-info"><?php echo $interes[2] ?></span>
                  </p>
                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>

                  <p class="text-muted"><?php echo $locacion ?></p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Nivel de inglés</strong>

                  <p class="text-muted"><?php echo $valIngles ?></p>
                             
                  <hr>

            
                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Experiencia laboral</strong>
                  <p class="text-muted"><?php echo $experiencia ?></p>
                  
                </div>
                <!-- /.box-body -->
              </div>
            </div>

            <!-- /.box -->
            <!-- /.box -->
            <!-- Widget: user widget style 1 -->

            <!-- /.widget-user -->

            <?php } ?>



          </div>
          <div class="row">
                      <div class="col-md-8">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Video presentación</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                   <?php
          if ($video1 === NULL) {
              echo '<iframe id="ifrmVideo" class="" src="" frameborder="0" ></iframe>';
          } else {
              echo "<iframe id='ifrmVideo' class='full-video' src='https://www.youtube.com/embed/$video1' frameborder='0' ></iframe>";
          }
          ?>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>


         
        </div>
      </section>
</div>
      <?php include 'structure/footer.panel.php'; ?>