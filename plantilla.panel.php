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
<?php if ($tipo=='empresa') {?>



//TODO EL CONTENIDO QUE VERÁ LA EMPRESA EN EL PANEL



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
