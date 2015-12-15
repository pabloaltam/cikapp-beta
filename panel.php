<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
include 'structure/navbar.panel.php';
if (isset($COMUNA_ID)) {
       include 'include/conexion.php';
                           $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID=$COMUNA_ID;";
                            $resultado = $mysqli->query($query);
                            while ($rows = $resultado->fetch_assoc()) {
                                $locacion = $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
                                $ciudadE = $rows['COMUNA_NOMBRE'];
                                $regionE = $rows['REGION_NOMBRE'];
                                $paisE = $rows['PAIS_NOMBRE'];
                            }
}

include './include/ejecutar_en_db.php';
$panelEmpresa = new OperacionesMYSQL();
$cantidadAvisos = $panelEmpresa ->cantidadAvisos($rut);
$numAvisos = mysqli_num_rows($cantidadAvisos);
$cantAvisosFinalizados = mysqli_num_rows($panelEmpresa ->cantidadAvisosFinalizados($rut));
?>        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="box box-solid">
                          <?php if ($tipo=='empresa') {?>
<!--                           <div class="box-header">
                              <div class="callout callout-info">
                                 <h4>Bienvenido <?php echo $nombre ?> a tu panel de empresa</h4>
                                   <p>Desde aquí podrás publicar avisos, buscar personas, y ver el estado de tus avisos y postulaciones.</p>
                                     </div>  -->
                          <?php } ?>
           
 <div class="content">
                          
