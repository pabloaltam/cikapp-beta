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
<!-- 		<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->
		<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/bs-3.3.5/dt-1.10.10/datatables.min.css"/>

		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="structure/panel/css/AdminLTE.min">
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

	<body class="hold-transition skin-<?php if ($tipo=="persona"){ echo "blue"; }else if ($tipo=="empresa") {echo "purple";} ?>-light sidebar-mini">
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
							<!-- Notifications Menu -->
							<?php
include './include/notificaciones.class.php';
$obj_notificaciones = new Notificaciones();
$contador_notificaciones=$obj_notificaciones->traerTotalNotificaciones('$id');
?>
								<li class="dropdown notifications-menu">
									<!-- Menu toggle button -->
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-bell"></i>
										<span class="label label-danger"><?php
        echo $contador_notificaciones
        ?></span>
									</a>
									<ul class="dropdown-menu">
										<li class="header"><?php if($contador_notificaciones>1){
        echo "Tienes ".$contador_notificaciones." notificaciones nuevas";
                
    }elseif($contador_notificaciones==1){
        echo "Tienes 1  notificacion nueva.";
                
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
												<a href="#" class="btn btn-primary btn-flat"><i class="fa fa-user"></i> Ver perfil</a>
											</div>
											<div class="pull-right">
												<a onClick="return confirm('¿Está seguro que desea cerrar sesión?')" href="logout.php" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
											</div>
										</li>
									</ul>
								</li>
							<?php if ($tipo=='persona') { // OPCIONES PERSONA ?>
								<!-- Control Sidebar Toggle Button -->
								<li>
									<a href="#" data-toggle="control-sidebar"><i class="fa fa-inbox"></i></a>
								</li>
							<?php } ?>
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
							<a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
						</div>
					</div>
					
					<!-- Sidebar Menu -->
					<ul class="sidebar-menu">

						
						<li class="header">OPCIONES PANEL</li>
						<li <?php if ($estaPagina=='panel' ) {echo 'class="active"'; }?>>
							<a href="panel.php">
								<i class="fa fa-dashboard"></i>
								<span>Escritorio</span>
							</a>
						</li>
						
						<?php if ($tipo=='empresa') { // OPCIONES DEL MENU PARA EMPRESA ?>
						<li <?php if ($estaPagina=='editar-perfil' ) {echo 'class="active"'; }?>>
							<a href="editar-perfil.php">
								<i class="fa fa-user"></i>
								<span>Editar perfil</span>
							</a>
						</li>
						<li class="treeview<?php if ($estaPagina=='avisos' ) {echo ' active'; }?>">
          <a href="avisos.php">
            <i class="fa fa-suitcase"></i> <span>Avisos</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu list-group">
            <li><a href="avisos.php?accion=nuevo"><i class="fa fa-plus-circle text-blue"></i><span> Nuevo Aviso</span></a></li>
						<li><a href="avisos.php"><i class="fa fa-check-circle text-green"></i><span> Avisos Publicados</span></a></li>
						<li><a href="avisos.php?accion=avisos-finalizados"><i class="fa fa-minus-circle text-red"></i><span> Avisos Finalizados</span></a></li>
						<li><a href="avisos.php?accion=postulantes"><i class="fa fa-users text-light-blue"></i><span> Ver Postulantes</span></a></li>
          </ul>
        </li>
							<li <?php if ($estaPagina=='buscar-personas' ) {echo 'class="active"'; }?>>
								<a href="buscar-personas.php">
									<i class="fa fa-search"></i>
									<span>Buscar personas</span>
								</a>
							</li>
							<?php } else if ($tipo=='persona') { // OPCIONES DEL MENU PARA PERSONA ?>
						<li class="treeview<?php if ($estaPagina=='perfil' ) {echo ' active'; }?>">
          <a href="perfil.php">
            <i class="fa fa-user"></i> <span>Perfil</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu list-group">
            <li><a href="persona.php?id=<?php echo $id ?>"><i class="fa fa-circle-o"></i><span> Mi perfil</span></a></li>
						<li><a href="editar-perfil.php"><i class="fa fa-circle-o"></i><span> Editar perfil</span></a></li>
          </ul>
        </li>
						<li class="treeview<?php if ($estaPagina=='avisos' ) {echo ' active'; }?>">
          <a href="avisos.php">
            <i class="fa fa-suitcase"></i> <span>Avisos</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu list-group">
            <li><a href="avisos.php?accion=buscar"><i class="fa fa-search"></i><span> Buscar Avisos</span></a></li>
						<li><a href="avisos.php?accion=avisos-guardados"><i class="fa fa-heart"></i><span> Avisos Guardados</span></a></li>
          </ul>
        </li>
						<li <?php if ($estaPagina=='postulaciones' ) {echo 'class="active"'; }?>>
							<a href="postulaciones.php">
								<i class="fa fa-paper-plane"></i>
								<span>Mis Postulaciones</span>
							</a>
						</li>
						<li <?php if ($estaPagina=='sistema-mensajes' ) {echo 'class="active"'; }?>>
							<a href="sistema-mensajes.php">
								<i class="fa fa-inbox"></i>
								<span>Bandeja de entrada</span>
							</a>
						</li>
						<li <?php if ($estaPagina=='mostrar-usuarios' ) {echo 'class="active"'; }?>>
							<a href="mostrar-usuarios.php">
								<i class="fa fa-search"></i>
								<span>Buscar personas</span>
							</a>
						</li>
								<?php }?>
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