<?php
    define("TITLE", "Página de inicio | Cikapp");
    include('structure/navbar.php');
//esto es una 
?>
	<div class='blurred-container'>
		<div class="img-src" style="background-image: url('structure/publico/assets/img/bg3.jpg');">
			<div class="motto">
				<div>bienvenido</div>
				<div class="border no-right-border">A</div>
				<div class="border">CIKAPP</div>
			</div>
		</div>
	</div>

	</div>

	</div>

	<!-- end menu-dropdown -->

	<div class="main">
		<div class="container tim-container" style="max-width:800px; padding-top:100px">
			<h1 class="text-center">Tu trabajo
				<br> como nunca lo viste antes
				<small class="subtitle">Cambiando el sentido del éxito.</small>
			</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
				dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
				dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<!--     end extras -->
		</div>
		<div class="space"></div>
		<!-- end container -->
	</div>
	<!-- end main -->
	<div class="footer">
		<div class="overlayer">
			<div class="container">

				<div class="container">

					<div class="row">
						<div class="col-sm-7">
							<br>
							<h3 class="txt-white">En redes sociales </h3>
							<p class="txt-gray">Invita a tus amigos a unirse a esta nueva comunidad!</p>
							<br>
							<br>
							<a class="btn btn-info  btn-round btn-wd btn-fill social-share social-twitter" href="#">
								<div class="count" href="#"><i class="fa fa-twitter fa-fw"></i>Twittea</div>
								<div class="share">
									<span></span>
								</div>
							</a>

							<a class="btn btn-danger  btn-round btn-wd btn-fill social-share social-twitter" href="#">
								<div class="count" href="#"><i class="fa fa-google-plus fa-fw"></i>Comparte</div>
								<div class="share">
									<span></span>
								</div>
							</a>

							<a class="btn btn-primary btn-round btn-wd btn-fill social-share" href="#">
								<div class="count" href="#"><i class="fa fa-facebook fa-fw"></i> Comparte </div>
								<div class="share">
									<span></span>
								</div>
							</a>
							<div class="credits">
								&copy; 2015<a href="http://cikapp.com"> Cikapp Developers Team</a>, hecho con <i class="fa fa-heart heart" alt="love"></i> por un mundo laboral mejor.
							</div>
						</div>
						<div class="col-sm-1"></div>
						<div class="col-sm-4">
							<div class="card text-center">
								<div id="successMessage" class="alert alert-success" style="display:none">
									Gracias!
								</div>
								<h3>Para más información
									<br>
									<small>déjanos tu correo electrónico</small>
								</h3>

								<h5>Empleos<b class="text-muted"> para ti</b></h5>
								<h5>Nuevas <b class="text-muted">empresas</b></h5>
								<h5><b class="text-muted">Proyectos</b> innovadores</h5>
								<h5><b class="text-muted">Conexión </b>entre personas</h5>
								<form accept-charset="UTF-8" action="/newsletter" class="subscribe-form" data-remote="true" html="{:multipart=&gt;true}" method="post">
									<div style="margin:0;padding:0;display:inline">
										<input name="utf8" type="hidden" value="&#x2713;" />
									</div>
									<div class="form-group">
										<input class="form-control" id="subscribe_email" name="subscribe_email" placeholder="Escribe tu correo aquí" type="email" />
										<input id="pro_kit" name="pro_kit" type="hidden" value="true" />
									</div>
									<input class="btn btn-info btn-wd btn-fill" name="commit" type="submit" value="Suscribirme" />
								</form>
								<?php
include('structure/footer.php');
?>