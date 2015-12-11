<?php
include 'structure/navbar.panel.php';
include './include/ejecutar_en_db.php';

$Obj_operaciones = new OperacionesMYSQL();
?>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div>
          <div class="box">
            <div class="box-header">
              <h4 class="box-title">Sistema de mensajes</h4>
            </div>
              <div class="content">
              <form method="post" id="formChat" role="form">
              <?php
                                                include("include/conexion.php");
                                                $mi_id = $_SESSION['id'];
                                                $usuario = $_GET['usuario'];
                                                $random_number = rand();

                                                if (isset($_POST['message']) && !empty($_POST['message'])) {
                                                  
                                                    $usuario = $_POST['user'];
                                                    $mensaje = $_POST['message'];
                                                    $revisar_conversacion = "SELECT `hash` FROM `grupo_mensajes` WHERE (`usuario_uno`='$mi_id' AND `usuario_dos`='$usuario') OR (`usuario_uno`='$usuario' AND `usuario_dos`='$mi_id')";
                                                    $resultado = $mysqli->query($revisar_conversacion);
                                                    $row_cnt = mysqli_num_rows($resultado);
                                                    echo "<p>$row_cnt</p>";
                                                    while ($rows = $resultado->fetch_assoc()) {
                                                        $old_hash = $rows['hash'];
                                                    }

                                                    if ($row_cnt >= 1) {
                                                        $mensaje=base64_encode($mensaje);
                                                        $guardar_msj = "INSERT INTO `mensajes` VALUES ('', '$old_hash', '$mi_id', '$mensaje',NOW())";
                                                        $resultado = $mysqli->query($guardar_msj);
                                                    } else {

                                                        $iniciar_conversacion = "INSERT INTO `grupo_mensajes` VALUES ('$mi_id', '$usuario','$random_number')";
                                                        $mensaje=base64_encode($mensaje);
                                                        $guardar_mensaje = "INSERT INTO `mensajes` VALUES ('', '$random_number', '$mi_id', '$mensaje',NOW())";

                                                        $resultado = $mysqli->query($iniciar_conversacion);
                                                        $resultado = $mysqli->query($guardar_mensaje);
                                                    }
                                                }
                                                $id = $_GET['usuario'];
                                                $consulta_usuarios = "SELECT nombre,apellido,apellidoM,idUsuario FROM usuario WHERE idUsuario = '$id' ";
                                                $resultado = $mysqli->query($consulta_usuarios);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    $nombre = $rows['nombre'];
                                                    $apellido = $rows['apellido'];
                                                    $apellidoM = $rows['apellidoM'];
                                                    $idUsuario = $rows['idUsuario'];
                                                }
                                                ?>
      <div class="box box-primary direct-chat direct-chat-info solid-box">
        <div class="box-header with-border">
          <h3 class="box-title">Mensaje a <label for="user"><?php echo $nombre . " " . $apellido . " " . $apellidoM; ?></label></h3>
          <input type="hidden" class="form-control" id="user" name="user" value="<?php echo $idUsuario ?>">

          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!-- In box-tools add this button if you intend to use the contacts pane -->
            <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages">
            <!-- Message. Default to the left -->
            <div id="conversation" class="direct-chat-msg">
              <!-- /.direct-chat-info -->
              
            </div>
            <!-- /.direct-chat-msg -->

          </div>
          <!--/.direct-chat-messages-->

          <!-- Contacts are loaded here -->
          <div class="direct-chat-contacts">
            <ul class="contacts-list">
              <li>
                <a href="#">
                  <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="Contact Avatar">
                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                Count Dracula
                <small class="contacts-list-date pull-right">2/28/2015</small>
              </span>
                    <span class="contacts-list-msg">How have you been? I was...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
            </ul>
            <!-- /.contatcts-list -->
          </div>
          <!-- /.direct-chat-pane -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="input-group">
           <input type="hidden" value="<?php $usuario?>" name="usuario">
          <input type="text" name="message" id="message" placeholder="Escribe tu mensaje" class="form-control">
          <span class="input-group-btn">
            <input type="submit" id="send" class="btn btn-primary btn-flat" value="Enviar"></input>
          </span>
          </div>
    
        </div>
        <!-- /.box-footer-->
      </div>
      <!--/.direct-chat -->
  </form>
              </div>
      </div>
    </div>
      </div>
  </div>
</section>
  </div>

    <?php
    include 'structure/footer.panel.php';
    ?>
      
