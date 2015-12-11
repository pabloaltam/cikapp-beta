<?php define("TITLE", "Iniciar sesión | Cikapp"); include('structure/navbar-opera.php');
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
            <form class="register-form" action="login.php" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
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
                                        echo ' <label>Es necesario que ingrese sus datos primero </label>';
                                    }
                                } else {
                                    echo ' <label>Si cuenta con un registro previo a continuación ingrese sus datos.</label>';
                                }
                                ?>
                                    <label>Rut</label>
                                    <input type="text" class="form-control" placeholder="Rut" id="rut" name="rut">

                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Password" id="pass" name="pass">
                                    <button class="btn btn-primary btn-block" type="submit" id="btnIniciar" >Entrar</button>
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