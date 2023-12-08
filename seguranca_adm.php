<?php
session_start();
if (!isset($_SESSION['acesso_liberado_adm']) or $_SESSION['acesso_liberado_adm']<>1){
    header("Location: pagina_inicial_offline.php");
    exit;
}