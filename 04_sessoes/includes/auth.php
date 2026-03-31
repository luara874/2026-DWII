<?php
function requer_login(): void
{
    if (session_status()===PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['usuario'])){
        header('location:login.php');
        exit;
    }
}
function usuario_logado(): string
{
    return $_SESSION['usuario']??'';
}
?>