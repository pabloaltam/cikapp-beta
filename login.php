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
    
<div id="fullscreen_bg" class="fullscreen_bg"/>

    <div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default login">
			  	<div class="panel-heading">                            
                    <div class="row-fluid user-row">
                        <i class="fa fa-cloud fa-2x"></i> 
                    </div>
                    <h3 class="panel-title user-row">Tu cuenta</h3> 
			 	</div>
			  	<div class="panel-body">
                    <div class="form-group">
    		    		  <label></label>
                          <hr>
			    	</div>
			    	<form accept-charset="UTF-8" role="form">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="12345678-9" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Tu contraseña" name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Acceder a mi cuenta">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</div>
    
