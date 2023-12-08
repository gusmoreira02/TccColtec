<?php
session_start();
if (!isset($_SESSION['acesso_liberado_prof']) or $_SESSION['acesso_liberado_prof']<>1){
    header("Location: pagina_inicial_offline.php");
    exit;
}