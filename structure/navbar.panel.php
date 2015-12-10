<?php
include 'sesion.php';
if ($tipo=="visitante") {header("Location: login.php"); die();}
?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="structure/panel/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>
			<?php echo ucfirst($estaPagina); ?> | Cikapp</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />


		<!-- Bootstrap core CSS     -->
		<link href="structure/panel/css/bootstrap.min.css" rel="stylesheet" />
		
		<!--     Fonts and icons     -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		<link href="structure/panel/css/pe-icon-7-stroke.css" rel="stylesheet" />

		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="structure/panel/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
		<link rel="stylesheet" href="structure/panel/css/skin-blue-light.min.css">
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
		<link href="structure/panel/css/jquery.tagit.css" rel="stylesheet" type="text/css">
		<link href="structure/panel/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	</head>

	<body class="hold-transition skin-blue-light fixed sidebar-mini">
		<div class="wrapper">

			<!-- Main Header -->
			<header class="main-header">

				<!-- Logo -->
				<a href="index.php" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>C</b>APP</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Cik</b>app</span>
				</a>

				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->
							<li class="dropdown messages-menu">
								<!-- Menu toggle button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-envelope-o"></i>
									<span class="label label-success">4</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">Tienes 4 mensajes</li>
									<li>
										<!-- inner menu: contains the messages -->
										<ul class="menu">
											<li>
												<!-- start message -->
												<a href="#">
													<div class="pull-left">
														<!-- User Image -->
														<img src="structure/panel/img/user2-160x160.jpg" class="img-circle" alt="User Image">
													</div>
													<!-- Message title and timestamp -->
													<h4>
                            Pablo
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
													<!-- The message -->
													<p>Test</p>
												</a>
											</li>
											<!-- end message -->
										</ul>
										<!-- /.menu -->
									</li>
									<li class="footer"><a href="sistema-mensajes.php">Ver todos</a></li>
								</ul>
							</li>
							<!-- /.messages-menu -->

							<!-- Notifications Menu -->
							<?php
