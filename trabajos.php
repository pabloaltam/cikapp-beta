<?php 
include 'structure/navbar.panel.php';
require('structure/trabajos.class.php');
$obj_publicacion = new trabajos();
?> 
        <div class="content">
            <div class="container-fluid">
                
                
<?php if ($_GET['id']!=''){ ?>

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
                                    <?php $var_publicacion=$obj_publicacion -> obtieneUnAviso($_GET['id']);?>
<tr>
<td><?php echo $var_publicacion[0][0];?></td>
<td><?php echo $var_publicacion[0][1];?></td>
<td><?php echo $var_publicacion[0][2];?></td>
<td><?php echo $var_publicacion[0][3];?></td>
<td><?php echo $var_publicacion[0][4];?></td>
<td><?php echo $var_publicacion[0][5];?></td>
<td><?php echo $var_publicacion[0][6];?></td>
<td><?php echo $var_publicacion[0][7];?></td>
<td><?php echo $var_publicacion[0][8];?></td>
<td><a href="avisos.php?accion=editar&id=<?php echo $var_publicacion[0][0];?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Editar Aviso &numero; <?php echo $var_publicacion[0][0];?>"><span class="fa fa-pencil fa-fw"></span> Editar</a>&nbsp;<a onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_publicacion[0][0];?>?');" href="avisos.php?accion=eliminar&id=<?php echo $var_publicacion[0][0];?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Aviso &numero; <?php echo $var_publicacion[0][0];?>"><span class="fa fa-remove fa-fw"></span> Eliminar</a></td>
</tr>
    </tbody>
                                </table>

                                   
                            </div>
                        </div>
                    </div> 
                </div>           
            </div>
        </div>





<div class="container col-md-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><a href="/trabajos.php?id=<?php echo $var_publicacion[0][0];?>"><?php echo $var_publicacion[0][1];?></a></h3>
    </div>
    <div class="panel-body">
        <div class="col-md-6"><?php echo $var_publicacion[0][6]; ?>
      </div>
      <div class="col-md-6">
          <strong>Publicado el: </strong> <?php echo substr($var_publicacion[0][8],0,10);?>
          </div>
    </div>
  </div>







<div class="col-md-12">
<div class="col-md-8">
    <div class="jobs-item jobs-single-item">
        <div class="widget-content">
            <h4 class="bottom-line pb10"> <b>Encuestador CASEN 2015</b> <br /> </h4>
            <div class="col-xs-12 col-md-7">
                <table class="mb10">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td><a href="http://www.chiletrabajos.cl/trabajo/1153530" class="copy-link">1153530</a></td>
                        </tr>
                        <tr>
                            <td>Buscado por</td>
                            <td>
                                <div itemprop="hiringOrganization" itemscope itemtype="http://schema.org/Organization">
                                    <div itemprop="name">Centro de Microdatos de la Facultad de Econom&iacute;a y Negocios de la Universidad de Chile</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td>
                                <div itemprop="datePosted">2015-10-15</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ubicaci&oacute;n</td>
                            <td>Putre, Chile</td>
                        </tr>
                        <tr>
                            <td>Categor&iacute;a</td>
                            <td>
                                <div itemprop="industry">Otros</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Duraci&oacute;n</td>
                            <td>31 enero 2016</td>
                        </tr>
                        <tr>
                            <td>Tipo</td>
                            <td>Part-time</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td> <a href="http://www.chiletrabajos.cl/chtlogin">Inicia sesi&oacute;n para ver mail.</a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12 col-md-5">
                <table class="datos">
                    <tbody>
                        <tr>
                            <td>
                                <a href="http://www.chiletrabajos.cl/encuentra-un-empleo/?2=&13=&5=&8=Centro+de+Microdatos+de+la+Facultad+de+Econom%C3%ADa+y+Negocios+de+la+Universidad+de+Chile&14=&categoria=&filterSearch=Buscar"> <img src="https://s3.amazonaws.com/cht2/img/ch/featured.png" alt="" class="image-oferta"> </a>
                            </td>
                        </tr>
                        <tr>
                            <td> <a class="btn btn-default mb10 postular-no-session" style="width:100%;" href="http://www.chiletrabajos.cl/chtlogin">Postular</a> </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#" class="btn btn-default guardar " data-id="1153530" style="width:100%;"> <i class="fa fa-heart"></i> Guardar </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="jobs-item jobs-single-item">
        <div class="col-md-12 text-right"> <font color="#243B0B" size="2">Este Anuncio ha sido Visualizado: <b>211</b> Veces</font>
            <br />
            <a href="#" class="sendToFriend" data-id="1153530"><img alt="Email to friend" src="http://cdn.chiletrabajos.cl/c2/images/mail.gif" border="0" width="20" height="11">Envia este anuncio a un amigo</a>
            <br /> <font color="#243B0B" size="2">Interesados: <b>5</b></font> </div>
    </div>
    <div class="jobs-item jobs-single-item">
        <div class="clearfix visible-xs"></div>
        <div class="date">15 <span>Oct</span></div>
        <h5 class="title interior"> <a href="#">Encuestador CASEN 2015</a> <hr /> <span class="meta">Centro de Microdatos de la Facultad de Econom&iacute;a y Negocios de la Universidad de Chile</span> </h5>
        </div>
</div>
</div>
<?php } else {?>
 <div class="row">    
                    <div class="col-md-12">
                        <div class="card">
                            <div><a href="trabajos.php?accion=nuevo" class="btn btn-success btn-lg active" role="button"><span class="pe-7s-plus"> Nuevo Aviso</span></a></div>
                            <div class="header">
                                <h4 class="title">Últimas Publicaciones</h4>
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
                                    <?php 
$var_publicaciones=$obj_publicacion ->obtieneUltimosTrabajos();
$var_cantidad_publicaciones=count($var_publicaciones);?>
<?php for($j=0;$j<$var_cantidad_publicaciones;$j++){?>
  <tr>
<td><?php echo $var_publicaciones[$j][0];?></td>
<td><?php echo $var_publicaciones[$j][1];?></td>
<td><?php echo $var_publicaciones[$j][2];?></td>
<td><?php echo $var_publicaciones[$j][3];?></td>
<td><?php echo $var_publicaciones[$j][4];?></td>
<td><?php echo $var_publicaciones[$j][5];?></td>
<td><?php echo $var_publicaciones[$j][6];?></td>
<td><?php echo $var_publicaciones[$j][7];?></td>
<td><?php echo $var_publicaciones[$j][8];?></td>
<td><a href="trabajos.php?accion=editar&id=<?php echo $var_publicaciones[$j][0];?>"><input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: green;" value="Editar"> </a>&nbsp;<a onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_publicaciones[$j][0];?>?');" href="trabajos.php?accion=eliminar&id=<?php echo $var_publicaciones[$j][0];?>"><input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: red;" value="Eliminar"> </a></td>
</tr>
<?php };?>
    </tbody>
                                </table>
                                   
                            </div>
                        </div>
                    </div> 
                </div>           
            </div>
        </div>
        <?php } ?>       
 <?php include 'structure/footer.panel.php'; ?>