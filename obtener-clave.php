<?php
    define("TITLE", "Obtener Clave | Cikapp");
    include('structure/navbar.php');
if ($tipo!="visitante") {echo '<script>alert("Ya haz Iniciado Sesión '.$nombre.'");self.location="/panel.php"</script>'; die();}
?>
    
<div id="fullscreen_bg" class="fullscreen_bg"/>

    <div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default login">
			  	<div class="panel-heading">                            
                    <div class="row-fluid user-row">
                        <i class="fa fa-key fa-2x"></i> 
                    </div>
                    <h3 class="panel-title user-row">Recuperar Contraseña</h3> 
			 	</div>
			  	<div class="panel-body">
                    <div class="form-group">
    		    		  <label></label>
                          <hr>
			    	</div>
 <form action="" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
                                <?php
																include_once 'include/sign_in.php';

																if (isset($_POST['rut'], $_POST['email'])) {
																		$user = filter_input(INPUT_POST, "rut");
																		$email = filter_input(INPUT_POST, "email");
																		$user = str_replace('.', '', $user);
																		if (!($user == '') and ! ($email == '')) {
																				if (esEmpresa($user) == TRUE) {
																						recuperar_claveEmpresa($email, $user);
																				} else {
																						recuperar_claveUsuario($email, $user);
																				}
																		} else {
																				echo '<p>Es necesario que llene todos los campos requeridos.</p>';
																		}
																} else {
																		echo '<p>Ingrese su rut y su email para poder enviarle una nueva contraseña con la cual podra volver a ingresar a su cuenta.</p>';
																}
																?>
                                <br>
                                <fieldset>
                                    <div class="form-group has-success">
                                    <div class="right-inner-addon">
                                            <input class="form-control input-lg" placeholder="Rut" id="rut" name="rut" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <div class="right-inner-addon">
                                            <input class="form-control input-lg" placeholder="Email" id="email" name="email" type="text">
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-block btn-fill" type="submit">Solicitar nueva clave</button>
                                </div>
                            </form>
<?php include('structure/footer.php'); ?>
                            

