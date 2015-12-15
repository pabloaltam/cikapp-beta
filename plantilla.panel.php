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
                                <h2><i class="text-info fa fa-paw"></i> TITULO </h2>
                            </div>
                            <div class="content">
                              
      <div class="alert alert-info alert-dismissable">
                                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i>Bienenido a tu panel!</h4>
Desde aquí podrás acceder a tu perfil, enviar mensajes a otros usuarios, y ver avisos de empresas.
      </div>   
<?php if ($tipo=='empresa') {
  
  
  
echo $razonSocial;
                              


} else if ($tipo=='persona') { 
  
  
  

echo $nombre;


  

 } ?>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </section>
        </div>
 <?php include 'structure/footer.panel.php'; ?>