include './include/notificaciones.class.php';
$obj_notificaciones = new Notificaciones();
$contador_notificaciones=$obj_notificaciones->traerTotalNotificaciones('$id');
?>
								<li class="dropdown notifications-menu">
									<!-- Menu toggle button -->
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-bell-o"></i>
										<span class="label label-warning"><?php
        echo $contador_notificaciones;
        ?></span>
									</a>
									<ul class="dropdown-menu">
										<li class="header">Tienes <?php if($contador_notificaciones){
        echo $contador_notificaciones." notificaciones nuevas";
                
    }else{ 
        echo "1  notificacion nueva.";
                
    }?></li>
										<li>
											<!-- Inner Menu: contains the notifications -->
											<ul class="menu" id="notificacion">

												<?php
                $obj_notificaciones->traerNotificaciones($id);
                ?>

													<!-- end notification -->
											</ul>
										</li>
										<li class="footer"><a href="#">Ver todas</a></li>
									</ul>
								</li>
								
								<!-- User Account Menu -->
								<li class="dropdown user user-menu">
									<!-- Menu Toggle Button -->
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<!-- The user image in the navbar-->
										<img src="<?php echo $rutaImagen;?>" class="user-image" alt="foto perfil">
										<!-- hidden-xs hides the username on small devices so only the image appears. -->
										<?php if ($tipo=='persona') { // OPCIONES PERSONA ?>
										<span class="hidden-xs"><?php echo $nombre ." " .$apellido; ?></span>
										<?php } else if ($tipo=='empresa') { // OPCIONES EMPRESA ?>
										<span class="hidden-xs"><?php echo $razonSocial; ?></span>
										<?php } ?>
									</a>
									<ul class="dropdown-menu">
										<!-- The user image in the menu -->
										<li class="user-header">
											<img src="<?php echo $rutaImagen;?>" class="img-circle" alt="User Image">
											<p>
												<?php echo $nombre; ?>
													<small><?php echo $email; ?></small>
											</p>
										</li>
										<!-- Menu Body -->
										<li class="user-body">
											<div class="col-xs-6 text-center">
												<a href="index.php">Inicio</a>
											</div>
											<div class="col-xs-6 text-center">
												<a href="#">Nosotros</a>
											</div>
										</li>
										<!-- Menu Footer-->
										<li class="user-footer">
											<div class="pull-left">
												<a href="#" class="btn btn-primary btn-flat">Ver perfil</a>
											</div>
											<div class="pull-right">
												<a onClick="return confirm('¿Está seguro que desea cerrar sesión?')" href="logout.php" class="btn btn-danger btn-flat">Cerrar sesión</a>
												
											</div>
										</li>
									</ul>
								</li>
								<!-- Control Sidebar Toggle Button -->
								<li>
									<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
								</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">

				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">

					<!-- Sidebar user panel (optional) -->
					<div class="user-panel">
						<div class="pull-left image">
							<img src="<?php echo $rutaImagen;?>" class="thumbnail" alt="foto perfil">
						</div>
						<div class="pull-left info">
							<p>
								<?php echo $nombre ." " .$apellido; ?>
							</p>
							<!-- Status -->
							<a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
						</div>
					</div>
					
					<!-- Sidebar Menu -->
					<ul class="sidebar-menu">
						<li class="treeview">
          <a href="#">
            <i class="fa fa-rocket"></i> <span>CIKAPP TEAM</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu list-group">
            <li><a href="index.php"><i class="fa fa-circle-o"></i><span> Bienvenida</span></a></li>
						<li><a href="nosotros.php"><i class="fa fa-circle-o"></i><span> Quiénes somos</span></a></li>
          </ul>
        </li>
						
						<li class="header">OPCIONES PANEL</li>
						<li <?php if ($estaPagina=='panel' ) {echo 'class="active"'; }?>>
							<a href="panel.php">
								<i class="fa fa-dashboard"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li <?php if ($estaPagina=='editar-perfil' ) {echo 'class="active"'; }?>>
							<a href="editar-perfil.php">
								<i class="fa fa-user"></i>
								<span>Perfil</span>
							</a>
						</li>
						
						<?php if ($tipo=='empresa') { // OPCIONES DEL MENU PARA EMPRESA ?>
							<li <?php if ($estaPagina=='avisos' ) {echo 'class="active"'; }?>>
								<a href="avisos.php">
									<i class="fa fa-suitcase"></i>
									<span>Avisos publicados</span>
								</a>
							</li>
							<li <?php if ($estaPagina=='mensajes' ) {echo 'class="active"'; }?>>
								<a href="buscar-personas.php">
									<i class="fa fa-search"></i>
									<span>Buscar personas</span>
								</a>
							</li>
							<?php } else if ($tipo=='persona') { // OPCIONES DEL MENU PARA PERSONA ?>
								<li <?php if ($estaPagina=='avisos' ) {echo 'class="active"'; }?>>
									<a href="avisos.php">
										<i class="fa fa-suitcase"></i>
										<span>Ver avisos</span>
									</a>
								</li>
						<li <?php if ($estaPagina=='mensajes' ) {echo 'class="active"'; }?>>
							<a href="sistema-mensajes.php">
								<i class="fa fa-inbox"></i>
								<span>Bandeja de entrada</span>
							</a>
						</li>
								<?php }?>
					</ul>
					<!-- /.sidebar-menu -->
				</section>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
            <?php echo strtoupper($estaPagina); ?>
            <small><?php if ($tipo=="empresa"){echo "Empresa: ".$razonSocial;} else if ($tipo=="persona") {echo "Persona: ".$nombre;} ?></small>
          </h1>
					<ol class="breadcrumb">
						<li><a href="panel.php"><i class="fa fa-dashboard"></i> Panel</a></li>
						<li class="active">
							<?php echo $estaPagina; ?>
						</li>
					</ol>
				</section>