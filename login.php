<?php
    define("TITLE", "Iniciar Sesión | Cikapp");
    include('structure/navbar.php');
if ($tipo!="visitante") {echo '<script>alert("Ya haz Iniciado Sesión '.$nombre.'");self.location="/panel.php"</script>'; die();}
?>
<link href="structure/publico/assets/css/cikapp.css" rel="stylesheet">

<div id="fullscreen_bg" class="fullscreen_bg" />

<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default login">
                <div class="panel-heading">
                    <div class="row-fluid user-row">
                        <i class="fa fa-sign-in fa-2x"></i>
                    </div>
                    <h3 class="panel-title user-row">Iniciar Sesión</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label></label>
                        <hr>
                    </div>
                    <form action="login.php" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
							<?php
                                include_once 'include/sign_in.php';

                                if (isset($_POST['rut'], $_POST['pass'])) {
                                    $rut = filter_input(INPUT_POST, "rut");
                                    $pass = filter_input(INPUT_POST, "pass");

                                    if (!($rut == '') and ! ($pass == '')) {
                                        if(esEmpresa($rut)){
                                            loginEmpresa($rut, $pass);
                                        }else{
                                            loginUsuario($rut, $pass);
                                        } 
                                    } else {
                                        echo '<p>Es necesario que ingrese sus datos primero</p>';
                                    }
                                } else {
                                    echo '<p>Si cuenta con un registro previo a continuación ingrese sus datos.</p>';
                                }
                                ?>
<br>
<fieldset>
    <div id="txtRut" class="form-group has-success has-error">
        <div class="right-inner-addon"> <i id="imgRut" class="fa fa-exclamation-circle"></i>
            <input class="form-control input-lg has-success" placeholder="Rut" id="rut" name="rut" type="text"> </div>
    </div>
    <div class="form-group has-success">
        <div class="right-inner-addon"> <i class="fa fa-key"></i>
            <input class="form-control input-lg" placeholder="Contraseña" id="pass" name="pass" type="password"> </div>
    </div>
</fieldset>
<br> <a href="obtener-clave.php">Olvidé mi contraseña</a>
<br>
<br>
<button class="btn btn-primary btn-block btn-fill" type="submit" disabled="" id="btnIniciar">Ingresar</button>
</form>
						<?php include('structure/footer.php'); ?>