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
              <h4 class="box-title">TITULO PARA AMBOS</h4>
            </div>
            <div class="content">

              <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i>Bienenido a tu panel!</h4> Desde aquí podrás acceder a tu perfil, enviar mensajes a otros usuarios, y ver avisos de empresas.
              </div>
              <?php if ($tipo=='empresa') {?>
                //TODO LO QUE VA EN EMPRESA

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
                                        
                                        echo "<p><a href='mensajes.php?usuario=$usuario_dos'>$seleccionar_nombre $seleccionar_apellido</a></p>";
                                    }
                                
                            ?>
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