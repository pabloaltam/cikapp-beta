<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
include 'structure/navbar.panel.php';
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h3 class="box-title">Selecciona tu conversación</h3>
            </div>
            
            <div class="content">

             
              <?php if ($tipo=='empresa') {?>

                <?php } else if ($tipo=='persona') { ?>

                  <div class="content">
                            <?php
                                $mi_id = $_SESSION['id']; 
                                    require './include/conexion.php';
                                    $obtener_mensajes = "SELECT `hash`, `usuario_uno`, `usuario_dos` FROM grupo_mensajes WHERE usuario_uno='$mi_id' OR usuario_dos='$mi_id' ";
                                    $mostrar_usuarios = $mysqli->query($obtener_mensajes);

                                    while ($rows = $mostrar_usuarios->fetch_assoc()) {
                                        $hash = $rows['hash'];
                                        $usuario_uno = $rows['usuario_uno'];
                                        $usuario_dos = $rows['usuario_dos'];
                                        
                                        if($usuario_uno == $mi_id){
                                            $seleccionar_id = $usuario_dos;
                                        } else {
                                            $seleccionar_id = $usuario_uno;
                                        }
                                            $obtener_usuario = "SELECT `nombre`,`apellido` FROM usuario WHERE idUsuario='$seleccionar_id' ";
                                            $resultado = $mysqli->query($obtener_usuario);
                                            while ($rows = $resultado->fetch_assoc()) {
                                            $seleccionar_nombre = $rows['nombre'];
                                            $seleccionar_apellido = $rows['apellido'];
                                        }
                                        
                                        echo "
                                        <div class='box box-default collapsed-box'>
                                           <div class='box-header with-border'>
                                            <h3 class='box-title'>$seleccionar_nombre $seleccionar_apellido</h3>
                                            <div class='box-tools pull-right'>
                                              <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                                            </div><!-- /.box-tools -->
                                          </div><!-- /.box-header -->
                                          <div class='box-body'>
                                            Mensaje
                                          </div><!-- /.box-body -->
                                        </div><!-- /.box -->  
                                        ";
                                    }
                                
                            ?>
                    <br/>
                    <hr>
                    <a href="mostrar-usuarios.php" class="btn btn-warning btn-flat">Nueva conversación</a>
                     </div>
                     </div>

                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'structure/footer.panel.php'; ?>