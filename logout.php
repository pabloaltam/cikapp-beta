<?php
include './include/sign_in.php';

if(sesion_iniciada()){
    logout();
    header("Location: ./index.php");
} else {
    header("Location: ./index.php");
}

