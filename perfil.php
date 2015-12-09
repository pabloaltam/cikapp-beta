<?php 
//Obtiene ID youtube
//preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $matches);
include 'structure/navbar.panel.php';
//include 'include/ejecutar_en_db.php';
//$Obj_operaciones = new OperacionesMYSQL();
?>        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar Perfil</h4>
                            </div>
                            <div class="content">
<?php if ($tipo=='empresa') {?>
                                <form>
                                    <div class="row">
                                        <div class="card-user col-md-4 pull-left">
                                    <img class="avatar border-gray" src="<?php echo $rutaImagen; ?>" alt="..."/>
                                   </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Empresa</label>
                                                <input type="text" class="form-control" placeholder="Empresa" value="<?php echo $razonSocial; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Correo Electronico Empresa</label>
                                                <input type="email" class="form-control" placeholder="Correo de la Empresa" value="<?php echo $emailEmpresa; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tipo Empresa</label>
                                                <input type="text" class="form-control" placeholder="Tipo de Empresa" value="<?php echo $tipoEmpresa; ?>">
                                            </div>        
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Página Web</label>
                                                <input type="text" class="form-control" placeholder="Página Web de la Empresa" value="<?php echo $websiteEmpresa; ?>">
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <input type="text" class="form-control" placeholder="Cargo en la Empresa" value="<?php echo $cargo; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Correo Electronico</label>
                                                <input type="email" class="form-control" placeholder="Correo Electronico" value="<?php echo $email; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Skype ID</label>
                                                <input type="text" class="form-control" placeholder="Usuario Skype" value="<?php echo $skype; ?>">
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombres</label>
                                                <input type="text" class="form-control" placeholder="Company" value="<?php echo $nombre; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Apellido Paterno</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $apellido; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Apellido Materno</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $apellidoM; ?>">
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dirección de la Empresa</label>
                                                <input type="text" class="form-control" placeholder="Dirección de la Empresa" value="<?php echo $direccion; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Región</label>
                                                <input type="text" class="form-control" placeholder="Región de la Empresa" value="<?php echo $region; ?>">
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ciudad</label>
                                                <input type="text" class="form-control" placeholder="Ciudad de la Empresa" value="<?php echo $ciudad; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pais</label>
                                                <input type="text" class="form-control" placeholder="Pais de la Empresa" value="<?php echo $pais; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Codigo Postal</label>
                                                <input type="number" class="form-control" placeholder="Codigo Postal de la Empresa" value="<?php echo $codigoPostal; ?>">
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Acerca de la Empresa</label>
                                                <textarea rows="5" class="form-control" placeholder="Descripción de la Empresa"><?php echo $descripcion; ?></textarea>
                                            </div>        
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                 <input type="password" name="pass" class="form-control" placeholder="Clave">
                                            </div>        
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar Perfil</button>
                                    <div class="clearfix"></div>
                                </form>
<?php } else if ($tipo=='persona') { ?>


<form>
                                   <div class="row col-md-12">
                                        <div class="form-group pull-left">
                                    <img class="avatar img-circle" src="<?php echo $rutaImagen; ?>" alt="..."/>
                                          <a href="#">cambiar</a>
                                   </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Rut Persona (desactivado)</label>
                                                <input type="text" class="form-control" disabled placeholder="Empresa" value="<?php echo $rut; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Correo Electronico</label>
                                                <input type="email" class="form-control" placeholder="Email"  value="<?php echo $email; ?>">
                                            </div>        
                                        </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Skype</label>
                                                <input type="text" class="form-control" placeholder="ID Skype" value="<?php echo $skype; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Id Video Presentación de Youtube (opcional)</label>
                                                <input type="text" class="form-control" placeholder="ID video Youtube" value="<?php echo $video; ?>">
                                            </div>        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombres</label>
                                                <input type="text" class="form-control" placeholder="Company" value="<?php echo $nombre; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Apellido Paterno</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $apellido; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Apellido Materno</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $apellidoM; ?>">
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" value="Mike">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>        
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Acerca de ti</label>
                                                <textarea rows="5" class="form-control" placeholder="Descripción de tu perfil"></textarea>
                                            </div>        
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                 <input type="password" name="pass" class="form-control" placeholder="Clave">
                                            </div>        
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar Perfil</button>
                                    <div class="clearfix"></div>
                                </form>



<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </section>
        </div>
 <?php include 'structure/footer.panel.php'; ?>