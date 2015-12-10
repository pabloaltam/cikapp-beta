<?php
// VARIABLES LISTAS PARA USAR ESTAN EN EL ARCHIVO structure/sesion.php
include 'structure/navbar.panel.php';
?>        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">TITULO PARA AMBOS</h4>
                            </div>
                            <div class="content">
                              
      <div class="alert alert-info alert-dismissable">
                                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i>Bienenido a tu panel!</h4>
Desde aquí podrás acceder a tu perfil, enviar mensajes a otros usuarios, y ver avisos de empresas.
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
