<?php
include 'structure/navbar.panel.php';
?>        
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">TITULO PARA AMBOS</h4>
                            </div>
                            <div class="content">
<?php if ($tipo=='empresa') {?>



//TODO EL CONTENIDO QUE VERÁ EL USUARIO EMPRESA EN EL PANEL



<?php } else if ($tipo=='persona') { ?>



//TODO EL CONTENIDO QUE VERÁ EL USUARIO PERSONA EN EL PANEL



<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
        
 <?php include 'structure/footer.panel.php'; ?>
