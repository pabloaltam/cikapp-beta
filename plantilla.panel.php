<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
include 'structure/navbar.panel.php';
?>        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">TITULO PARA AMBOS</h4>
                            </div>
                            <div class="content">
                              
       <div class="callout callout-info">
        <h4>Bienenido a tu panel!</h4>

        <p>Desde aquí podrás acceder a tu perfil, enviar mensajes a otros usuarios, y ver avisos de empresas.</p>
      </div>
<?php if ($tipo=='empresa') {?>
//TODO LO QUE VA EN EMPRESA
                              
<?php } else if ($tipo=='persona') { ?>



//TODO EL CONTENIDO QUE VERÁ LA PERSONA EN EL PANEL



<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </section>
        </div>
 <?php include 'structure/footer.panel.php'; ?>
