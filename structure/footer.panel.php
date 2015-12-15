      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Cikapp Team</a>.</strong> Todos los derechos reservados.
      </footer>

<?php if ($tipo=='persona') { // OPCIONES DEL MENU PARA EMPRESA ?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-light">
        
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul> 
				
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Conversaciones</h3>
            <ul class="control-sidebar-menu">
              
										<?php
                                $mi_id = $_SESSION['id']; 
                                    require './include/conexion.php';
                                    $obtener_mensajes = "SELECT `hash`, `usuario_uno`, `usuario_dos` FROM grupo_mensajes WHERE usuario_uno='$mi_id' OR usuario_dos='$mi_id' ";
                                    $mostrar_usuarios = $mysqli->query($obtener_mensajes);

                                    while ($rows = $mostrar_usuarios->fetch_assoc()) {
                                        $hash = $rows['hash'];
                                        $usuario_uno = $rows['usuario_uno'];
                                        $usuario_dos = $rows['usuario_dos'];
                                        
                                        if($usuario_uno == $mi_id){
                                            $seleccionar_id = $usuario_dos;
                                        } else {
                                            $seleccionar_id = $usuario_uno;
                                        }
                                            $obtener_usuario = "SELECT `nombre`,`apellido`,`rutaImagen` FROM usuario WHERE idUsuario='$seleccionar_id' ";
                                            $resultado = $mysqli->query($obtener_usuario);
                                            while ($rows = $resultado->fetch_assoc()) {
                                            $seleccionar_nombre = $rows['nombre'];
                                            $seleccionar_apellido = $rows['apellido'];
																						$seleccionar_imagen = $rows['rutaImagen'];
                                        }
                                        
                                        echo "
																				
																			 
<li class='username'><a href='mensajes.php?usuario=$seleccionar_id'><img src='$seleccionar_imagen' style='width:25px;height:25px;-moz-border-radius:50px;-webkit-border-radius:50px;border-radius: 50px' alt='foto perfil'> $seleccionar_nombre $seleccionar_apellido</a></li>
																				
																				";
                                    }
                                
                            ?>
                    
                 
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
<?php } ?>

</div>


    <!--   Core JS Files   -->
    <script src="structure/panel/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="structure/panel/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/s/bs/dt-1.10.10/datatables.min.js"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<!--  Plugins Usados -->
<script src="structure/panel/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="structure/panel/js/bootstrap-notify.js"></script>
        <!-- AdminLTE App -->
<script src="structure/panel/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<?php if ($estaPagina == "buscar personas") { ?>
    <script src="structure/panel/js/filtro.js"></script>
    <?php } if($estaPagina=="mostrar usuarios"){ ?>
    <script src="structure/panel/js/filtro-persona.js"></script>
<?php }  ?>
    <script src="structure/panel/js/app.min.js"></script>
<script src="structure/panel/js/jquery-perfiles.js"></script>
<script src="structure/panel/js/filtro-avisos.js"></script>
<script>
       $('.noti-a').on('click', function (e) {
        e.preventDefault();
				 var valorCaja1 = $.trim($(this).attr('value'));
				 var href = $.trim($(this).attr('href'));
        var parametros = {"notificacion" : valorCaja1};
				 console.log("Se hizo click en una notificacion: " + valorCaja1);
        if (e.defaultPrevented) {
            console.log("Se hizo click en una notificacion: " + valorCaja1);
        } else {
					   $.ajax({
                type: "POST",
                url: "/include/notificaciones.class.php?",
                data: parametros,
                cache: false,
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("hubo un error:"+textStatus + " XHR: "+jqXHR + " errorThrown: "+errorThrown);    
                    },
                beforeSend: function (xhr) {
                    console.log("enviando");    
                    },
                success: function (html)
                {
									window.location.href = href;
                }
            });
        }
        
    });
	console.log("paginaCargadaReady");
</script>

<!--    	<script type="text/javascript">
    	$(document).ready(function(){
        	
        	demo.initChartist();
        	    $('[data-toggle="tooltip"]').tooltip(); 
        	//demo.showNotification();
            
    	});

	</script>-->
<script type="text/javascript" >
    $("#myTags").tagit({
        fieldName: "areasInteres[]",
        availableTags: ["Actividades profesionales científicas y técnicas", "Acuícula y pesquero", "Administración pública", "Agrícola y ganadero", "Arte, entretenimiento y recreación", "Comercio", "Contrucción", "Educación", "Elaboración de alimentos y bebidas", "Gastronomía hotelería y turismo", "Información y comunicaciones", "Manufactura metálica", "Manufactura no metálica", "Minería metálica", "Minería no metálica", "Servicios para el hogar", "Servicios de salud y asistencia social", "Suministro de gas electricidad y agua", "Transporte y logística"],
        caseSensitive: true,
        allowSpaces: true,
        tagLimit: 3
    });
</script>
<script language="javascript">
function guardaAviso(idAviso) {
$.post("avisos.php", {i: idAviso, accion: 'guardar-aviso'})
alert("Aviso Guardado");
}
function postulaAviso(idAviso) {
$.post("postulaciones.php", {i: idAviso, accion: 'postular'})
alert("Haz Postulado al trabajo Nº "+idAviso);
}
                </script>
<script>
    $('.btn-dinamico').click(function () {
        var btn_id = $(this).val();
        var btn_cargo=$(this).attr('cargo');
        var parametros = {"idPublicacion": btn_id};
        console.log(btn_id);
        $.ajax({
            type: "POST",
            url: "structure/avisos.class.php",
            data: parametros,
            cache: false,
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("hubo un error:" + textStatus + " XHR: " + jqXHR + " errorThrown: " + errorThrown);
            },
            beforeSend: function (xhr) {
                console.log("enviando");
                $("#resp").html("<div id='loading' class='overlay'><i class='fa fa-refresh fa-spin'></i></div>");
							 $("#cargo").text(btn_cargo);
            },
            success: function (html)
            {
							
						
                $("#cargo").text(btn_cargo);
                $('#resp').html(html);
                
                console.log("enviado");
            }
        });
    });
</script>
<script>
    // Todas las paginas con tablas
    $(function () {
        $("#ejemplo").DataTable( {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json'
            }
        } );
        
        // $('#tv_diarias').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": true,
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false
        // });
        $('#tv_diarias').DataTable( {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json'
            }
        } );
    });
    </script>
<?php if($estaPagina=='mensajes') { ?>
<script src="structure/panel/js/mensaje.min.js"></script>
<?php } ?>
</body>
</html>