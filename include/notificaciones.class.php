<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Notificaciones {

    function traerTotalNotificaciones($idUsuario) {
        include './include/conexion.php';
        $traer_numero = "SELECT idNotificacion from notificaciones where idUsuario=4 and leido = 0;";
        $resultado = mysqli_query($mysqli, $traer_numero);
        $contador = mysqli_num_rows($resultado);
        return $contador;
    }

    function traerNotificaciones($idUsuario) {
        include './include/conexion.php';
        $traer_notificacion = "SELECT * from notificaciones where idUsuario={$idUsuario} and leido=0;";
        $resultado = $mysqli->query($traer_notificacion);
        while ($rows = $resultado->fetch_assoc()) {
            echo "<li><!-- start notification -->
                    <a href='#'>
                        <i class='fa fa-users text-aqua'></i> {$rows['notificacion_texto']}
                    </a>
                </li>";
        }
    }

}