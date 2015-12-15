<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
include 'structure/navbar.panel.php';
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title"><i span class="fa fa-inbox text-light-blue"></i> Selecciona tu conversación</h3>
            </div>
            <div class="box-body">

             
              <?php if ($tipo=='empresa') {?>

                <?php } else if ($tipo=='persona') { ?>

                  
              <ul class="nav nav-stacked">              
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
                                            $obtener_usuario = "SELECT `nombre`,`apellido`,`rutaImagen` FROM usuario WHERE idUsuario='$seleccionar_id' ";
                                            $resultado = $mysqli->query($obtener_usuario);
                                            while ($rows = $resultado->fetch_assoc()) {
                                            $seleccionar_nombre = $rows['nombre'];
                                            $seleccionar_apellido = $rows['apellido'];
                                            $seleccionar_imagen = $rows['rutaImagen'];
                                        }
                                        
                                        echo "
                                        <li><a href='mensajes.php?usuario=$seleccionar_id'>$seleccionar_nombre $seleccionar_apellido <img class='pull-right' src='$seleccionar_imagen' style='width:20px;height:20px;-moz-border-radius:50px;-webkit-border-radius:50px;border-radius: 50px' alt='foto perfil'></span></a></li>
                                          
                                        ";
                                    }
                            ?>
                </ul>
              <br/>
                    <a href="mostrar-usuarios.php" class="pull-right btn btn-info">Nueva conversación</a>
                     
                     </div>

                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'structure/footer.panel.php'; ?>