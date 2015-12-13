<?php define("TITLE", "Página de inicio | Cikapp"); include('structure/navbar.php');?>
    
    <div class="wrapper">
        <div class="landing-header" style="background-image: url('structure/publico/assets/img/landing-cikapp.jpg');">
            <div class="container">
                <div class="motto">
                    <h1 class="title-uppercase">ESTO ES CIKAPP</h1>
                    <h3>Sé parte del cambio.</h3>
                    <br />
                    <a href="registro.php" class="btn"><i class="fa fa-play"></i>Crearme una cuenta</a>  
                </div>
            </div>    
        </div>
        <div class="main">
            <div class="section text-center landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>¿Conoces el "Sistema B"?</h2>
                            <h5></h5>                        
                           <button type="button" class="btn btn-info btn-fill" data-toggle="popover" 
                                   data-placement="top" title="Sistema B" 
                                   data-content="Nace con el fin de crear una nueva economía donde el éxito se mida por el bienestar de los individuos, 
                                                 de las sociedades y de la naturaleza, Sistema B es una Organización sin fines de lucro que tiene como 
                                                 misión construir ecosistemas favorables para un mercado que resuelva problemas sociales y ambientales, 
                                                 fortaleciendo las Empresas B.">Quiero conocerlo</button>
                        </div>
                    </div>
                </div>
            </div>  
                 
            <div class="section section-light-blue landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 column">
                            <h4>Para personas</h4>
                            <p>Servicios para personas</p>
                            <a class="btn btn-warning btn-fill" href="#">Saber más <i class="fa fa-chevron-right"></i></a>
                        </div>
                        <div class="col-md-6 column">
                            <h4>Para empresas</h4>
                            <p>Servicios para empresas</p>
                            <a class="btn btn-warning btn-fill" href="#">Saber más <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>     
    </div>
    
    <footer class="footer-demo section-dark">
        <div class="container">
            <nav class="pull-left">
                <ul>
 
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2015, hecho con <i class="fa fa-heart heart"></i> por Cikapp Developers
            </div>
        </div>
    </footer>

<?php include('structure/footer.php'); ?>

