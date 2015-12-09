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
                  <h1 class="text-center">Sistema de mensajería<small></small></h1>
                  <hr>
                </div>
                <div class="row">
                  <form method="post" id="formChat" role="form">
                    <div class="form-group">
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

                                                        $guardar_msj = "INSERT INTO `mensajes` VALUES ('', '$old_hash', '$mi_id', '$mensaje',NOW())";
                                                        $resultado = $mysqli->query($guardar_msj);
                                                    } else {

                                                        $iniciar_conversacion = "INSERT INTO `grupo_mensajes` VALUES ('$mi_id', '$usuario','$random_number')";
                                                        $guardar_mensaje = "INSERT INTO `mensajes` VALUES ('', '$random_number', '$mi_id', '$mensaje',NOW())";

                                                        $resultado = $mysqli->query($iniciar_conversacion);
                                                        $resultado = $mysqli->query($guardar_mensaje);
                                                    }
                                                }
                                                $idUsuario2 = $_GET['usuario'];
                                                $consulta_usuarios = "SELECT nombre,apellido,apellidoM,idUsuario FROM usuario WHERE idUsuario = '$idUsuario2' ";
                                                $resultado = $mysqli->query($consulta_usuarios);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    $nombre = $rows['nombre'];
                                                    $apellido = $rows['apellido'];
                                                    $apellidoM = $rows['apellidoM'];
                                                    $idUsuario = $rows['idUsuario'];
                                                }
                                                ?>

                        <p class="help-block">Enviar mensaje a</p>
                        <input type="hidden" class="form-control" id="user" name="user" value="<?php echo $usuario ?>">
                        <label for="user">
                          <?php echo $nombre . " " . $apellido . " " . $apellidoM; ?>
                        </label>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" value="<?php $usuario?>" name="usuario">
                      <label for="message">Mensaje</label>
                      <textarea id="message" name="message" placeholder="Ingresar mensaje" class="form-control" rows="3"></textarea>
                    </div>
                    <input id="send" type="submit" class="btn btn-primary" value="Enviar">
                  </form>
                </div>
              </section>
            </div>


          </div>
        </div>


      </div>
    </div>
    <form method="post" id="formChat" role="form">
      <?php
                                                include("include/conexion.php");
                                                $mi_id = $_SESSION['idUsuario'];
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

                                                        $guardar_msj = "INSERT INTO `mensajes` VALUES ('', '$old_hash', '$mi_id', '$mensaje',NOW())";
                                                        $resultado = $mysqli->query($guardar_msj);
                                                    } else {

                                                        $iniciar_conversacion = "INSERT INTO `grupo_mensajes` VALUES ('$mi_id', '$usuario','$random_number')";
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
        <div id="conversation" class="direct-chat-messages">
          <!-- Message. Default to the left -->
          <div class="direct-chat-msg">
            <div class="direct-chat-info clearfix">
              <span class="direct-chat-name pull-left">Alexander Pierce</span>
              <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
            </div>
            <!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="message user image">
            <!-- /.direct-chat-img -->
            <div class="direct-chat-text">
              Is this template really for free? That's unbelievable!
            </div>
            <!-- /.direct-chat-text -->
          </div>
          <!-- /.direct-chat-msg -->

          <!-- Message to the right -->
          <div class="direct-chat-msg right">
            <div class="direct-chat-info clearfix">
              <span class="direct-chat-name pull-right">Sarah Bullock</span>
              <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
            </div>
            <!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="message user image">
            <!-- /.direct-chat-img -->
            <div class="direct-chat-text">
              You better believe it!
            </div>
            <!-- /.direct-chat-text -->
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
          <input type="text" name="message" placeholder="Type Message ..." class="form-control">
          <span class="input-group-btn">
        <button type="button" class="btn btn-danger btn-flat">Send</button>
      </span>
        </div>
      </div>
      <!-- /.box-footer-->
    </div>
    </form>
    <!--/.direct-chat -->
  </section>

  <script src="structure/panel/js/mensaje.min.js"></script>

  <?php include 'structure/footer.panel.php'; ?>