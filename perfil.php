<?php 
include 'structure/navbar.panel.php';
?>        
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar Perfil</h4>
                            </div>
                            <div class="content">
<?php if ($tipo=='empresa') {?>
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Empresa (desactivado)</label>
                                                <input type="text" class="form-control" disabled placeholder="Empresa" value="<?php echo $razonSocial; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Rut Empresa (desactivado)</label>
                                                <input type="text" class="form-control" disabled placeholder="Rut Empresa" value="<?php echo $rut; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Correo Electronico</label>
                                                <input type="email" class="form-control" placeholder="Email"  value="<?php echo $email; ?>">
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
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>        
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar Perfil</button>
                                    <div class="clearfix"></div>
                                </form>
<?php } else if ($tipo=='persona') { ?>


<form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Rut Persona (desactivado)</label>
                                                <input type="text" class="form-control" disabled placeholder="Empresa" value="<?php echo $rut; ?>">
                                            </div>        
                                        </div>
                                        <div class="col-md-3">
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
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
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
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>   
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="<?php echo $rutaImagen; ?>" alt="..."/>
                                   
                                      <h4 class="title"><?php echo $nombre.' '.$apellido.' '.$apellidoM;?><br />
                                         <small><?php if($tipo=='empresa')echo $cargo;else echo $email;?></small>
                                      </h4> 
                                    </a>
                                </div>  
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
    
                            </div>
                        </div>
                    </div>
               
                </div>                    
            </div>
        </div>
        
 <?php include 'structure/footer.panel.php'; ?>