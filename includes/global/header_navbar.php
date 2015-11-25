<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        <?php echo TITLE; ?>
    </title>
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap3/css/font-awesome.min.css" rel="stylesheet" />

    <link href="assets/css/cikapp.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Font Awesome     -->
    <link href="bootstrap3/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

</head>

<body>
    <div id="navbar-full">
        <div id="navbar">
			<!--
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange
        -->
			<nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">
				<div class="alert alert-success hidden">
					<div class="container">
						<b>Lorem ipsum</b> dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					</div>
				</div>

				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Cikapp</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
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
							<li>
								<a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
							</li>
						</ul>
						<form class="navbar-form navbar-left navbar-search-form" role="search">
							<div class="form-group">
								<input type="text" value="" class="form-control" placeholder="Buscar">
							</div>
						</form>
						<div class="nav navbar-nav navbar-right">
							<a class="btn btn-round btn-default" href="registro.php" role="button"><i class="fa fa-user"></i> Registrarse</a>
				            <a class="btn btn-round btn-default" href="login.php" role="button"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
						</div>

					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>