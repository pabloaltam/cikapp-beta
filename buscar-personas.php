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
<?php if ($tipo=='empresa') {?>

        <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <!-- Nav tabs -->

                        <div class="header">
                            <h3 class="text-center">Filtro de postulantes</h3>
                        </div>
                        <br />
                        <div class="content">
                            <form action="" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="checkbox" class="" id="conocimientos">
                                        <label for="conocimientos"> Conocimientos</label>
                                        <br>
                                        <input id="txtConocimientos" class="form-control input-ajax" disabled>
                                        <br>
                                        <input type="checkbox" class="" id="estudios">
                                        <label for="estudios">Estudios</label>
                                        <br>

                                        <div class="ui-select">
                                            <select id="txtEstudios" class="form-control input-ajax" disabled>
                                                <option value="-1">Seleccione...</option>
                                                <?php
                                                require 'include/conexion.php';
                                                $query = "SELECT * FROM educacion;";
                                                $resultado = $mysqli->query($query);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    print("<option value='" . $rows['educacion_id'] . "'>" . $rows['educacion_nombre'] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <input type="checkbox" class="" id="nivIngles">
                                        <label for="nivIngles">Nivel de Ingles</label>
                                        <br>

                                        <div class="ui-select">
                                            <select id="txtNivIngles" class="form-control input-ajax" disabled>
                                                <option value="-1">Seleccione...</option>
                                                <?php
                                                require 'include/conexion.php';
                                                $query = "SELECT * FROM nivel_ingles;";
                                                $resultado = $mysqli->query($query);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    print("<option value='" . $rows['idIngles'] . "'>" . $rows['Nivel'] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <input type="checkbox" class="" id="region">
                                        <label for="region">Region</label>
                                        <br>
                                        <div class="ui-select">
                                            <select id="txtRegion" class="form-control input-ajax" disabled>
                                                <option value="-1">Seleccione...</option>
                                                <?php
                                                require 'include/conexion.php';
                                                $query = "SELECT * FROM region";
                                                $resultado = $mysqli->query($query);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    print("<option value='" . $rows['REGION_ID'] . "'>" . $rows['REGION_NOMBRE'] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                        <input type="checkbox" class="" id="ciudad">
                                        <label for="ciudad">Ciudad</label>
                                        <br>

                                        <div class="ui-select">
                                            <select id="txtCiudad" class="form-control input-ajax" disabled>
                                                <option value="-1">Seleccione...</option>
                                                <?php
                                                require 'include/conexion.php';
                                                $query = "SELECT * FROM comuna ORDER BY COMUNA_NOMBRE";
                                                $resultado = $mysqli->query($query);
                                                while ($rows = $resultado->fetch_assoc()) {
                                                    print("<option value='" . $rows['COMUNA_ID'] . "'>" . $rows['COMUNA_NOMBRE'] . "</option>");
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <br>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <br/>
                <br />

                <div class="col-md-7 col-md-offset-1">
                    <div class="scroll" id="scroll">
                        <p>Seleccione al menos una opción y escriba o elija segun corresponda...</p>
                        <!---->

                        <!---->
                    </div>

                </div>
            </div>



        </div>
        </section>
    </div>
</div>




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