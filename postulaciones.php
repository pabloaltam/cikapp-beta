<?php require 'structure/navbar.panel.php'; require 'structure/avisos.class.php'; $obj_trabajo=new trabajos();?>
<section class="content"> <div class="container-fluid"> <div class="row"> <div> <div class="content">
  <?php if ($tipo=='empresa') {
  echo "Lista de Avisos con Postulantes";
}

else if ($tipo=='persona') {
    if ($_GET['accion']=='cancelar') {
        $idPublicacion=preg_replace( '/[^0-9]/', '', $_GET['i']);
        try {
            $obj_trabajo ->eliminaPostulacion($idPublicacion, $id);
        }
        catch(Exception $e) {
            echo "Se ha producido un error : ".$e->getMessage();
        }
        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <h4><i class="icon fa fa-info"></i>Postulación del Aviso &numero;
        '.$idPublicacion.' Cancelada! </h4>Postulación Cancelada Exitosamente,
        para volver a postular <a href=avisos.php?accion=leer&id='.$idPublicacion.'>ingresa aquí</a>.</div>';

    }
    else if ($_POST['accion']=='postular') {
        $idPublicacion=preg_replace( '/[^0-9]/', '', $_POST['i']);
        if (($obj_trabajo -> compruebaPostulacion($idPublicacion, $id))=="true") {
            try {
                $obj_trabajo ->nuevaPostulacion($_POST['i'], $id);
            }
            catch(Exception $e) {
                echo "Se ha producido un error : ".$e->getMessage();
            }
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <h4><i class="icon fa fa-info"></i>Postulacion Realizada! </h4>Acabas de Postular al Trabajo &numero;
            '.$idPublicacion.'. Te deseamos Éxito! en el proceso de postulación.</div>';

        }
        else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <h4><i class="icon fa fa-ban"></i>Ya Postulaste! </h4>Anteriormente habías postulado al aviso &numero;
            '.$idPublicacion.'</div>';

        }
    }
    ?> <div class="box"> <div class="box-header">
  <?php
  $filas='';
  $resultado=$obj_trabajo->postulacionesUsuario($id);
  $cantidad=$resultado->num_rows;
  //echo "CANTIDAD".count($cantidad);
  if($cantidad>0){
//IMPRIME INICIO_TABLA
echo '<h2><span class="fa fa-paper-plane fa-fw text-blue"></span> Mis Postulaciones</h2> <div class="content table-responsive table-full-width">

<table class="table table-hover table-striped"> <thead> <tr>  <th>&numero;</th><th>CARGO</th> <th>LUGAR DE TRABAJO</th> <th>CONTRATO</th> <th>JORNADA LABORAL</th> <th>DESCRIPCION</th> <th>FECHA PUBLICACIÓN</th> <th>ACCIONES</th> </tr> </thead> <tbody>';
  //INICIO LLENAR TABLA
    while ($rows=$resultado->fetch_assoc()) { 
      $filas=$rows; ?>
  <tr>
      <td><?php echo $rows['id'];?></td>
      <td><?php echo $rows['cargo'];?></td>
      <td><?php echo $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
        ?></td> <td><?php echo $rows['tipo_contrato'];
        ?></td> <td><?php echo $rows['tipo_jornada'];
        ?></td> <td><?php echo $rows['publicacion'];
        ?></td> <td><?php echo $rows['fecha_publicacion'];
        ?></td> <td><a href="avisos.php?accion=leer&id=<?php echo $rows['id'];?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Leer Aviso &numero; <?php echo $rows['id'];?>"><span class="fa fa-eye fa-fw"></span> Leer</a>&nbsp;
        <a onclick="return confirm('Esta seguro de Cancelar la Postulación?');" href="postulaciones.php?accion=cancelar&i=<?php echo $rows['id'];?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Cancelar la Postulación Definitivamente!"><span class="fa fa-remove fa-fw"></span> Cancelar</a></td> </tr> 
  <?php } //FIN LLENAR TABLA
  
  //IMPRIME FIN_TABLA
   echo '</tbody> </table> </div> </div></div>';
  //IMPRIME ADVERTENCIA SI NO HAY DATOS
   } else {echo '<div class="callout callout-warning"> <h4><i class="icon fa fa-warning"></i> No hay Postulaciones</h4> <p>Te invitamos a que <a href="avisos.php">revises los avisos</a> y postules al trabajo que desees.</p> </div>';}
  
  } //FIN TIPO PERSONA
    ?>   </div> </div> </div> </div> </section> </div> <?php include 'structure/footer.panel.php';
?>
