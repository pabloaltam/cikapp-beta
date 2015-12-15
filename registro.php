<?php define("TITLE", "Nueva cuenta | Cikapp"); include('structure/navbar-opera.php');
if ($tipo!="visitante") {echo '<script>alert("Ya haz Iniciado Sesión '.$nombre.'");self.location="/panel.php"</script>'; die();}
?>

    <div class="wrapper">
        <div class="register-background"> 
            <div class="filter-black"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                <h3 class="title">Bienvenido</h3>
            										<form action="" method="POST" autocomplete="off" name="frmRegistrar" id="frmRegistrar" class="register-form">
                                  <?php
                              if (isset($_POST["txtRut"])) {
																$as = substr($_POST['txtRut'], 0, 3);
                    if ($as < 50) {
                        $codigoverificacion = rand(0000000000, 9999999999);
                        
                        include 'include/ejecutar_en_db.php';
                        $objBD = new OperacionesMYSQL();
                        if ($objBD->crearUsuario($_POST["txtRut"], filter_input(INPUT_POST, "txtEmail"), filter_input(INPUT_POST, "txtPass"), filter_input(INPUT_POST, "txtRepPass"), $codigoverificacion)) {
                            $email = filter_input(INPUT_POST, "txtEmail");
                            
                            $headers = "From: Cikapp <admin@cikapp.com>";
                            $mensaje = "Usted solicito un registro en cikapp.com, para confirmarlo debe hacer click en el siguiente enlace: \r\nhttp://www.cikapp.com/usuario/confirmar.php?cod=" . $codigoverificacion . "&Type=usuario";
                            if (!mail("$email", "Confirmacion de registro en www.cikapp.com", "$mensaje", "$headers")) {
                                echo '<div class="alert alert-danger alert-dismissable">
                              					No se pudo enviar el email de confirmacion</div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable">
                              				Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro</div>';
														}
                        } else {
                            print '<div class="alert alert-danger alert-dismissable">
                              			Tu cuenta no pudo ser registrada, sin embargo puede volver a inténtalo dentro de unos minutos. Si el problema persiste comuníquese con nosotros por medio del formulario de contacto</div>';
                        }
                    } else {
                        $codigoverificacion = rand(0000000000, 9999999999);
                        include 'include/ejecutar_en_db.php';
                        $objBD = new OperacionesMYSQL();
                        if ($objBD->crearEmpresa(filter_input(INPUT_POST, "txtRut"), filter_input(INPUT_POST, "txtEmail"), filter_input(INPUT_POST, "txtPass"), filter_input(INPUT_POST, "txtRepPass"), $codigoverificacion)) {
                            $email = filter_input(INPUT_POST, "txtEmail");
                            
                            $headers = "From: admin@cikapp.com";
                            $mensaje = "Usted solicito un registro en cikapp.com, para confirmarlo debe hacer click en el siguiente enlace: \r\nhttp://www.cikapp.com/usuario/confirmar.php?cod=" . $codigoverificacion . "&Type=empresa";
                            if (!mail("$email", "Confirmacion de registro en www.cikapp.com", "$mensaje", "$headers")) {
                                echo '<div class="alert alert-danger alert-dismissable">
                             						No se pudo enviar el email de confirmacion</div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable">
                             	 					Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro</div>';
														}
                        } else {
                            print '<div class="alert alert-danger alert-dismissable">
                             				Tu cuenta no pudo ser registrada, sin embargo puede volver a inténtalo dentro de unos minutos. Si el problema persiste comuníquese con nosotros por medio del formulario de contacto</div>';
												}
                    }
                }
                                ?>  
																	<label>Rut</label>
                                    <input type="text" class="form-control" placeholder="Rut" id="rut" name="txtRut">
																		
																		<label>Correo electrónico</label>
                                    <input type="text" class="form-control" placeholder="Correo electrónico" id="txtEmail" name="txtEmail">
							
																		<label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Password" name="txtPass" id="pass">
							
                                    <label>Confirmar contraseña</label>
                                    <input type="password" class="form-control" placeholder="Password" id="pass" name="txtRepPass">
                                    <button class="btn btn-primary btn-block" type="submit" id="btnIniciar">Crear cuenta</button>
                                </form>
                                <div class="forgot">
                                    <a href="obtener-clave.php" class="btn btn-simple btn-info">¿Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            <div class="footer register-footer text-center">
                    <h6><i class="fa fa-heart heart"></i> por Cikapp Developers</h6>
            </div>
        </div>
    </div>

<?php include('structure/footer.php'); ?>