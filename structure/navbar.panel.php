<?php
include 'sesion.php';
if ($tipo=="visitante") {header("Location: login.php"); die();}
?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="./favicon.png">
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
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs-3.3.5/dt-1.10.10/datatables.min.css"/> -->

		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="structure/panel/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->

		<link rel="stylesheet" href="structure/panel/css/todos-los-colores.min.css">
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

	<body class="hold-transition skin-<?php if ($tipo=="persona"){ echo "black"; }else if ($tipo=="empresa") {echo "black";} ?>-light sidebar-mini">
		<div class="wrapper">

			<!-- Main Header -->
			<header class="main-header">

				<!-- Logo -->
				<a href="index.php" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><img src="uploads/brand.png"></span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><img src="uploads/brand.png"></img> <b>Cik</b>app</span>
				</a>

				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
						<?php if($tipo=='empresa') { ?>
            <li class="active"><a href="#">Hola <b class="text-info"><?php echo $nombre ?></b> este es tu panel de <b class="text-info"><?php echo $tipo ?></b> <span class="sr-only">(current)</span></a></li>
						<?php	} else if($tipo=='persona') { ?>
						<li class="active"><a href="#">Hola <b class="text-info"><?php echo $nombre ?></b> este es tu panel de <b class="text-info"><?php echo $tipo ?></b> <span class="sr-only">(current)</span></a></li>
						<?php } ?>

						<li><a href="index.php"><i class="fa fa-home"></i></a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							
							<!-- Notifications Menu -->
							<?php
