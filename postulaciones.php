<?php require 'structure/avisos.class.php';
$obj_trabajo=new trabajos();
include 'structure/navbar.panel.php';
?> <section class="content"> <div class="container-fluid"> <div class="row"> <div> <div class="content"> <?php if ($tipo=='empresa') {
    ?> <?php
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
    else if ($_GET['accion']=='postular') {
        $idPublicacion=preg_replace( '/[^0-9]/', '', $_GET['i']);
        if (($obj_trabajo -> compruebaPostulacion($idPublicacion, $id))=="true") {
            try {
                $obj_trabajo ->nuevaPostulacion($_GET['i'], $id);
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
    ?> <?php $resultado=$obj_trabajo->postulacionesUsuario($id);
    $filas='';
    while ($rows=$resultado->fetch_assoc()) {
      $filas=$rows;
      if($filas!=0){
        ?> <div class="box"> <div class="box-header"><h2>Mis postulaciones</h2> <div class="content table-responsive table-full-width"> <table class="table table-hover table-striped"> <thead> <tr> <th>CARGO</th> <th>LUGAR DE TRABAJO</th> <th>CONTRATO</th> <th>JORNADA LABORAL</th> <th>DESCRIPCION</th> <th>FECHA PUBLICACIÓN</th> <th>ACCIONES</th> </tr> </thead> <tbody> <tr> <td><?php echo $rows['cargo'];
        ?></td> <td><?php echo $rows['COMUNA_NOMBRE'] . ", " . $rows['REGION_NOMBRE'] . ", " . $rows['PAIS_NOMBRE'];
        ?></td> <td><?php echo $rows['tipo_contrato'];
        ?></td> <td><?php echo $rows['tipo_jornada'];
        ?></td> <td><?php echo $rows['publicacion'];
        ?></td> <td><?php echo $rows['fecha_publicacion'];
        ?></td> <td><a href="avisos.php?accion=leer&id=<?php echo $rows['id'];?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Leer Aviso &numero; <?php echo $rows['id'];?>"><span class="fa fa-eye fa-fw"></span> Leer</a>&nbsp;
        <a onclick="return confirm('Esta seguro de Cancelar la Postulación?');" href="postulaciones.php?accion=cancelar&i=<?php echo $rows['id'];?>" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Cancelar la Postulación Definitivamente!"><span class="fa fa-remove fa-fw"></span> Cancelar</a></td> </tr> <?php
    } 
      echo '</tbody> </table> </div> </div></div>';
      }
  
   if($filas==''){ echo "<h1>No haz echo ninguna postulacion</h1>";}
  } //FIN TIPO PERSONA
    ?>   </div> </div> </div> </div> </section> </div> <?php include 'structure/footer.panel.php';
?>
