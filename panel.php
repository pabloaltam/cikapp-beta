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
                                                <div class="control-group">
                                                    <label>Titulo del aviso</label>
                                                    <div class="controls">
                                                        <input type="text" name="titulo" class="form-control" required placeholder="Titulo del aviso">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label>Nombre del Cargo</label>
                                                    <div class="controls">
                                                        <input type="text" name="nombreCargo" class="form-control" required placeholder="Nombre Puesto o Cargo del Trabajo">
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label>Ubicación</label>
                                                    <div class="controls">
                                                        <select id="txtCiudad" class="form-control" name="COMUNA_ID">
                                                            <option value="-1">Seleccione...</option>
                                                            <?php
                                                            require 'include/conexion.php';
                                                            $query = "SELECT * FROM comuna ORDER BY COMUNA_NOMBRE";
                                                            $resultado = $mysqli->query($query);
                                                            while ($rows = $resultado->fetch_assoc()) {
                                                                print("<option value='" . $rows['COMUNA_ID'] . "'>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label>Tipo de Contrato</label>
                                                    <div class="controls">
                                                        <select name="tipoContrato" class="form-control">
                                                            <option value="1">A Plazo Fijo </option>
                                                            <option value="2">A Plazo Indefinido</option>
                                                            <option value="3">Por Faena</option>
                                                        </select>
                                                    </div>

                                                    <div class="control-group">
                                                        <label>Tipo de Jornada Laboral</label>
                                                        <div class="controls">
                                                            <select name="tipoJornadaLaboral" class="form-control">
                                                                <option value="1">Free lance</option>
                                                                <option value="2">Part time (20 hrs semanales)</option>
                                                                <option value="3">Part time (30 hrs semanales)</option>
                                                                <option value="4">Full time (45 ó mas horas semanales)</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label>Fecha de Inicio</label>
                                                        <div class="controls">
                                                            <input type="date" class="form-control" name="fechaInicio" step="1" min="<?php echo date("Y-m-d"); ?>" max="2018-12-31" value="<?php echo date("Y-m-d"); ?>">
                                                        </div>
                                                    </div>      
                                                    <div class="control-group">
                                                        <label>Publicación</label>
                                                        <div class="controls">
                                                            <textarea name="publicacion" class="form-control" required placeholder="Descripcion breve y funciones"></textarea>
                                                        </div>
                                                    </div> 

                                                    <div class="control-group">
                                                        <label>Tipo del Plan de Publicacion</label>
                                                        <div class="controls">
                                                            <select name="tipoPublicacion" class="form-control"><option>A</option></option><option>AA</option><option>AAA</option><option>Nicho</option></select>
                                                        </div>
                                                    </div>    

                                                    <div class="control-group">
                                                        <label>Contraseña</label>
                                                        <div class="controls">
                                                            <input type="password" name="pass" class="form-control" required placeholder="Clave">

                                                        </div>

                                                        <div class="control-group">
                                                            <label></label>
                                                            <div class="controls">
                                                                <input type="hidden" name="rut" value="<?php $idEmpresa; ?>"/>
                                                                <input type="hidden" name="accion" value="agregar"/>
                                                                <button type="submit" class="btn btn-primary btn-fill">
                                                                    Publicar
                                                                </button>
                                                            </div>

                                                        </div>   



                                                        <!-- FORMULARIO -->


                                                    </div><!--/panel content-->
                                                </div><!--/panel-->
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
                                 <h4>Bienvenido  <?php echo $nombre ?> a tu panel</h4>
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
