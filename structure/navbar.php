<?php require('structure/sesion.php'); ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title><?php echo TITLE; ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="structure/publico/bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="structure/publico/assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="structure/publico/assets/css/demo.css" rel="stylesheet" />
		<link href="structure/publico/assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
      <?php if ($estaPagina=='index') {?>
	<style>.bcf-contact-form{background: url(uploads/brand.png);background-repeat: no-repeat;background-size: 44px 43px;background-position:left bottom;}.bcf-logo{display:none;}</style>
	<script type="text/javascript">  var bcf_settings = { buttonText:'Contacta a Cikapp', buttonTop:'20%' };(function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; js = d.createElement(s); js.id = id; js.src = "//bettercontactform.com/contact/media/5/e/5e6bdde11ed9730b5b1479c7377064fd3849421f.js"; fjs.parentNode.insertBefore(js, fjs); }(document, "script", "bcf-render"));</script>
	<?php } ?>
</head>
<body>

<!--    navbar come here          -->

<nav class="navbar navbar-default" role="navigation-demo" id="demo-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"> Ciasdaskapp</a>
        </div>
    		<?php 
		if ($estaPagina=='index') {
			$link = 'conocer-mas.php';
			$boton = 'Más';
} else { 
		$link = 'index.php';
		$boton = 'Volver';
}
?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
         <ul class="nav navbar-nav navbar-right">
<?php if ($tipo == "empresa") { ?>
<li><a class="btn btn-simple btn-default" href="panel.php" role="button"><img src='<?php echo $rutaImagen ?>' style='width:20px;height:20px;-moz-border-radius:50px;-webkit-border-radius:50px;border-radius: 50px' alt='foto perfil'> <?php echo $razonSocial ?></a></li>
<li><a class="btn btn-simple" onClick="return confirm('¿Está seguro que desea cerrar sesión?')" href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a></li>
<?php } else if ($tipo == "persona") { ?>
<li><a class="btn btn-simple btn-default" href="panel.php" role="button"><img src='<?php echo $rutaImagen ?>' style='width:20px;height:20px;-moz-border-radius:50px;-webkit-border-radius:50px;border-radius: 50px' alt='foto perfil'> <?php echo $razonSocial ?> <?php echo $nombre ?></a></li>
<li><a class="btn btn-simple" onClick="return confirm('¿Está seguro que desea cerrar sesión?')" href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a></li>
<li><a class="btn btn-sm btn-fill btn-info" href="<?php echo $link ?>" role="button"><?php echo $boton ?></a></li>
<?php } else if ($tipo == "visitante") { ?>

<li><a class="btn btn-simple btn-default" href="registro.php" role="button">No tengo cuenta</a></li>
<li><a class="btn btn-simple btn-default" href="login.php" role="button">Mi cuenta</a></li>
<li><a class="btn btn-fill btn-info btn-xs" href="<?php echo $link ?>" role="button"><?php echo $boton ?></a></li>
<?php } ?>

					 


           <!--   <li>
                <a href="registro.php" class="btn btn-simple">No tengo cuenta</a>
            </li>
            <li>
                <a href="login.php" class="btn btn-simple">Mi cuenta</a>
            </li>-->
           </ul>
					
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav>
	<!--
    <div class="alert alert-info landing-alert">
         <div class="container text-center">
             <h5>Bienvenidos a nuestra nueva aplicación web!</h5>
        </div>
    </div>
-->
<!-- end navbar  -->