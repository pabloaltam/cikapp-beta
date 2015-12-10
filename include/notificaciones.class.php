<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Notificaciones {

    function traerTotalNotificaciones($idUsuario) {
        include ('conexion.php');
        $traer_numero = "SELECT idNotificacion from notificaciones where idUsuario=4 and leido = 0;";
        $resultado = mysqli_query($mysqli, $traer_numero);
        $contador = mysqli_num_rows($resultado);
        return $contador;
    }

    function traerNotificaciones($idUsuario) {
        include ('conexion.php');
        $traer_notificacion = "SELECT * from notificaciones where idUsuario={$idUsuario} ORDER BY fechaAgregada DESC";
        $resultado = $mysqli->query($traer_notificacion);
        while ($rows = $resultado->fetch_assoc()) {
            if($rows['leido']==0){
            echo "<li name='lista'><!-- start notification -->
                    <a href='/avisos.php?accion=leer&id={$rows['idPublicacion']}' class='noti-a' value='{$rows['idNotificacion']}'>
                        <input type='hidden' name='notificacion' value='{$rows['idNotificacion']}'>
                        <i class='fa fa-users text-aqua'></i> {$rows['notificacion_texto']}
                    </a>
                </li>";
            }else { 
              echo "<li class='btn-default' name='lista' value='{$rows['idNotificacion']}'><!-- start notification -->
                    <a href='/avisos.php?accion=leer&id={$rows['idPublicacion']}' class='noti-a' value='{$rows['idNotificacion']}'>
                        <input type='hidden' name='notificacion' value='{$rows['idNotificacion']}'>
                        <i class='fa fa-users text-aqua'></i> {$rows['notificacion_texto']}
                    </a>
                </li>";
        }
        }
    }
    
  function agregarVisto($idNotificacion) {
        include ('conexion.php');
        $cambiar_visto = "UPDATE notificaciones set leido=1 WHERE idNotificacion={$idNotificacion};";
          mysqli_query($mysqli, $cambiar_visto);
    $count = mysqli_affected_rows($mysqli);
        mysqli_close($mysqli);
    return $count;
 
    }
}

if(isset($_POST['notificacion'])){
 $obj =  new Notificaciones();
      echo $obj->agregarVisto($_POST['notificacion']);
} 