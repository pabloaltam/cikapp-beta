<?php
    define("TITLE", "Registrarse | Cikapp");
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
                        <i class="fa fa-user fa-2x"></i> 
                    </div>
                    <h3 class="panel-title user-row">Registrarse</h3> 
			 	</div>
			  	<div class="panel-body">
                    <div class="form-group">
    		    		  <label></label>
                          <hr>
			    	</div>
<form action="" method="POST" autocomplete="off" name="frmRegistrar" id="frmRegistrar">
                                <?php
                                if (isset($_POST["txtRut"])) {
                                    include 'include/ejecutar_en_db.php';
                                    $objBD = new OperacionesMYSQL();
                                    $codigoverificacion = rand(0000000000, 9999999999); // Conseguimos un codigo aleatorio de 10 digitos. 
                                    if ($objBD->crearUsuario(filter_input(INPUT_POST, "txtRut"), filter_input(INPUT_POST, "txtEmail"), filter_input(INPUT_POST, "txtPass"),  filter_input(INPUT_POST, "txtRepPass"), $codigoverificacion)) {
                                        $email = filter_input(INPUT_POST, "txtEmail");
                                        $headers = "From: admin@cikapp.com";
                                        $mensaje = "Usted solicito un registro en cikapp.com, para confirmarlo debe hacer click en el siguiente enlace: \r\nhttp://localhost/cikapp-web/usuario/confirmar.php?cod=" . $codigoverificacion."&Type=usuario";
                                        if (!mail("$email", "Confirmacion de registro en www.cikapp.com", "$mensaje", "$headers")) {
                                            echo "<p>No se pudo enviar el email de confirmacion.</p>";
                                        } else {
                                            echo "<p>Tu cuenta ha sido registrada, sin embargo, esta requiere que la confirmes desde el email que ingresaste en el registro.<p>";
                                        }
                                    } else {
                                        print '<p>Tu cuenta no pudo ser registrada, sin embargo puede volver a inténtalo dentro de unos minutos. Si el problema persiste comuníquese con nosotros por medio del formulario de contacto.</p>';
                                    }
                                }
                                ?>
                                <br>
                                <fieldset>
                                    <div class="form-group" id="campoRut">
                                        <div class="right-inner-addon">
                                            <input class="form-control input-lg" id="txtRut" required placeholder="Rut" name="txtRut" type="text" >
                                        </div>
                                    </div>
                                    <div class="form-group" id="campoEmail">
                                        <div class="right-inner-addon">
                                            <input id="txtEmail" class="form-control input-lg" required placeholder="Correo electrónico" name="txtEmail" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <input class="form-control input-lg" required placeholder="Contraseña" name="txtPass" type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="right-inner-addon">
                                            <input class="form-control input-lg" required placeholder="Confirmar contraseña" name="txtRepPass" id="" type="password">
                                        </div>
                                        <div id="passwordDescription"></div>
                                        <div id="passwordStrength" class="strength0"></div>
                                </fieldset>
                                <hr>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active text-center" id="pp">
                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Registrarse">
                                    </div>
                                </div>
                            </form>
	<?php include('structure/footer.php'); ?>