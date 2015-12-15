<?php
class SelectFiltro {
    
    function traerPorNombre($nomCom) {
        require './conexion.php';
        $split = split(" ", $nomCom);
        $nom = $split[0];
        $ape="";
        if(isset($split[1]))
        $ape = $split[1];
        $idUsuario="";
        $query = "SELECT * FROM globaled_cikapp1.usuario where nombre like '%{$nom}%' and apellido like '%{$ape}%' ;";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
            $idUsuario .= $row['idUsuario']."-- ";
        }
        return $idUsuario;
    }

    function traerPorConocimientos($conocimentos) {
        require './conexion.php';
        $idUsuario="";
        $query = "SELECT idUsuario FROM usuario WHERE areasInteres LIKE '%{$conocimentos}%';";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
            $idUsuario .= $row['idUsuario']."-- ";
        }
        return $idUsuario;
    }

    function traerPorEstudios($estudios) {
        require './conexion.php';
        $idUsuario="";
        $query = "select usuario_id from usuario_educacion, educacion where usuario_educacion.educacion_id=educacion.educacion_id and usuario_educacion.educacion_id=$estudios;";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
            $idUsuario .= $row['usuario_id']." ";
        }
        return $idUsuario;
    }

    function traerPorNivelDeIngles($nivelDeIngles) {
        require './conexion.php';
        $idUsuario="";
        $query = "SELECT idUsuario FROM usuario WHERE idIngles={$nivelDeIngles};";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
            $idUsuario .= $row['idUsuario']." ";
        }
        return $idUsuario;
    }

    function traerPorRegion($regionID) {
        require './conexion.php';
        $idUsuario ="";
        $query ="SELECT idUsuario FROM region a, provincia b, comuna c, usuario d where b.PROVINCIA_REGION_ID=a.REGION_ID and c.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and d.COMUNA_ID=c.COMUNA_ID and a.REGION_ID={$regionID};";
        $resultado = $mysqli->query($query);
        while ($row = $resultado->fetch_assoc()) {
            $idUsuario .= $row['idUsuario']." ";
        }
        return $idUsuario;
    }

    function traerPorCiudad($comuna_id) {
        require './conexion.php';
        $idUsuario="";
        $query = "SELECT idUsuario FROM usuario WHERE COMUNA_ID={$comuna_id};";
        $result = $mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $idUsuario .= $row['idUsuario']." ";
        }
        return $idUsuario;

    }
        function traerAvisoPorCiudad($comuna_id) {
        require './conexion.php';
        $idUsuario="";
        $query = "SELECT id FROM publicaciones WHERE COMUNA_ID={$comuna_id};";
        $result = $mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $idUsuario .= $row['id']." ";
        }
        return $idUsuario;
    }
      function traerAvisoPorRegion($regionID) {
        require './conexion.php';
        $idUsuario ="";
        $query ="SELECT id FROM region a, provincia b, comuna c, publicaciones d where b.PROVINCIA_REGION_ID=a.REGION_ID and c.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and d.COMUNA_ID=c.COMUNA_ID and a.REGION_ID={$regionID};";
        $resultado = $mysqli->query($query);
        while ($row = $resultado->fetch_assoc()) {
            $idUsuario .= $row['id']." ";
        }
        return $idUsuario;
    }
      function traerAvisoPorCargo($cargo) {
        require './conexion.php';
        $idUsuario ="";
        $query ="SELECT id FROM publicaciones where cargo LIKE '%{$cargo}%';";
        $resultado = $mysqli->query($query);
        while ($row = $resultado->fetch_assoc()) {
            $idUsuario .= $row['id']." ";
        }
        return $idUsuario;
    }
    function traerAvisoPorConocimientos($conocimentos) {
        require './conexion.php';
        $idUsuario="";
        $query = "SELECT id FROM publicaciones WHERE area_desempenio LIKE '%{$conocimentos}%';";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
            $idUsuario .= $row['id']." ";
        }
        return $idUsuario;
    }

}
