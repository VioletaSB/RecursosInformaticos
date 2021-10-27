<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 
    unset($_SESSION["id"]);
    unset($_SESSION["realname"]);
    require_once('Views/Login/login.php');
?>