<?php
session_start();
if (!isset($_SESSION['acesso_liberado']) or $_SESSION['acesso_liberado']<>1){
    header("Location: pagina_inicial_offline.php");
    exit;
}
