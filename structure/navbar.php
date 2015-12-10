<?php require('structure/sesion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

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
			<nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">

				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="/">Cikapp</a>
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
	
	
<?php } else if ($tipo == "persona") { ?>
	
	
<?php } else if ($tipo == "visitante") { ?>      
 <li><a href="#">Register</a></li>
                    
                    <li><button href="#" class="btn btn-round btn-default">Sign in</button></li>


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