<?php if ($tipo=='empresa') {?>
<div class="container-fluid">
  
<div class="row">
     <div class="col-md-7">
       <div class="box box-solid">
            <div class="box-header">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $rutaImagen ?>">

                  <h3 class="profile-username text-center"><?php echo $razonSocial ?></h3>

                  <p class="text-muted text-center">
                    <?php echo $nombre ." " . $apellido ." " . $apellidoM ?>
                  </p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <dl class="dl-horizontal">
                <dt>e-mail </i></dt>
                <dd><a><?php echo $emailEmpresa ?></a></dd>
                <dt>web </dt>
                <dd><a><?php echo $websiteEmpresa ?></a></dd>
                <dt>teléfono </dt>
                <dd><a><?php echo $fonoEmpresa ?></a></dd>
                <dt>país </dt>
                <dd><a><?php echo $paisE ?></a></dd>
                <dt>región </dt>
                <dd><a><?php echo $regionE ?></a></dd>
                <dt>ciudad </dt>
                <dd><a><?php echo $ciudadE ?></a></dd>
                <dt>dirección </dt>
                <dd><a><?php echo $direccionEmpresa ?></a></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->   
                </div>

<div class="col-md-5">
             <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-briefcase"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Avisos activos</span>
              <span class="info-box-number"><?php echo $numAvisos ?></span>
            </div>
            <!-- /.info-box-content -->
          </div><!-- AVISOS ACTIVOS -->
    
            <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-ban"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Avisos finalizados</span>
              <span class="info-box-number"><?php echo $cantAvisosFinalizados ?></span>
            </div>

          <!-- /.info-box -->
</div><!-- AVISO FINALIZADOS -->
<div class="box collapsed-box">
                  <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-plus-circle text-green"></i> Publicar aviso</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-level-down text-light-blue"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <div class="container-fluid">
                   <form class="form form-vertical" action="avisos.php" method="post">
                          <div>
                


                                
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" class="form-control" name="nombreCargo" required placeholder="Nombre Puesto o Cargo del Trabajo"> </div>
                                
                                
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
                                
                                
                                    <div class="form-group">
                                        <label>Tipo de Contrato</label>
                                        <select name="tipoContrato" reqired class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option>Plazo Fijo </option>
                                            <option>Plazo Indefinido</option>
                                            <option>Por Faena</option>
                                        </select> </div>
                                
                            
                            
                                
                                    <div class="form-group">
                                        <label>Tipo de Jornada Laboral</label>
                                        <select name="tipoJornadaLaboral" required class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option>Free lance</option>
                                            <option>Part time (20 hrs semanales)</option>
                                            <option>Part time (30 hrs semanales)</option>
                                            <option>Full time (45 ó mas horas semanales)</option>
                                        </select> </div>
                                
                                
                                    <div class="form-group">
                                        <label>Fecha de Inicio </label>
                                        <input type="datetime-local" class="form-control" name="fechaInicio" step="1" min="<?php echo date("Y-m-d\TH:i:s"); ?>" max="<?php echo date("Y-m-d\TH:i:s", strtotime("+3 years")); ?>" required value="<?php echo date("Y-m-d\TH:i:s"); ?>"> </div>
                                
                                
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
                                
                            
                            
                                
                                    <div class="form-group">
                                        <label>Años de Experiencia</label>
                                       <select name="aniosExperiencia" required class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option>Sin experiencia</option>
                                            <option>1 a 3 años</option>
                                            <option>4 a 6 años</option>
                                            <option>7 a 9 años</option>
                                            <option>Más de 10 años</option>
                                        </select> </div>
                                
                                
                                    <div class="form-group">
                                        <label>Área de Desempeño</label>
                                        <select name="areaDesempenio" required class="form-control"><option value="">Seleccione...</option><?php
                                            $areas = array(1 => 'Actividades profesionales científicas y técnicas', 'Acuícula y pesquero', 'Administración pública', 'Agrícola y ganadero', 'Arte, entretenimiento y recreación', 'Comercio', 'Contrucción', 'Educación', 'Elaboración de alimentos y bebidas', 'Gastronomía hotelería y turismo', 'Información y comunicaciones', 'Manufactura metálica', 'Manufactura no metálica', 'Minería metálica', 'Minería no metálica', 'Servicios para el hogar', 'Servicios de salud y asistencia social', 'Suministro de gas electricidad y agua', 'Transporte y logística');
                                            foreach ($areas as $i => $area) {
                                                echo '<option>' . $areas[$i] . '</option>';
                                            }
                                            ?></select>
                                    </div>
                                
                            
                            
                               
                                    <div class="form-group">
                                        <label>Publicación</label>
                                        <textarea RNAMEows="" 5="publicacion" class="form-control" name="publicacion" required placeholder="Descripcion breve y funciones"></textarea>
                                    </div>
                                
                            
                            
                                
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="pass" class="form-control" required placeholder="Clave"> </div>
                                
                            
                            <input type="hidden" name="accion" value="nuevo" />
                            <button type="submit" class="btn btn-info btn-fill pull-right">Agregar Aviso</button>
                            <div class="clearfix"></div>
                        </form>
                    
                
            </div>
                     
                    </form>
                      </div>
                  </div><!-- /.box-body -->
                </div><!-- BOX AVISO -->
<div class="box collapsed-box">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-rss text-orange"></i> RSS Feed</h3>
                    <p class="category">Cooperativa Empleabilidad</p>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-level-down text-light-blue"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <div class="container-fluid"  style="height:300px; overflow-x: hidden;">
                    <?php
                                include "structure/rss/lastRSS.php";
                                $rss = new lastRSS;
                                $rss->cache_dir = './temp';
                                $rss->cache_time = 1200;
                                // cargar archivo RSS
                                $rs = $rss->get('http://www.cooperativa.cl/noticias/site/tax/port/all/rss_3_87__1.xml');
                                // Muestra titulo y enlace
                                echo "<dl>\n";
                                foreach ($rs['items'] as $item) {
                                    ?>
                                    <dt><a target="_blank" href='<?php echo $item['link'] ?> '><?php echo $item['title'] ?> </a>
                                        <p><?php echo $item['description'] ?></p>
                                        <p><label>Categoria</label><?php echo $item['category'] ?><label>Fecha</label><?php echo $item['pubDate'] ?> </p>
                                    </dt>
                                    <?php
                                }
                                echo "</dl>\n";
                                ?>
                      </div>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->

 
    </div> 
</div>
                            
<?php } else if ($tipo=='persona') {
$areasInteres = $_SESSION['interes'];
$interes = explode(' y ' , $areasInteres); 

?>

<div class="container-fluid">
  
  <div class="row">
   
                              <div class="callout callout-info">
                                 <h4><i class="text-info fa fa-coffee"></i> Bienvenido  <?php echo $nombre ?> a tu panel</h4>
                                <p>Desde aquí podrás acceder a <a href="persona.php?id=<?php echo $id ?>">tu perfil</a>, <a href="mostrar-usuarios.php">enviar mensajes a otros usuarios</a>, y <a href="avisos.php">ver avisos de empresas</a>.</p>
                                     </div>  
              
  

    
    <div class="row">
      <div class="col-md-4">
                          <img class="profile-user-img img-responsive img-circle" src="<?php echo $rutaImagen ?>">

                  <h3 class="profile-username text-center"><?php echo $nombre ." " . $apellido ." " . $apellidoM ?></h3>

                  <p class="text-muted text-center">
                  <?php echo $tituloprof ?>
                  </p>
                  <br/>
     
    </div>              
    <div class="col-md-6">
      <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <i class="fa fa-envelope"></i>
                   <a class="pull"><?php echo $email ?></a>
                </li>
                <li class="list-group-item">
                  <i class="fa fa-skype"></i>
                  <a class="pull"><?php echo $skype ?></a>
                </li>
                <li class="list-group-item">
                    <strong><i class="fa fa-book margin-r-5"></i></strong>
                
                    <span class="pull label label-danger"><?php echo $interes[0] ?></span>

                    <span class="pull label label-success"> <?php echo $interes[1] ?></span>
                  
                  </li>
                <li class="list-group-item">
                  <i class="fa fa-location-arrow"></i>
                  <a class="pull"><?php echo $locacion ?></a>
                </li>
              </ul>
    </div> 
      
       <div class="col-md-2">
         <a href="avisos.php" class="btn btn-app btn-primary">
                <i class="fa fa-search text-green"></i> Avisos de empleos
              </a>
      <a href="avisos.php?accion=avisos-guardados" class="btn btn-app">
                <i class="fa fa-heart text-red"></i> Avisos guardados
              </a>
      <a href="postulaciones.php" class="btn btn-app">
                <i class="fa fa-paper-plane text-light-blue"></i> Mis postulaciones
              </a>
        </div>
    </div>
    
    
    
                  
 <div class="box box-warning collapsed-box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Noticias</h3>
                    <p class="category">Diario financiero RSS</p>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-level-down text-light-blue"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <div class="container-fluid"  style="height:300px; overflow-x: hidden;">
                    <?php
                                include "structure/rss/lastRSS.php";
                                $rss = new lastRSS;
                                $rss->cache_dir = './temp';
                                $rss->cache_time = 1200;
                                // cargar archivo RSS
                                $rs = $rss->get('http://www.cooperativa.cl/noticias/site/tax/port/all/rss_3_87__1.xml');
                                // Muestra titulo y enlace
                                echo "<dl>\n";
                                foreach ($rs['items'] as $item) {
                                    ?>
                                    <dt><a target="_blank" href='<?php echo $item['link'] ?> '><?php echo $item['title'] ?> </a>
                                        <p><?php echo $item['description'] ?></p>
                                        <p><label>Categoria</label><?php echo $item['category'] ?><label>Fecha</label><?php echo $item['pubDate'] ?> </p>
                                    </dt>
                                    <?php
                                }
                                echo "</dl>\n";
                                ?>
                      </div>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
                
    
                <!-- /.box-body -->
              
     

    </div>
                
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
