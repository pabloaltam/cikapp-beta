      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Cikapp Team</a>.</strong> Todos los derechos reservados.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

</body>

    <!--   Core JS Files   -->
    <script src="structure/panel/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="structure/panel/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="structure/panel/js/bootstrap-checkbox-radio-switch.js"></script>
	
	<!--  Plugins Usados -->
<script src="structure/panel/plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="structure/panel/js/bootstrap-notify.js"></script>

        <!-- AdminLTE App -->
<script src="structure/panel/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script src="structure/panel/js/filtro.js"></script>
    <script src="structure/panel/js/app.min.js"></script>
<script src="structure/panel/js/jquery-perfiles.js"></script>

<!--    	<script type="text/javascript">
    	$(document).ready(function(){
        	
        	demo.initChartist();
        	    $('[data-toggle="tooltip"]').tooltip(); 
        	//demo.showNotification();
            
    	});
-->
	</script>
<script type="text/javascript" >
    $("#myTags").tagit({
        fieldName: "areasInteres[]",
        availableTags: ["Actividades profesionales científicas y técnicas", "Acuícula y pesquero", "Administración pública", "Agrícola y ganadero", "Arte, entretenimiento y recreación", "Comercio", "Contrucción", "Educación", "Elaboración de alimentos y bebidas", "Gastronomía hotelería y turismo", "Información y comunicaciones", "Manufactura metálica", "Manufactura no metálica", "Minería metálica", "Minería no metálica", "Servicios para el hogar", "Servicios de salud y asistencia social", "Suministro de gas electricidad y agua", "Transporte y logística"],
        caseSensitive: true,
        allowSpaces: true,
        tagLimit: 3
    });
</script>
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
</html>