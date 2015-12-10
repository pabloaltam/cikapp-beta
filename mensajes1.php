<?php
include 'structure/navbar.panel.php';
include './include/ejecutar_en_db.php';

$Obj_operaciones = new OperacionesMYSQL();
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="box">
          <div class="box-header">
            <div class="container-fluid">
              <section style="padding: 5%;">
                <div class="row">
                  <h1 class="text-center">Sistema de mensajes<small></small></h1>
                      <form method="post" id="formChat" role="form">
      <?php
                                                include("include/conexion.php");
                                                $mi_id = $_SESSION['id'];
                                                $usuario2 = $_GET['usuario'];
                                                $random_number = rand();

                                                if (isset($_POST['message']) && !empty($_POST['message'])) {
                                                  
                                                    $usuario = $_POST['user'];
                                                    $mensaje = $_POST['message'];
                                                    $revisar_conversacion = "SELECT `hash` FROM `grupo_mensajes` WHERE (`usuario_uno`='$mi_id' AND `usuario_dos`='$usuario2') OR (`usuario_uno`='$usuario2' AND `usuario_dos`='$mi_id')";
                                                    $resultado = $mysqli->query($revisar_conversacion);
                                                    $row_cnt = mysqli_num_rows($resultado);
                                                    echo "<p>$row_cnt</p>";
                                                    while ($rows = $resultado->fetch_assoc()) {
                                                        $old_hash = $rows['hash'];
                                                    }

                                                    if ($row_cnt >= 1) {

                                                        $guardar_msj = "INSERT INTO `mensajes` VALUES ('', '$old_hash', '$mi_id', '$mensaje',NOW())";
                                                        $resultado = $mysqli->query($guardar_msj);
                                                    } else {

                                                        $iniciar_conversacion = "INSERT INTO `grupo_mensajes` VALUES ('$mi_id', '$usuario2','$random_number')";
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
    <div class="box box-info direct-chat direct-chat-info">
      <div class="box-header with-border">
        <h3 class="box-title">Mensaje a <?php echo $nombre . " " . $apellido . " " . $apellidoM; ?> </h3>
        <input type="text" class="form-control" id="user" name="user" value="<?php echo $idUsuario ?>">
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
        <div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
          
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
          <input type="text" value="<?php $usuario ?>" name="usuario">
          <input type="text" name="message" id="message" placeholder="Escribir mensaje" class="form-control">
          <span class="input-group-btn">
        <button id="send" type="submit" class="btn btn-warning">Enviar</button>
      </span>
        </div>
      </div>
      <!-- /.box-footer-->
    </div>
    </form>
    <!--/.direct-chat -->
                  <hr>
                  
                </div>

              </section>
            </div>


          </div>
        </div>


      </div>
    </div>

  </section>



  <?php include 'structure/footer.panel.php'; ?>
  <script src="structure/panel/js/mensaje.min.js"></script>