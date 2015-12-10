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
                            </div>
                            <section class="content">
                              
      <div class="alert alert-info alert-dismissable">
                                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-info"></i> Personas</h4>
        Desde aquí puedes ver los usuarios existentes, ver su perfil y enviarles un mensaje.
      </div>   
<?php if ($tipo=='empresa') {?>
//TODO LO QUE VA EN EMPRESA
                              
<?php } else if ($tipo=='persona') { ?>

<div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <p class="category"></p>
                            </div>
                            <div class="content">
                        <?php
                        include("include/ejecutar_en_db.php");
                        $Usuarios = new OperacionesMYSQL();
                        ?>

                          <table class="table table-hover">
                            <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>E-Mail</th>
                            <th>Skype</th>
                            <th>Áreas de interés</th>
                          </tr>
                          </thead>
                            <tbody>
                        <?php 
                        $var_usuarios=$Usuarios ->mostrarUsuarios($rut);
                        $var_cantidad_usuarios=count($var_usuarios);?>
                        <?php for($j=0;$j<$var_cantidad_usuarios;$j++){?>
                          <tr>
                        <td><?php echo $var_usuarios[$j][0];?></td>
                        <td><?php echo $var_usuarios[$j][1];?></td>
                        <td><?php echo $var_usuarios[$j][2];?></td>
                        <td><?php echo $var_usuarios[$j][3];?></td>
                        <td><?php echo $var_usuarios[$j][4];?></td>
                        <?php $idUsuario = $var_usuarios[$j][5];?>
                        <td><a class="btn btn-sm btn-info btn-flat" href="mensajes.php?usuario=<?php echo $idUsuario ?> "   role="button" title="Enviar mensaje"><i class="fa fa-envelope"></i> Mensaje</a></td>
                        <td><a class="btn btn-sm btn-warning btn-flat" href="#" role="button" title="Ver perfil"><i class="fa fa-user"></i> Perfil</a></td>
                        </tr>
                        <?php };?>
                            </tbody>
                          </table>

                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
                            </section>
                        </div>
                    </div>
                </div>                    
            </div>
        </section>
        </div>
 <?php include 'structure/footer.panel.php'; ?>

