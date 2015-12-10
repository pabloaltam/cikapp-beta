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
                                 <div class="alert alert-info alert-dismissable">
                                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i>Bienenido a tu panel!</h4>
Desde aquí podrás acceder a tu perfil, enviar mensajes a otros usuarios, y ver avisos de empresas.
      </div>   
                            </div>
                            <div class="content">
                          
       
<?php if ($tipo=='empresa') {?>
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                    </div>

                    <div class="col-md-8">

                    </div>
                </div>

                <div class="card">
                    <div class="col-md-8">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Noticias</h4>
                                <p class="category">Diario financiero RSS</p>
                            </div>
                            <div class="container-fluid"  style="height:300px; overflow-x: hidden;">
                                <?php
                                include "structure/rss/lastRSS.php";
                                $rss = new lastRSS;
                                $rss->cache_dir = './temp';
                                $rss->cache_time = 1200;
                                // cargar archivo RSS
                                $rs = $rss->get('https://www.df.cl/noticias/site/list/port/rss.xml');
                                // Muestra titulo y enlace
                                echo "<dl>\n";
                                foreach ($rs['items'] as $item) {
                                    ?>
                                    <dt><a href='<?php echo $item['link'] ?> '><?php echo $item['title'] ?> </a>
                                        <p><?php echo $item['description'] ?></p>
                                        <p><label>Categoria</label><?php echo $item['category'] ?><label>Fecha</label><?php echo $item['pubDate'] ?> </p>
                                    </dt>
                                    <?php
                                }
                                echo "</dl>\n";
                                ?>
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Cikapp noticias
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Publicar Aviso</h4>
                            </div>
                            <div class="content">
                                    
                                       
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
                                      



                                        <div class="footer">
                                            <hr>
                                            <div class="stats">
                                                <i class="fa fa-history"></i> Actualizado hace 3 minutos
                                            </div>
                                        </div>
                             
                            </div>
                        </div>
                    </div>
                </div>


                
            </div>
                              
<?php } else if ($tipo=='persona') { ?>

<div class="container-fluid">
                <div class="box box-default collapsed-box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Noticias</h3>
                    <p class="category">Diario financiero RSS</p>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
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
                                $rs = $rss->get('https://www.df.cl/noticias/site/list/port/rss.xml');
                                // Muestra titulo y enlace
                                echo "<dl>\n";
                                foreach ($rs['items'] as $item) {
                                    ?>
                                    <dt><a href='<?php echo $item['link'] ?> '><?php echo $item['title'] ?> </a>
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

<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </section>
        </div>
 <?php include 'structure/footer.panel.php'; ?>
