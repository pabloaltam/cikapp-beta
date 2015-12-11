<?php require('structure/sesion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo TITLE; ?>
    </title>
    <link href="structure/publico/bootstrap3/css/bootstrap.css" rel="stylesheet" />

    <link href="structure/publico/assets/css/cikapp.css" rel="stylesheet" />
    <link href="structure/publico/assets/css/demo.css" rel="stylesheet" />

    <!--     Font Awesome     -->
    <link href="structure/publico/bootstrap3/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

</head>

<body>
    <div id="navbar-full">
        <div id="navbar">
		<nav class="navbar navbar-blue" role="navigation">

				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="/">Cikapp</a>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Nosotros <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Qué es Cikapp?</a></li>
									<li><a href="#">Para empresas</a></li>
									<li><a href="#">Para personas</a></li>
								</ul>
							</li>
						</ul>
						
<!-- INICIO MENU USUARIOS -->
<div class="nav navbar-nav navbar-right">
<?php if ($tipo == "empresa") { ?>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-briefcase"></i> Avisos
    </a>
    <ul class="dropdown-menu dropdown-tasks">
        <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Aviso 1</strong>
                        <span class="pull-right text-muted">40% Completo</span>
                    </p>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Completo (success)</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Aviso 2</strong>
                        <span class="pull-right text-muted">20% Completo</span>
                    </p>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                            <span class="sr-only">20% Completo</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Aviso 3</strong>
                        <span class="pull-right text-muted">60% Completo</span>
                    </p>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only">60% Completo (warning)</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Aviso 4</strong>
                        <span class="pull-right text-muted">80% Completo</span>
                    </p>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="sr-only">80% Completo (danger)</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="text-center" href="publicaciones.php">
                <strong>Ver todos los Avisos</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    </li>
    <!-- Menu Usuario -->
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-institution"></i> <?php echo $razonSocial ?>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="panel.php"><i class="fa fa-gear fa-fw"></i> Panel</a></li>
        <li class="divider"></li>
        <li><a onClick="return confirm('¿Está seguro que desea cerrar sesión?')" href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
        </li>
    </ul>
    </li>
<?php } else if ($tipo == "persona") { ?>
<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-inbox"></i> Mensajes
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Juan Perez</strong>
                                    <span class="pull-right text-muted">
                                        <em>Ayer</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Natalia Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Ayer</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Ayer</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="mensajes.php">
                                <strong>Leer todos los mensajes</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i> <?php echo $nombre ?>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
											<li><a href="panel.php"><i class="fa fa-gear fa-fw"></i> Mi panel</a>
                         </li>
                        <li><a href="perfil.php"><i class="fa fa-user fa-fw"></i> Mi perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a onClick="return confirm('¿Está seguro que desea cerrar sesión?')" href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
<?php } else if ($tipo == "visitante") { ?>      
<a class="btn btn-round btn-default" href="registro.php" role="button"><i class="fa fa-user"></i> Registrarse</a>
<a class="btn btn-round btn-default" href="login.php" role="button"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
<?php } ?>
</div>
<!-- FIN MENU USUARIOS -->

					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
			</div>
			</div>