include './include/notificaciones.class.php';
$obj_notificaciones = new Notificaciones();
$contador_notificaciones=$obj_notificaciones->traerTotalNotificaciones($id);
?>
							<?php if($tipo=='persona') { ?>
								<li class="dropdown notifications-menu">
									<!-- Menu toggle button -->
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-bell-o"></i>
										<span class="label label-danger"><?php
        echo $contador_notificaciones
        ?></span>
									</a>
									<ul class="dropdown-menu">
										<li class="header"><?php if($contador_notificaciones>1){
        echo "Tienes ".$contador_notificaciones." notificaciones nuevas";
                
    }elseif($contador_notificaciones==1){
        echo "Tienes 1 notificacion nueva.";
                
    } else {
	echo "No tienes notificaciones nuevas.";
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
								<?php } ?>
								<!-- User Account Menu -->
								<li class="dropdown user user-menu">
									<!-- Menu Toggle Button -->
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<!-- The user image in the navbar-->
										<img src="<?php echo $rutaImagen;?>" class="user-image" alt="foto perfil">
										<!-- hidden-xs hides the username on small devices so only the image appears. -->
										<?php if ($tipo=='persona') { // OPCIONES PERSONA ?>
										<span class="hidden-xs"><?php echo $nombre ?></span>
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
											<div class="col-xs-12 text-center">
												<a href="cambiar-clave.php"><i class="fa fa-key"></i> Cambiar contraseña</a>
											</div>
										</li>
										<!-- Menu Footer-->
										<li class="user-footer">
											<div class="pull-left">
												<a href="editar-perfil.php" class="btn btn-primary btn-flat"><i class="fa fa-user"></i> Editar perfil</a>
											</div>
											<div class="pull-right">
												<a onClick="return confirm('¿Está seguro que desea cerrar sesión?')" href="logout.php" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
											</div>
										</li>
									</ul>
								</li>
						
							
								<!-- Control Sidebar Toggle Button -->
								<li>
									<?php if ($tipo=='persona') { // OPCIONES PERSONA ?>
									<a href="#" data-toggle="control-sidebar"><i class="fa fa-inbox"></i></a>
									<?php } ?>
								</li>
							
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">

				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">


					
					<!-- Sidebar Menu -->
					<ul class="sidebar-menu">

						
						<li class="header">OPCIONES PANEL</li>
						<li <?php if ($estaPagina=='panel' ) {echo 'class="active"'; }?>>
							<a href="panel.php">
								<i class="text-info fa fa-coffee"></i>
								<span>Escritorio</span>
							</a>
						</li>
						
						<?php if ($tipo=='empresa') { // OPCIONES DEL MENU PARA EMPRESA ?>
						<li <?php if ($estaPagina=='editar perfil' ) {echo 'class="active"'; }?>>
							<a href="editar-perfil.php">
								<i class="text-info fa fa-user"></i>
								<span>Editar perfil</span>
							</a>
						</li>
						<li class="treeview<?php if ($estaPagina=='avisos') {echo ' active'; }?>">
          <a href="avisos.php">
            <i class="text-info fa fa-suitcase"></i> <span>Avisos</span>
            <i class="text-info fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu list-group">
            <li><a href="avisos.php?accion=nuevo"><i class="fa fa-plus-circle text-blue"></i><span> Nuevo aviso</span></a></li>
						<li><a href="avisos.php"><i class="fa fa-check-circle text-green"></i><span> Avisos publicados</span></a></li>
						<li><a href="avisos.php?accion=avisos-finalizados"><i class="fa fa-minus-circle text-red"></i><span> Avisos finalizados</span></a></li>
          </ul>
        </li>
							<li <?php if ($estaPagina=='postulaciones' || $estaPagina=='persona') {echo 'class="active"'; }?>>
								<a href="postulaciones.php">
									<i class="fa fa-users text-blue"></i>
									<span>Ver postulantes</span>
								</a>
							</li>
							<li <?php if ($estaPagina=='buscar-personas' ) {echo 'class="active"'; }?>>
								<a href="buscar-personas.php">
									<i class="text-info fa fa-search"></i>
									<span>Buscar personas</span>
								</a>
							</li>
							<?php } else if ($tipo=='persona') { // OPCIONES DEL MENU PARA PERSONA ?>
						<li class="treeview<?php if ($estaPagina=='persona' || $estaPagina=='editar perfil' ) {echo ' active'; }?>">
          <a href="persona.php">
            <i class="text-info fa fa-user"></i> <span>Perfil</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu list-group">
            <li><a href="persona.php?id=<?php echo $id ?>"><i class="text-info fa fa-circle-o"></i><span> Mi perfil</span></a></li>
						<li><a href="editar-perfil.php"><i class="text-info fa fa-circle-o"></i><span> Editar perfil</span></a></li>
          </ul>
        </li>
						<li class="treeview<?php if ($estaPagina=='avisos' ) {echo ' active'; }?>">
          <a href="avisos.php">
            <i class="text-info fa fa-suitcase"></i> <span>Avisos</span>
            <i class="text-info fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu list-group">
            <li><a href="avisos.php?accion=buscar"><i class="text-info fa fa-search"></i><span> Buscar Avisos</span></a></li>
						<li><a href="avisos.php?accion=avisos-guardados"><i class="text-info fa fa-heart"></i><span> Avisos Guardados</span></a></li>
          </ul>
        </li>
						<li <?php if ($estaPagina=='postulaciones' ) {echo 'class="active"'; }?>>
							<a href="postulaciones.php">
								<i class="text-info fa fa-paper-plane"></i>
								<span>Mis Postulaciones</span>
							</a>
						</li>
						<li <?php if ($estaPagina=='sistema mensajes' || $estaPagina=='mensajes' ) {echo 'class="active"'; }?>>
							<a href="sistema-mensajes.php">
								<i class="text-info fa fa-inbox"></i>
								<span>Mensajes</span>
							</a>
						</li>
						<li <?php if ($estaPagina=='mostrar usuarios' ) {echo 'class="active"'; }?>>
							<a href="mostrar-usuarios.php">
								<i class="text-info fa fa-search"></i>
								<span>Buscar personas</span>
							</a>
						</li>
								<?php }?>
												<li class="treeview">
          <a href="#">
            <i class="text-info fa fa-rocket"></i> <span class="text-info">CIKAPP </span>
            <i class="text-info fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu list-group">
            <li><a href="index.php"><i class="text-info fa fa-circle-o"></i><span>Inicio</span></a></li>
						<li><a href="nosotros.php"><i class="text-info fa fa-circle-o"></i><span>¿Qué es?</span></a></li>
          </ul>
        </li>
					</ul>
					<!-- /.sidebar-menu -->
				</section>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
